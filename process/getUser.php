<?php
$search = isset($_GET['search']) ? trim($_GET['search']) : "";
$filterLevel = isset($_GET['filter_level']) ? trim($_GET['filter_level']) : "";
$sort = isset($_GET['sort']) ? trim($_GET['sort']) : "id";
$direction = isset($_GET['direction']) ? strtolower(trim($_GET['direction'])) : "desc";

$allowedLevels = ['admin', 'user'];
$allowedSorts = [
    'id' => 'id',
    'name' => 'name',
    'email' => 'email',
    'level' => 'level',
];

if (! isset($allowedSorts[$sort])) {
    $sort = 'id';
}

if (! in_array($direction, ['asc', 'desc'], true)) {
    $direction = 'desc';
}

if (! in_array($filterLevel, $allowedLevels, true)) {
    $filterLevel = '';
}

$queryUsers = "SELECT id, name, email, level FROM users";
$conditions = [];

if ($search !== "") {
    $searchEscaped = mysqli_real_escape_string($koneksi, $search);
    $conditions[] = "(name LIKE '%$searchEscaped%' OR email LIKE '%$searchEscaped%' OR level LIKE '%$searchEscaped%' OR CAST(id AS CHAR) LIKE '%$searchEscaped%')";
}

if ($filterLevel !== '') {
    $filterLevelEscaped = mysqli_real_escape_string($koneksi, $filterLevel);
    $conditions[] = "level = '$filterLevelEscaped'";
}

if (! empty($conditions)) {
    $queryUsers .= " WHERE " . implode(" AND ", $conditions);
}

$queryUsers .= " ORDER BY " . $allowedSorts[$sort] . " " . strtoupper($direction) . ", id DESC";
$execUsers = mysqli_query($koneksi, $queryUsers);
?>
