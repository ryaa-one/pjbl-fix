<?php

use Google\Client;
use Google\Service\Oauth2;

function createGoogleOAuthClient()
{
    $client = new Client();
    $client->setClientId(getenv('GOOGLE_CLIENT_ID') ?: '94162656030-n7oevhq4jefq26is6qiirs5g52nlmrlb.apps.googleusercontent.com');
    $client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET') ?: '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');
    $client->setRedirectUri(getenv('GOOGLE_REDIRECT_URI') ?: 'http://localhost/PJBL_NEW/google-callback.php');
    $client->addScope(Oauth2::USERINFO_EMAIL);
    $client->addScope(Oauth2::USERINFO_PROFILE);
    $client->setAccessType('online');
    $client->setPrompt('select_account');

    return $client;
}

function redirectToUserDashboard($level)
{
    if ($level === 'super_admin') {
        header('Location: super%20admin/dashboard');
    } elseif ($level === 'admin') {
        header('Location: admin/dashboard');
    } else {
        header('Location: index.php');
    }

    exit();
}

function usersTableHasColumn($column)
{
    global $koneksi;

    $column = mysqli_real_escape_string($koneksi, $column);
    $result = mysqli_query($koneksi, "SHOW COLUMNS FROM users LIKE '$column'");

    return $result && mysqli_num_rows($result) > 0;
}

function bindStatementParams($statement, $types, &$params)
{
    if ($types !== '') {
        mysqli_stmt_bind_param($statement, $types, ...$params);
    }
}

