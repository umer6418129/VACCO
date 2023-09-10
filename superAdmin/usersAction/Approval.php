<?php
    include('../connection.php');
    $id = $_GET['id'];
    $approveQuery = "update users set isapprove = 'Accepted' where id = '$id'";
    $result = mysqli_query($conn,$approveQuery);
    if ($result) {
        echo "  <script>
                    alert('User has been Accepted');
                    window.location='../userRequest.php';
                    </script>";
                }else{
                    echo "  <script>
                    alert('Something went's wrong');
                    window.location='../userRequest.php';
                </script>";
    }
?>