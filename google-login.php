<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/includes/google_oauth.php';

$canonicalLoginUrl = getGoogleOAuthLoginUrlForRedirectUri();
if ($canonicalLoginUrl !== null && ! isCurrentRequestUrl($canonicalLoginUrl)) {
    header('Location: ' . $canonicalLoginUrl);
    exit();
}

try {
    $client = createGoogleOAuthClient();
} catch (Throwable $exception) {
    http_response_code(500);
    echo 'Konfigurasi Google OAuth belum lengkap.';
    exit();
}
$state = bin2hex(random_bytes(32));

$_SESSION['google_oauth_state'] = $state;
$client->setState($state);
session_write_close();

header('Location: ' . $client->createAuthUrl());
exit();
