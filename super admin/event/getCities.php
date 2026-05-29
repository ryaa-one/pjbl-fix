<?php
header('Content-Type: application/json');

include '../../config/database.php';

$provinceId = isset($_GET['province_id']) ? (int) $_GET['province_id'] : 0;

if ($provinceId <= 0) {
    echo json_encode([]);
    exit();
}

$stmt = mysqli_prepare($koneksi, "SELECT id, name FROM cities WHERE province_id = ? ORDER BY name ASC");
mysqli_stmt_bind_param($stmt, 'i', $provinceId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$cities = [];
while ($row = mysqli_fetch_assoc($result)) {
    $cities[] = ['id' => (int) $row['id'], 'name' => $row['name']];
}

echo json_encode($cities);
