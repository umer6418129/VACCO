<?php
include('connection.php');
$id = $_GET['id'];
$delQuery = "delete from test_request where id = '$id'";
$result = mysqli_query($conn, $delQuery);
if ($result) {
    echo "  <script>
                    alert('Data has been Deleted');
                    history.back();
                </script>";
} else {
    echo "  <script>
                    alert('Something went's wrong');
                    history.back();
                </script>";
}
