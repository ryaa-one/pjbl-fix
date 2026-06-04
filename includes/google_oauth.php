<?php

use Google\Client;
use Google\Service\Oauth2;

require_once __DIR__ . '/env.php';

function createGoogleOAuthClient()
{
    $clientId = trim((string) getenv('GOOGLE_CLIENT_ID'));
    $clientSecret = trim((string) getenv('GOOGLE_CLIENT_SECRET'));
    $redirectUri = trim((string) getenv('GOOGLE_REDIRECT_URI'));

    if ($clientId === '' || $clientSecret === '' || $redirectUri === '') {
        throw new RuntimeException('Konfigurasi Google OAuth belum lengkap.');
    }

    $client = new Client();
    $client->setClientId($clientId);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);
    $client->addScope(Oauth2::USERINFO_EMAIL);
    $client->addScope(Oauth2::USERINFO_PROFILE);
    $client->setAccessType('online');
    $client->setPrompt('select_account');

    return $client;
}

function getGoogleOAuthLoginUrlForRedirectUri(): ?string
{
    $redirectUri = trim((string) getenv('GOOGLE_REDIRECT_URI'));
    $redirectParts = parse_url($redirectUri);

    if (! is_array($redirectParts) || empty($redirectParts['scheme']) || empty($redirectParts['host'])) {
        return null;
    }

    $projectPath = str_replace('\\', '/', dirname($redirectParts['path'] ?? '/'));
    $projectPath = $projectPath === '/' ? '' : rtrim($projectPath, '/');
    $port = isset($redirectParts['port']) ? ':' . $redirectParts['port'] : '';

    return $redirectParts['scheme'] . '://' . $redirectParts['host'] . $port . $projectPath . '/google-login.php';
}

function isCurrentRequestUrl(string $expectedUrl): bool
{
    $expectedParts = parse_url($expectedUrl);
    if (! is_array($expectedParts) || empty($expectedParts['host'])) {
        return false;
    }

    $requestHost = strtolower((string) ($_SERVER['HTTP_HOST'] ?? ''));
    $expectedHost = strtolower($expectedParts['host'] . (isset($expectedParts['port']) ? ':' . $expectedParts['port'] : ''));
    $requestScheme = (! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $requestPath = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? ''));
    $expectedPath = str_replace('\\', '/', (string) ($expectedParts['path'] ?? ''));

    return $requestScheme === strtolower((string) $expectedParts['scheme'])
        && $requestHost === $expectedHost
        && $requestPath === $expectedPath;
}

function redirectToUserDashboard($level)
{
    $level = function_exists('auth_normalize_role')
        ? auth_normalize_role((string) $level)
        : (string) $level;

    if ($level === 'admin') {
        header('Location: admin/dashboard');
    } elseif ($level === 'user') {
        header('Location: index.php');
    } else {
        header('Location: index.php');
    }

    exit();
}

function usersTableHasColumn($column)
{
    global $koneksi;

    $statement = mysqli_prepare(
        $koneksi,
        "
        SELECT 1
        FROM information_schema.columns
        WHERE table_schema = DATABASE()
          AND table_name = 'users'
          AND column_name = ?
        LIMIT 1
        "
    );
    if (! $statement) {
        return false;
    }

    mysqli_stmt_bind_param($statement, 's', $column);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    mysqli_stmt_close($statement);

    return $result && mysqli_num_rows($result) > 0;
}

function bindStatementParams($statement, $types, &$params)
{
    if ($types !== '') {
        mysqli_stmt_bind_param($statement, $types, ...$params);
    }
}
