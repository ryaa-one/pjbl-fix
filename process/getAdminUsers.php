<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/pagination.php';
forbid_direct_script_access(__FILE__);
require_role('admin');
$search = isset($_GET['search']) ? trim($_GET['search']) : "";
$sort = isset($_GET['sort']) ? trim($_GET['sort']) : "id";
$direction = isset($_GET['direction']) ? strtolower(trim($_GET['direction'])) : "desc";
$currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$perPage = getRowsPerPage('admin_users_alt');

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
$queryCountUsers = "SELECT COUNT(*) AS total FROM users" . $whereSql;
$stmtCountUsers = mysqli_prepare($koneksi, $queryCountUsers);
if ($stmtCountUsers && $paramTypes !== '') {
    mysqli_stmt_bind_param($stmtCountUsers, $paramTypes, ...$paramValues);
}
if ($stmtCountUsers) {
    mysqli_stmt_execute($stmtCountUsers);
}
$execCountUsers = $stmtCountUsers ? mysqli_stmt_get_result($stmtCountUsers) : false;
$countUsersRow = $execCountUsers ? mysqli_fetch_assoc($execCountUsers) : null;
if ($stmtCountUsers) {
    mysqli_stmt_close($stmtCountUsers);
}
$totalUsers = isset($countUsersRow['total']) ? (int) $countUsersRow['total'] : 0;
$totalUserPages = max(1, (int) ceil($totalUsers / $perPage));

if ($currentPage > $totalUserPages) {
    $currentPage = $totalUserPages;
}

$offset = ($currentPage - 1) * $perPage;
$queryUsers = "SELECT id, name, email, level FROM users" . $whereSql . " ORDER BY " . $allowedSorts[$sort] . " " . strtoupper($direction) . ", id DESC LIMIT ? OFFSET ?";
$listParamTypes = $paramTypes . 'ii';
$listParamValues = array_merge($paramValues, [$perPage, $offset]);
$stmtUsers = mysqli_prepare($koneksi, $queryUsers);
if ($stmtUsers) {
    mysqli_stmt_bind_param($stmtUsers, $listParamTypes, ...$listParamValues);
    mysqli_stmt_execute($stmtUsers);
}
$execUsers = $stmtUsers ? mysqli_stmt_get_result($stmtUsers) : false;
?>
