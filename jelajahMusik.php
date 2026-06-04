<?php
include 'config/database.php';
include 'process/category.php';

$categoryId = findCategoryIdByName($koneksi, 'Musik');
$redirectUrl = 'jelajah.php';
$params = [];

if ($categoryId !== null) {
    $params['category'] = $categoryId;
}

if (trim($_GET['search'] ?? '') !== '') {
    $params['search'] = trim($_GET['search']);
}

$page = max(1, (int) ($_GET['page'] ?? 1));
if ($page > 1) {
    $params['page'] = $page;
}

if (!empty($params)) {
    $redirectUrl .= '?' . http_build_query($params);
}

header('Location: ' . $redirectUrl);
exit();
