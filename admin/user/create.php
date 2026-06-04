<?php
require_once '../../includes/auth.php';
require_role('admin', '../../login.php');
header('Location: ../admin/create.php');
exit();
