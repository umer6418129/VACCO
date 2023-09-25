<?php
include('connection.php');
$id = $_GET['id'];
$delQuery = "delete from vaccines where id = '$id'";
$result = mysqli_query($conn, $delQuery);
if ($result) {
    echo "  <script>
                    alert('Vaccine has been Deleted');
                    history.back();
                </script>";
} else {
    echo "  <script>
                    alert('Something went's wrong');
                    history.back();
                </script>";
}
