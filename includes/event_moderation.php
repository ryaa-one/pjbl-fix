<?php

function ensureEventModerationTables($koneksi): void
{
    static $checked = false;

    if ($checked || ! $koneksi) {
        return;
    }

    $checked = true;

    mysqli_query(
        $koneksi,
        "
        CREATE TABLE IF NOT EXISTS event_update_requests (
            id INT AUTO_INCREMENT PRIMARY KEY,
            event_id INT NOT NULL,
            user_id INT NOT NULL,
            title VARCHAR(255),
            description TEXT,
            category_id INT,
            city_id INT,
            start_date DATETIME,
            end_date DATETIME,
            location VARCHAR(255),
            thumbnail VARCHAR(255),
            gallery_carousel TEXT,
            status ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
            rejection_reason TEXT NULL,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_event_update_requests_event_id (event_id),
            INDEX idx_event_update_requests_user_id (user_id),
            INDEX idx_event_update_requests_status (status)
        )
        "
    );

    $requestColumns = [
        'event_id' => "ALTER TABLE event_update_requests ADD COLUMN event_id INT NOT NULL AFTER id",
        'user_id' => "ALTER TABLE event_update_requests ADD COLUMN user_id INT NOT NULL AFTER event_id",
        'title' => "ALTER TABLE event_update_requests ADD COLUMN title VARCHAR(255) NULL AFTER user_id",
        'description' => "ALTER TABLE event_update_requests ADD COLUMN description TEXT NULL AFTER title",
        'category_id' => "ALTER TABLE event_update_requests ADD COLUMN category_id INT NULL AFTER description",
        'city_id' => "ALTER TABLE event_update_requests ADD COLUMN city_id INT NULL AFTER category_id",
        'start_date' => "ALTER TABLE event_update_requests ADD COLUMN start_date DATETIME NULL AFTER city_id",
        'end_date' => "ALTER TABLE event_update_requests ADD COLUMN end_date DATETIME NULL AFTER start_date",
        'location' => "ALTER TABLE event_update_requests ADD COLUMN location VARCHAR(255) NULL AFTER end_date",
        'thumbnail' => "ALTER TABLE event_update_requests ADD COLUMN thumbnail VARCHAR(255) NULL AFTER location",
        'gallery_carousel' => "ALTER TABLE event_update_requests ADD COLUMN gallery_carousel TEXT NULL AFTER thumbnail",
        'status' => "ALTER TABLE event_update_requests ADD COLUMN status ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending' AFTER gallery_carousel",
        'rejection_reason' => "ALTER TABLE event_update_requests ADD COLUMN rejection_reason TEXT NULL AFTER status",
        'created_at' => "ALTER TABLE event_update_requests ADD COLUMN created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER rejection_reason",
    ];

    foreach ($requestColumns as $column => $alterSql) {
        $resultColumn = mysqli_query($koneksi, "SHOW COLUMNS FROM event_update_requests LIKE '" . mysqli_real_escape_string($koneksi, $column) . "'");
        if ($resultColumn && mysqli_num_rows($resultColumn) === 0) {
            mysqli_query($koneksi, $alterSql);
        }
    }

    mysqli_query(
        $koneksi,
        "
        CREATE TABLE IF NOT EXISTS event_moderation_history (
            id INT AUTO_INCREMENT PRIMARY KEY,
            event_id INT NOT NULL,
            update_request_id INT NULL,
            admin_id INT NOT NULL,
            action ENUM('event_approved', 'event_rejected', 'edit_approved', 'edit_rejected') NOT NULL,
            reason TEXT NULL,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_event_moderation_history_event_id (event_id),
            INDEX idx_event_moderation_history_admin_id (admin_id)
        )
        "
    );

    $historyColumns = [
        'event_id' => "ALTER TABLE event_moderation_history ADD COLUMN event_id INT NOT NULL AFTER id",
        'update_request_id' => "ALTER TABLE event_moderation_history ADD COLUMN update_request_id INT NULL AFTER event_id",
        'admin_id' => "ALTER TABLE event_moderation_history ADD COLUMN admin_id INT NOT NULL AFTER update_request_id",
        'action' => "ALTER TABLE event_moderation_history ADD COLUMN action ENUM('event_approved', 'event_rejected', 'edit_approved', 'edit_rejected') NOT NULL AFTER admin_id",
        'reason' => "ALTER TABLE event_moderation_history ADD COLUMN reason TEXT NULL AFTER action",
        'created_at' => "ALTER TABLE event_moderation_history ADD COLUMN created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER reason",
    ];

    foreach ($historyColumns as $column => $alterSql) {
        $resultColumn = mysqli_query($koneksi, "SHOW COLUMNS FROM event_moderation_history LIKE '" . mysqli_real_escape_string($koneksi, $column) . "'");
        if ($resultColumn && mysqli_num_rows($resultColumn) === 0) {
            mysqli_query($koneksi, $alterSql);
        }
    }
}
