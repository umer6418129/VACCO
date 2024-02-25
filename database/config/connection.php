<?php
function connectToDatabase($config)
{
    $conn = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);
    
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    
    return $conn;
}
