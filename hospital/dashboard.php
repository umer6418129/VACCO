<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <?php
    include('connection.php');
    session_start();
    ?>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<style>
    h2{
        color: #073b74;
    }
</style>

<body>
    <?php
    if (isset($_SESSION['name'])) {
        // echo $_SESSION['username'];
        // echo '<script type="text/javascript">toastr.success("Have Fun")</script>';
        include('navBar.php');
    } else {
        header('location:login.php');
    }
    ?>
    <div class="content container">
        <?php
            $hospitalName = $_SESSION['name'];
            $hospitalIdQuery = "SELECT * FROM `hospital` WHERE name = '$hospitalName'";
            $cRes = mysqli_query($conn,$hospitalIdQuery)or die('hospital is not found');
            $hospitalData = mysqli_fetch_assoc($cRes);

            $hospitalId = $hospitalData['id'];
        ?>
        <div class="pt-3">
            <h3 class="h2 mb-0 text-capitalize d-flex align-items-center gap-2">
                <?php
                echo $hospitalName;
                ?>
            </h3>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <div class="card-body">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="card bg-primary shadow mb-3 col-4 border-0" style="max-width: 18rem;">
                                    <div class="card-body">
                                        <h4 class="text-white">test requests:
                                            <span>
                                                <?php
                                                $query = "SELECT * FROM test_request WHERE hospital_id = '$hospitalId' AND type = 'test' AND isapprove = 'pending'";
                                                $res = mysqli_query($conn, $query);
                                                echo mysqli_num_rows($res);
                                                ?>
                                            </span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="card bg-success shadow mb-3 col-4 border-0" style="max-width: 18rem;">
                                    <div class="card-body">
                                        <h4 class="text-white">test Appointments:
                                            <span>
                                                <?php
                                                $query = "SELECT * FROM test_request WHERE hospital_id = '$hospitalId' AND type = 'test' AND isapprove = 'accepted'";
                                                $res = mysqli_query($conn, $query);
                                                echo mysqli_num_rows($res);
                                                ?>
                                            </span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="card bg-primary shadow mb-3 col-4 border-0" style="max-width: 18rem;">
                                    <div class="card-body">
                                        <h4 class="text-white">vaccine requests:
                                            <span>
                                                <?php
                                                $query = "SELECT * FROM test_request WHERE hospital_id = '$hospitalId' AND type = 'vaccine' AND isapprove = 'pending'";
                                                $res = mysqli_query($conn, $query);
                                                echo mysqli_num_rows($res);
                                                ?>
                                            </span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="card bg-success shadow mb-3 col-4 border-0" style="max-width: 18rem;">
                                    <div class="card-body">
                                        <h4 class="text-white">vaccine Appointments:
                                            <span>
                                                <?php
                                                $query = "SELECT * FROM test_request WHERE hospital_id = '$hospitalId' AND type = 'vaccine' AND isapprove = 'accepted'";
                                                $res = mysqli_query($conn, $query);
                                                echo mysqli_num_rows($res);
                                                ?>
                                            </span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="card bg-primary shadow mb-3 col-4 border-0" style="max-width: 18rem;">
                                    <div class="card-body">
                                        <h4 class="text-white">number of vaccine:
                                            <span>
                                                <?php
                                                $query = "SELECT * FROM vaccines WHERE hospital_id = '$hospitalId'";
                                                $res = mysqli_query($conn, $query);
                                                echo mysqli_num_rows($res);
                                                ?>
                                            </span>
                                        </h4>
                                    </div>
                                </div>
                                <div class=" col-4 border-0" style="max-width: 18rem;">
                                    <div class="card-body">
                                        
                                    </div>
                                </div>
                            </div>  
                            <div class="row justify-content-between">
                            </div>  
                        </div>

                    </div>

                </div>

            </div>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>