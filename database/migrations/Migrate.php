<?php
require_once '../config/config.php';
require_once '../config/connection.php';
require_once 'BaseMigration.php';
require_once 'RoleMigration.php';

$conn = connectToDatabase($config);
var_dump($conn);
die();

$roleMigration = RoleMigration::up($conn);

?>
