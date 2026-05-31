<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/profile_photo.php';
require_once __DIR__ . '/includes/google_oauth.php';

function stopGoogleLogin($message)
{
    http_response_code(400);
    echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    exit();
}

function findUserByGoogleAccount($googleId, $email, $hasGoogleId)
{
    global $koneksi;

    if ($hasGoogleId) {
        $statement = mysqli_prepare($koneksi, 'SELECT * FROM users WHERE google_id = ? LIMIT 1');
        mysqli_stmt_bind_param($statement, 's', $googleId);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            return $user;
        }
    }

    $statement = mysqli_prepare($koneksi, 'SELECT * FROM users WHERE email = ? LIMIT 1');
    mysqli_stmt_bind_param($statement, 's', $email);
    mysqli_stmt_execute($statement);

    return mysqli_fetch_assoc(mysqli_stmt_get_result($statement));
}

function updateGoogleAccountMetadata($userId, $googleId, $avatar, $hasGoogleId, $hasAvatar)
{
    global $koneksi;

    $assignments = [];
    $types = '';
    $params = [];

    if ($hasGoogleId) {
        $assignments[] = 'google_id = ?';
        $types .= 's';
        $params[] = $googleId;
    }

    if ($hasAvatar) {
        $assignments[] = 'avatar = ?';
        $types .= 's';
        $params[] = $avatar;
    }

    if (!$assignments) {
        return;
    }

    $types .= 'i';
    $params[] = $userId;
    $statement = mysqli_prepare($koneksi, 'UPDATE users SET ' . implode(', ', $assignments) . ' WHERE id = ?');
    bindStatementParams($statement, $types, $params);
    mysqli_stmt_execute($statement);
}

function createGoogleUser($googleId, $email, $name, $avatar, $hasGoogleId, $hasAvatar)
{
    global $koneksi;

    $columns = ['email', 'password', 'name', 'level'];
    $values = [$email, password_hash(bin2hex(random_bytes(32)), PASSWORD_DEFAULT), $name, 'user'];

    foreach (['whatsapp', 'instagram', 'profile_photo'] as $column) {
        if (usersTableHasColumn($column)) {
            $columns[] = $column;
            $values[] = '';
        }
    }

    if ($hasGoogleId) {
        $columns[] = 'google_id';
        $values[] = $googleId;
    }

    if ($hasAvatar) {
        $columns[] = 'avatar';
        $values[] = $avatar;
    }

    $placeholders = implode(', ', array_fill(0, count($columns), '?'));
    $statement = mysqli_prepare(
        $koneksi,
        'INSERT INTO users (' . implode(', ', $columns) . ') VALUES (' . $placeholders . ')'
    );
    $types = str_repeat('s', count($values));
    bindStatementParams($statement, $types, $values);

    if (!mysqli_stmt_execute($statement)) {
        stopGoogleLogin('Akun Google gagal disimpan.');
    }

    return findUserByGoogleAccount($googleId, $email, $hasGoogleId);
}

if (isset($_GET['error'])) {
    stopGoogleLogin('Login Google dibatalkan atau ditolak.');
}

$expectedState = $_SESSION['google_oauth_state'] ?? '';
$receivedState = $_GET['state'] ?? '';
unset($_SESSION['google_oauth_state']);

if ($expectedState === '' || $receivedState === '' || !hash_equals($expectedState, $receivedState)) {
    stopGoogleLogin('State OAuth Google tidak valid.');
}

if (!isset($_GET['code'])) {
    stopGoogleLogin('Kode otorisasi Google tidak ditemukan.');
}

try {
    $client = createGoogleOAuthClient();
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (isset($token['error'])) {
        stopGoogleLogin('Token OAuth Google tidak dapat dibuat.');
    }

    $client->setAccessToken($token);
    $googleUser = (new Google\Service\Oauth2($client))->userinfo->get();
} catch (Throwable $exception) {
    stopGoogleLogin('Login Google gagal diproses.');
}

$googleId = trim((string) $googleUser->getId());
$email = trim((string) $googleUser->getEmail());
$name = trim((string) $googleUser->getName());
$avatar = trim((string) $googleUser->getPicture());

if ($googleId === '' || $email === '' || !$googleUser->getVerifiedEmail()) {
    stopGoogleLogin('Akun Google harus memiliki email terverifikasi.');
}

if ($name === '') {
    $name = strstr($email, '@', true) ?: 'Pengguna Google';
}

$hasGoogleId = usersTableHasColumn('google_id');
$hasAvatar = usersTableHasColumn('avatar');
$user = findUserByGoogleAccount($googleId, $email, $hasGoogleId);

if ($user) {
    updateGoogleAccountMetadata((int) $user['id'], $googleId, $avatar, $hasGoogleId, $hasAvatar);
    $user = findUserByGoogleAccount($googleId, $email, $hasGoogleId);
} else {
    $user = createGoogleUser($googleId, $email, $name, $avatar, $hasGoogleId, $hasAvatar);
}

session_regenerate_id(true);
syncUserSession($user);
redirectToUserDashboard($user['level']);

