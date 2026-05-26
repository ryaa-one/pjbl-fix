<?php
include 'config/database.php';
include 'process/category.php';

$categoryId = findCategoryIdByName($koneksi, 'Musik');
$redirectUrl = 'jelajah.php';

if ($categoryId !== null) {
    $redirectUrl .= '?category=' . urlencode((string) $categoryId);
}

header('Location: ' . $redirectUrl);
exit();
