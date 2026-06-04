<?php

function getRowsPerPageOptions(): array
{
    return [5, 10, 25, 50, 100];
}

function getRowsPerPage(string $sessionKey, int $default = 10): int
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $options = getRowsPerPageOptions();
    if (! in_array($default, $options, true)) {
        $default = 10;
    }

    $sessionName = 'rows_per_page_' . preg_replace('/[^A-Za-z0-9_]/', '_', $sessionKey);
    $requested = isset($_GET['per_page']) ? (int) $_GET['per_page'] : 0;

    if (in_array($requested, $options, true)) {
        $_SESSION[$sessionName] = $requested;
        return $requested;
    }

    $stored = isset($_SESSION[$sessionName]) ? (int) $_SESSION[$sessionName] : 0;

    return in_array($stored, $options, true) ? $stored : $default;
}

function renderRowsPerPageSelect(int $currentPerPage): void
{
    ?>
    <select class="admin-field admin-toolbar__select rows-per-page-select" name="per_page" aria-label="Rows per page">
        <?php foreach (getRowsPerPageOptions() as $option): ?>
            <option value="<?= $option ?>" <?= $currentPerPage === $option ? 'selected' : '' ?>>
                <?= $option ?> / halaman
            </option>
        <?php endforeach; ?>
    </select>
    <?php
}
