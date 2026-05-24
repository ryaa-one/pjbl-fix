<?php
$search = isset($_GET['search']) ? trim($_GET['search']) : "";
$queryUsers = "SELECT id, name, email, level FROM users";

if ($search !== "") {
    $searchEscaped = mysqli_real_escape_string($koneksi, $search);
    $queryUsers .= " WHERE name LIKE '%$searchEscaped%' OR email LIKE '%$searchEscaped%' OR level LIKE '%$searchEscaped%'";
}

$queryUsers .= " ORDER BY id DESC";
$execUsers = mysqli_query($koneksi, $queryUsers);
?>