<?php

function ensureReviewReplyColumn($koneksi): void
{
    static $checked = false;

    if ($checked || ! $koneksi) {
        return;
    }

    $checked = true;

    $resultReply = mysqli_query($koneksi, "SHOW COLUMNS FROM event_reviews LIKE 'admin_reply'");
    if ($resultReply && mysqli_num_rows($resultReply) === 0) {
        mysqli_query($koneksi, "ALTER TABLE event_reviews ADD COLUMN admin_reply TEXT NULL AFTER rating");
    }

    $resultReplyByRole = mysqli_query($koneksi, "SHOW COLUMNS FROM event_reviews LIKE 'reply_by_role'");
    if ($resultReplyByRole && mysqli_num_rows($resultReplyByRole) === 0) {
        mysqli_query($koneksi, "ALTER TABLE event_reviews ADD COLUMN reply_by_role ENUM('user', 'admin') NULL AFTER admin_reply");
    }
}
