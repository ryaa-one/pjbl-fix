<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/includes/google_oauth.php';

$client = createGoogleOAuthClient();
$state = bin2hex(random_bytes(32));

$_SESSION['google_oauth_state'] = $state;
$client->setState($state);

header('Location: ' . $client->createAuthUrl());
exit();

