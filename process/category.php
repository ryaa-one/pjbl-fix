<?php

function normalizeCategoryName(string $categoryName): string
{
    return preg_replace('/\s+/', ' ', trim($categoryName));
}

function findCategoryIdByName(mysqli $koneksi, string $categoryName): ?int
{
    $stmt = mysqli_prepare(
        $koneksi,
        "SELECT id FROM categories WHERE LOWER(TRIM(name)) = LOWER(?) ORDER BY id ASC LIMIT 1"
    );

    if (!$stmt) {
        return null;
    }

    mysqli_stmt_bind_param($stmt, 's', $categoryName);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $category = $result ? mysqli_fetch_assoc($result) : null;

    mysqli_stmt_close($stmt);

    return $category ? (int) $category['id'] : null;
}

function getOrCreateCategoryId(mysqli $koneksi, string $categoryName): ?int
{
    $categoryName = normalizeCategoryName($categoryName);

    if ($categoryName === '') {
        return null;
    }

    $categoryId = findCategoryIdByName($koneksi, $categoryName);
    if ($categoryId !== null) {
        return $categoryId;
    }

    $stmt = mysqli_prepare($koneksi, "INSERT INTO categories (name) VALUES (?)");
    if (!$stmt) {
        return null;
    }

    mysqli_stmt_bind_param($stmt, 's', $categoryName);
    $inserted = mysqli_stmt_execute($stmt);
    $newCategoryId = $inserted ? (int) mysqli_insert_id($koneksi) : null;

    mysqli_stmt_close($stmt);

    if ($newCategoryId !== null && $newCategoryId > 0) {
        return $newCategoryId;
    }

    return findCategoryIdByName($koneksi, $categoryName);
}
