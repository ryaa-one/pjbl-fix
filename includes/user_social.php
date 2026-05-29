<?php

function ensureUserSocialColumns($koneksi)
{
    $resultWhatsapp = mysqli_query($koneksi, "SHOW COLUMNS FROM users LIKE 'whatsapp'");
    if ($resultWhatsapp && mysqli_num_rows($resultWhatsapp) === 0) {
        mysqli_query($koneksi, "ALTER TABLE users ADD COLUMN whatsapp VARCHAR(30) NULL DEFAULT NULL AFTER profile_photo");
    }

    $resultInstagram = mysqli_query($koneksi, "SHOW COLUMNS FROM users LIKE 'instagram'");
    if ($resultInstagram && mysqli_num_rows($resultInstagram) === 0) {
        mysqli_query($koneksi, "ALTER TABLE users ADD COLUMN instagram VARCHAR(50) NULL DEFAULT NULL AFTER whatsapp");
    }
}

function normalizeWhatsappNumber($value)
{
    return preg_replace('/\D+/', '', (string) $value);
}

function normalizeInstagramUsername($value)
{
    $value = trim((string) $value);
    $value = preg_replace('#^https?://(www\.)?instagram\.com/#i', '', $value);
    $value = trim($value, " \t\n\r\0\x0B/@");
    $value = explode('/', $value)[0] ?? '';

    return $value;
}
