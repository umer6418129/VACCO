<?php
include('connection.php');
$id = $_GET['id'];
$delQuery = "DELETE FROM test_request WHERE id = '$id'";
$result = mysqli_query($conn, $delQuery);

$delChilds = "DELETE FROM test_result WHERE appointment_id = '$id'";
$childResult = mysqli_query($conn, $delChilds) or die("Something went wrong");

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
