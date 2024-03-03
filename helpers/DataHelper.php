<?php
class DataHelper
{
    function selectAll($table, $conn) {
        $query = "SELECT * FROM $table";
        $res = mysqli_query($conn, $query);
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }

    function selectWithConditions($table, $conditions, $conn) {
        $query = "SELECT * FROM $table WHERE ";
        $params = array();
        $types = '';
    
        foreach ($conditions as $column => $value) {
            $query .= "$column = ? AND ";
            $params[] = $value;
            $types .= 's';
        }

        $query = substr($query, 0, -5);
    
        $stmt = $conn->query($query);
    
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
