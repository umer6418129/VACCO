<?php
    include('../connection.php');
    $id = $_GET['id'];
    $del = "DELETE FROM contactuser WHERE id='$id'";
    $result = mysqli_query($conn,$del);
    if ($result) {
        echo "  <script>
                    alert('Message has been Deleted');
                    window.location='../messages.php';
                    </script>";
                }else{
                    echo "  <script>
                    alert('Something went's wrong');
                    window.location='../messages.php';
                </script>";
    }
?>