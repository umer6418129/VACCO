<?php
include('connection.php');
$id = $_GET['id'];

// Delete child records first
$delChilds = "DELETE FROM test_result WHERE appointment_id = '$id'";
$childResult = mysqli_query($conn, $delChilds);

// Then delete the parent record
$delQuery = "DELETE FROM test_request WHERE id = '$id'";
$result = mysqli_query($conn, $delQuery);

if ($result && $childResult) {
    echo "<script>
        alert('Data has been Deleted');
        history.back();
    </script>";
} else {
    echo "<script>
        alert('Something went wrong');
        history.back();
    </script>";
}

?>
