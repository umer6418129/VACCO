<?php
class InsertAdminMigration extends BaseMigration
{
    public static function up($conn)
    {
        try {
            $roleQuery = "SELECT id from tbl_userroles Where name='Admin'";
            $role = $conn->query($roleQuery);
            $roleData = $role->fetch_row();
            $roleId = (int)$roleData[0];
            $admin = [
                "email" => "admin@gmail.com",
                "gender" => "Male",
                "password" => "123456",
                "isapprove" => 1,
                "isactive" => 1,
                "role_id" => $roleId,
            ];
            $sql = "SELECT * from tbl_user Where email='" . $admin['email'] . "'";
            $result = $conn->query($sql);
            if ($result->num_rows == 0) {
                $password = base64_encode($admin['password']);
                $sql = "INSERT INTO tbl_user (email, gender, password, isapprove ,isactive,role_id) VALUES ('" . $admin['email'] . "', '" . $admin['gender'] . "', '" . $password . "', '" . $admin['isapprove'] . "', '" . $admin['isactive'] . "', " . $admin['role_id'] . ")";
                $conn->query($sql);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
