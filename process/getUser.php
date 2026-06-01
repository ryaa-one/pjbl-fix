<?php
require_once __DIR__ . '/../includes/auth.php';
forbid_direct_script_access(__FILE__);
require_role('admin');

$search = isset($_GET['search']) ? trim($_GET['search']) : "";
$filterLevel = isset($_GET['filter_level']) ? trim($_GET['filter_level']) : "";
$sort = isset($_GET['sort']) ? trim($_GET['sort']) : "id";
$direction = isset($_GET['direction']) ? strtolower(trim($_GET['direction'])) : "desc";
$currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$perPage = 10;

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

if ($currentPage < 1) {
    $currentPage = 1;
}

if (! in_array($filterLevel, $allowedLevels, true)) {
    $filterLevel = '';
}

$queryUsersBase = "SELECT id, name, email, level FROM users";
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
    $queryUsersBase .= " WHERE " . implode(" AND ", $conditions);
}

$queryCountUsers = "SELECT COUNT(*) AS total FROM users";
if (! empty($conditions)) {
    $queryCountUsers .= " WHERE " . implode(" AND ", $conditions);
}

$execCountUsers = mysqli_query($koneksi, $queryCountUsers);
$countUsersRow = $execCountUsers ? mysqli_fetch_assoc($execCountUsers) : null;
$totalUsers = isset($countUsersRow['total']) ? (int) $countUsersRow['total'] : 0;
$totalUserPages = max(1, (int) ceil($totalUsers / $perPage));

if ($currentPage > $totalUserPages) {
    $currentPage = $totalUserPages;
}

$offset = ($currentPage - 1) * $perPage;
$queryUsers = $queryUsersBase . " ORDER BY " . $allowedSorts[$sort] . " " . strtoupper($direction) . ", id DESC LIMIT $perPage OFFSET $offset";
$execUsers = mysqli_query($koneksi, $queryUsers);
?>
