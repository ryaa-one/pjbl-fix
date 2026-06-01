<?php
require_once __DIR__ . '/../includes/auth.php';
forbid_direct_script_access(__FILE__);
require_role('super_admin');
$search = isset($_GET['search']) ? trim($_GET['search']) : "";
$sort = isset($_GET['sort']) ? trim($_GET['sort']) : "id";
$direction = isset($_GET['direction']) ? strtolower(trim($_GET['direction'])) : "desc";
$currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$perPage = 10;

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

$conditions = ["level = 'admin'"];
if ($search !== "") {
    $searchEscaped = mysqli_real_escape_string($koneksi, $search);
    $conditions[] = "(name LIKE '%$searchEscaped%' OR email LIKE '%$searchEscaped%' OR CAST(id AS CHAR) LIKE '%$searchEscaped%')";
}

$whereSql = " WHERE " . implode(" AND ", $conditions);
$queryCountAdmins = "SELECT COUNT(*) AS total FROM users" . $whereSql;
$execCountAdmins = mysqli_query($koneksi, $queryCountAdmins);
$countAdminsRow = $execCountAdmins ? mysqli_fetch_assoc($execCountAdmins) : null;
$totalAdmins = isset($countAdminsRow['total']) ? (int) $countAdminsRow['total'] : 0;
$totalAdminPages = max(1, (int) ceil($totalAdmins / $perPage));

if ($currentPage > $totalAdminPages) {
    $currentPage = $totalAdminPages;
}

$offset = ($currentPage - 1) * $perPage;
$queryAdmins = "SELECT id, name, email, level FROM users" . $whereSql . " ORDER BY " . $allowedSorts[$sort] . " " . strtoupper($direction) . ", id DESC LIMIT $perPage OFFSET $offset";
$execAdmin = mysqli_query($koneksi, $queryAdmins);
?>
