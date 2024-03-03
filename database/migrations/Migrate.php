<?php

require_once '../config/DbConnect.php';
require_once 'BaseMigration.php';
require_once 'RoleMigration.php';
require_once 'UserMigration.php';
require_once 'AlterUserTableMigration.php';
require_once 'InsertRolesMigration.php';
require_once 'InsertAdminMigration.php';

$roleMigration = RoleMigration::up($conn);
$userMigration = UserMigration::up($conn);
$userMigration = AlterUserTableMigration::up($conn);
$userMigration = InsertRolesMigration::up($conn);
$userMigration = InsertAdminMigration::up($conn);

?>
