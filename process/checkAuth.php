<?php

require_once __DIR__ . '/../includes/auth.php';

forbid_direct_script_access(__FILE__);
require_role($currentLevel ?? '');
