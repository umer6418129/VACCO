<?php

require_once '../config/DbConnect.php';
require_once 'BaseMigration.php';
require_once 'RoleMigration.php';
require_once 'UserMigration.php';

$roleMigration = RoleMigration::up($conn);
$userMigration = UserMigration::up($conn);

?>
