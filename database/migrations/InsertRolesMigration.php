<?php
class InsertRolesMigration extends BaseMigration
{
    public static function up($conn)
    {
        try {
            $roles = [
                'Admin',
                'Hospital',
                'Patient',
            ];
            foreach ($roles as $role) {
                $sqlCheckRole = "SELECT * FROM tbl_userroles WHERE name = '" . $role . "'";
                $resultCheckRole = $conn->query($sqlCheckRole);

                if ($resultCheckRole->num_rows == 0) {
                    $sqlInsertRole = "INSERT INTO tbl_userroles (name) VALUES ('" . $role . "')";
                    $conn->query($sqlInsertRole);
                }
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
