<?php
require_once '../../includes/auth.php';
require_role('admin', '../../login.php');
$id = (int) ($_GET['id'] ?? 0);
header('Location: ../admin/edit.php?id=' . $id);
exit();
