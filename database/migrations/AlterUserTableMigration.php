<?php
class AlterUserTableMigration extends BaseMigration {
    public static function up($conn) {
        try {
            $sql = "ALTER TABLE tbl_user MODIFY f_name VARCHAR(30) NULL, MODIFY l_name VARCHAR(30) NULL";
            $conn->query($sql);
            self::createTable($conn, $sql);
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
?>