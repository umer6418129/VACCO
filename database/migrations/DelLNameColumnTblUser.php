<?php
class DelLNameColumnTblUser extends BaseMigration {
    public static function up($conn) {
        try {
            $drop_lName = "ALTER TABLE tbl_user DROP COLUMN l_name;";
            $conn->query($drop_lName);

            $rename_Fname = "ALTER TABLE tbl_user RENAME COLUMN f_name TO user_name;";
            $conn->query($rename_Fname);

            // self::createTable($conn, $sql);
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
?>