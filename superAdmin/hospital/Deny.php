<?php
    include('../connection.php');
    $id = $_GET['id'];
    $approveQuery = "update hospital set isapprove = 'Rejected' where id = '$id'";
    $result = mysqli_query($conn,$approveQuery);
    if ($result) {
        echo "  <script>
                    alert('Hospital has been Rejected');
                    window.location='../hospitalRequest.php';
                    </script>";
                }else{
                    echo "  <script>
                    alert('Something went's wrong');
                    window.location='../hospitalRequest.php';
                </script>";
    }
?>