<?php
require_once '../../includes/auth.php';
require_role('user', '../../login.php');
header('Location: ../dashboard');
exit();
