<?php
include 'config/database.php';
include 'process/category.php';

$categoryId = findCategoryIdByName($koneksi, 'Budaya');
$redirectUrl = 'jelajah.php';

if ($categoryId !== null) {
    $redirectUrl .= '?category=' . urlencode((string) $categoryId);
}

header('Location: ' . $redirectUrl);
exit();
