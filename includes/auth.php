<?php

function auth_start_session(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function auth_disable_cache(): void
{
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache');
    header('Expires: Sat, 01 Jan 2000 00:00:00 GMT');
}

function auth_login_path(): string
{
    $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');

    if (strpos($scriptName, '/akun/') !== false || strpos($scriptName, '/process/') !== false) {
        return '../login.php';
    }

    if (
        strpos($scriptName, '/admin/') !== false
        || strpos($scriptName, '/super admin/') !== false
        || strpos($scriptName, '/super%20admin/') !== false
    ) {
        return '../../login.php';
    }

    return 'login.php';
}

function auth_is_logged_in(): bool
{
    auth_start_session();

    return isset($_SESSION['user_id'], $_SESSION['nama'], $_SESSION['level'])
        && (int) $_SESSION['user_id'] > 0
        && trim((string) $_SESSION['nama']) !== ''
        && trim((string) $_SESSION['level']) !== '';
}

function auth_forbidden(string $message = '403 Forbidden'): void
{
    http_response_code(403);
    header('Content-Type: text/plain; charset=UTF-8');
    echo $message;
    exit();
}

function auth_json_error(int $statusCode, string $message): void
{
    http_response_code($statusCode);
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode([
        'success' => false,
        'message' => $message,
    ]);
    exit();
}

function require_login(?string $loginPath = null): void
{
    auth_start_session();
    auth_disable_cache();

    if (auth_is_logged_in()) {
        return;
    }

    header('Location: ' . ($loginPath ?? auth_login_path()));
    exit();
}

function require_role(string $role, ?string $loginPath = null): void
{
    require_login($loginPath);

    if (($_SESSION['level'] ?? '') !== $role) {
        auth_forbidden();
    }
}

function require_login_json(): void
{
    auth_start_session();
    auth_disable_cache();

    if (! auth_is_logged_in()) {
        auth_json_error(401, 'Login diperlukan untuk mengakses endpoint ini.');
    }
}

function require_role_json(string $role): void
{
    require_login_json();

    if (($_SESSION['level'] ?? '') !== $role) {
        auth_json_error(403, 'Anda tidak memiliki akses ke endpoint ini.');
    }
}

function require_request_method(string $method, bool $json = false): void
{
    if (strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET') === strtoupper($method)) {
        return;
    }

    if ($json) {
        auth_json_error(405, 'Metode request tidak valid.');
    }

    http_response_code(405);
    header('Allow: ' . strtoupper($method));
    header('Content-Type: text/plain; charset=UTF-8');
    echo '405 Method Not Allowed';
    exit();
}

function forbid_direct_script_access(string $file): void
{
    $executedScript = realpath($_SERVER['SCRIPT_FILENAME'] ?? '');
    $currentFile = realpath($file);

    if ($executedScript !== false && $currentFile !== false && $executedScript === $currentFile) {
        auth_forbidden();
    }
}
