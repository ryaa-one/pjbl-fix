<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/pagination.php';
forbid_direct_script_access(__FILE__);
require_role('admin');
$search = isset($_GET['search']) ? trim($_GET['search']) : "";
$sort = isset($_GET['sort']) ? trim($_GET['sort']) : "id";
$direction = isset($_GET['direction']) ? strtolower(trim($_GET['direction'])) : "desc";
$currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$perPage = getRowsPerPage('admin_users');

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

$conditions = ["level = 'user'"];
$paramTypes = '';
$paramValues = [];
if ($search !== "") {
    $searchLike = '%' . $search . '%';
    $conditions[] = "(name LIKE ? OR email LIKE ? OR CAST(id AS CHAR) LIKE ?)";
    $paramTypes = 'sss';
    $paramValues = [$searchLike, $searchLike, $searchLike];
}

$whereSql = " WHERE " . implode(" AND ", $conditions);
$queryCountAdmins = "SELECT COUNT(*) AS total FROM users" . $whereSql;
$stmtCountAdmins = mysqli_prepare($koneksi, $queryCountAdmins);
if ($stmtCountAdmins && $paramTypes !== '') {
    mysqli_stmt_bind_param($stmtCountAdmins, $paramTypes, ...$paramValues);
}
if ($stmtCountAdmins) {
    mysqli_stmt_execute($stmtCountAdmins);
}
$execCountAdmins = $stmtCountAdmins ? mysqli_stmt_get_result($stmtCountAdmins) : false;
$countAdminsRow = $execCountAdmins ? mysqli_fetch_assoc($execCountAdmins) : null;
if ($stmtCountAdmins) {
    mysqli_stmt_close($stmtCountAdmins);
}
$totalAdmins = isset($countAdminsRow['total']) ? (int) $countAdminsRow['total'] : 0;
$totalAdminPages = max(1, (int) ceil($totalAdmins / $perPage));

if ($currentPage > $totalAdminPages) {
    $currentPage = $totalAdminPages;
}

$offset = ($currentPage - 1) * $perPage;
$queryAdmins = "SELECT id, name, email, level FROM users" . $whereSql . " ORDER BY " . $allowedSorts[$sort] . " " . strtoupper($direction) . ", id DESC LIMIT ? OFFSET ?";
$listParamTypes = $paramTypes . 'ii';
$listParamValues = array_merge($paramValues, [$perPage, $offset]);
$stmtAdmins = mysqli_prepare($koneksi, $queryAdmins);
if ($stmtAdmins) {
    mysqli_stmt_bind_param($stmtAdmins, $listParamTypes, ...$listParamValues);
    mysqli_stmt_execute($stmtAdmins);
}
$execAdmin = $stmtAdmins ? mysqli_stmt_get_result($stmtAdmins) : false;
?>
