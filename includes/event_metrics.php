<?php

function ensureEventMetricsColumns($koneksi)
{
    static $checked = false;

    if ($checked || ! $koneksi) {
        return;
    }

    $checked = true;

    $resultUserId = mysqli_query($koneksi, "SHOW COLUMNS FROM events LIKE 'user_id'");
    if ($resultUserId && mysqli_num_rows($resultUserId) === 0) {
        mysqli_query($koneksi, "ALTER TABLE events ADD COLUMN user_id INT UNSIGNED NULL DEFAULT NULL AFTER city_id");
    }

    $resultViewCount = mysqli_query($koneksi, "SHOW COLUMNS FROM events LIKE 'view_count'");
    if ($resultViewCount && mysqli_num_rows($resultViewCount) === 0) {
        mysqli_query($koneksi, "ALTER TABLE events ADD COLUMN view_count INT UNSIGNED NOT NULL DEFAULT 0 AFTER user_id");
    } elseif ($resultViewCount) {
        $viewCountColumn = mysqli_fetch_assoc($resultViewCount);
        $defaultValue = isset($viewCountColumn['Default']) ? (string) $viewCountColumn['Default'] : null;
        $isNullable = ($viewCountColumn['Null'] ?? '') === 'YES';

        if ($defaultValue !== '0' || $isNullable) {
            mysqli_query($koneksi, "ALTER TABLE events MODIFY COLUMN view_count INT UNSIGNED NOT NULL DEFAULT 0");
        }
    }

    $resultIsFavourite = mysqli_query($koneksi, "SHOW COLUMNS FROM events LIKE 'is_favourite'");
    if ($resultIsFavourite && mysqli_num_rows($resultIsFavourite) === 0) {
        mysqli_query($koneksi, "ALTER TABLE events ADD COLUMN is_favourite TINYINT(1) NOT NULL DEFAULT 0 AFTER view_count");
    }

    if ($resultIsFavourite) {
        $isFavouriteColumn = mysqli_fetch_assoc($resultIsFavourite);
        $defaultValue = isset($isFavouriteColumn['Default']) ? (string) $isFavouriteColumn['Default'] : null;
        $isNullable = ($isFavouriteColumn['Null'] ?? '') === 'YES';

        if ($defaultValue !== '0' || $isNullable) {
            mysqli_query($koneksi, "ALTER TABLE events MODIFY COLUMN is_favourite TINYINT(1) NOT NULL DEFAULT 0");
        }
    }

    $resultStatus = mysqli_query($koneksi, "SHOW COLUMNS FROM events LIKE 'status'");
    if ($resultStatus && mysqli_num_rows($resultStatus) === 0) {
        mysqli_query($koneksi, "ALTER TABLE events ADD COLUMN status ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending'");
        mysqli_query($koneksi, "UPDATE events SET status = 'approved' WHERE status = 'pending'");
    }

    $resultRejectionReason = mysqli_query($koneksi, "SHOW COLUMNS FROM events LIKE 'rejection_reason'");
    if ($resultRejectionReason && mysqli_num_rows($resultRejectionReason) === 0) {
        mysqli_query($koneksi, "ALTER TABLE events ADD COLUMN rejection_reason TEXT NULL");
    }
}

function ensureEventEngagementColumns($koneksi)
{
    static $checked = false;

    if ($checked || ! $koneksi) {
        return;
    }

    $checked = true;

    $likesCreatedAt = mysqli_query($koneksi, "SHOW COLUMNS FROM event_likes LIKE 'created_at'");
    if ($likesCreatedAt && mysqli_num_rows($likesCreatedAt) === 0) {
        mysqli_query($koneksi, "ALTER TABLE event_likes ADD COLUMN created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
    }

    $favouritesCreatedAt = mysqli_query($koneksi, "SHOW COLUMNS FROM event_favourites LIKE 'created_at'");
    if ($favouritesCreatedAt && mysqli_num_rows($favouritesCreatedAt) === 0) {
        mysqli_query($koneksi, "ALTER TABLE event_favourites ADD COLUMN created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
    }
}
