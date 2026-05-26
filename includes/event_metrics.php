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
