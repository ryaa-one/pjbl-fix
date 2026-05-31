<?php
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

$conditions = ["level = 'user'"];
if ($search !== "") {
    $searchEscaped = mysqli_real_escape_string($koneksi, $search);
    $conditions[] = "(name LIKE '%$searchEscaped%' OR email LIKE '%$searchEscaped%' OR CAST(id AS CHAR) LIKE '%$searchEscaped%')";
}

$whereSql = " WHERE " . implode(" AND ", $conditions);
$queryCountUsers = "SELECT COUNT(*) AS total FROM users" . $whereSql;
$execCountUsers = mysqli_query($koneksi, $queryCountUsers);
$countUsersRow = $execCountUsers ? mysqli_fetch_assoc($execCountUsers) : null;
$totalUsers = isset($countUsersRow['total']) ? (int) $countUsersRow['total'] : 0;
$totalUserPages = max(1, (int) ceil($totalUsers / $perPage));

if ($currentPage > $totalUserPages) {
    $currentPage = $totalUserPages;
}

$offset = ($currentPage - 1) * $perPage;
$queryUsers = "SELECT id, name, email, level FROM users" . $whereSql . " ORDER BY " . $allowedSorts[$sort] . " " . strtoupper($direction) . ", id DESC LIMIT $perPage OFFSET $offset";
$execUsers = mysqli_query($koneksi, $queryUsers);
?>
