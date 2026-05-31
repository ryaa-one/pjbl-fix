<?php

return [
    'host' => getenv('SMTP_HOST') ?: 'smtp.gmail.com',
    'port' => (int) (getenv('SMTP_PORT') ?: 587),
    'encryption' => getenv('SMTP_ENCRYPTION') ?: 'tls',
    'username' => getenv('SMTP_USERNAME') ?: 'your-email@gmail.com',
    'password' => getenv('SMTP_PASSWORD') ?: 'your-app-password',
    'from_email' => getenv('SMTP_FROM') ?: 'your-email@gmail.com',
    'from_name' => getenv('SMTP_FROM_NAME') ?: 'EvenTura',
];
