<?php

require_once __DIR__ . '/../includes/env.php';

return [
    'host' => getenv('SMTP_HOST') ?: 'smtp.gmail.com',
    'port' => (int) (getenv('SMTP_PORT') ?: 587),
    'encryption' => getenv('SMTP_ENCRYPTION') ?: 'tls',
    'username' => getenv('SMTP_USERNAME') ?: '',
    'password' => getenv('SMTP_PASSWORD') ?: '',
    'from_email' => getenv('SMTP_FROM') ?: '',
    'from_name' => getenv('SMTP_FROM_NAME') ?: 'EvenTura',
];
