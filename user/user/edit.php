<?php
require_once '../../includes/auth.php';
require_role('user', '../../login.php');
auth_forbidden('CRUD user tidak tersedia untuk role user.');
