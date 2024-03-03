<?php

class BaseMigration {
    public static function createTable($conn, $sql) {
        $response = array();
        if ($conn->query($sql) === TRUE) {
            $response["status"] = 1;
            $response["message"] = "Query executed successfully";
        } else {
            $response["status"] = 0;
            $response["message"] = "Error creating table: " . $conn->error;
        }
        return json_encode($response);
    }
}
?>