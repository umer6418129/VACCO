<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result-Add</title>
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
    .searchBtn {
        background-color: #1764a3;
        color: white;
        border: none;
    }

    .form-select {
        cursor: pointer;
    }

    .btn .badge {
        position: absolute;
        right: -21px;
        top: -19px !important;
        border-radius: 50%;
        background-color: red;
        color: white;
    }
</style>

<body>
    <?php
    if (isset($_SESSION['name'])) {
        $hospitalName = $_SESSION['name'];
        $hospitalIdQuery = "SELECT * FROM `hospital` WHERE name = '$hospitalName'";
        $cRes = mysqli_query($conn, $hospitalIdQuery) or die('hospital is not found');
        $hospitalData = mysqli_fetch_assoc($cRes);

        $hospitalId = $hospitalData['id'];

        $getVaccine = "SELECT * FROM `vaccines` WHERE hospital_id = '$hospitalId' AND availability = 'Available'";
        $responseVaccine = mysqli_query($conn, $getVaccine) or die('no vaccine');
        include('navBar.php');
    } else {
        header('location:login.php');
    }
    ?>
    <div class="content container">
        <div class="pt-3">
            <h3 class="h2 mb-0 text-capitalize d-flex align-items-center gap-2">
                Add Result
            </h3>
        </div>
        <?php
        $hospitalName = $_SESSION['name'];
        $hospitalIdQuery = "SELECT * FROM `hospital` WHERE name = '$hospitalName'";
        $cRes = mysqli_query($conn, $hospitalIdQuery) or die('hospital is not found');
        $hospitalData = mysqli_fetch_assoc($cRes);

        $hospitalId = $hospitalData['id'];
        ?>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <a class="btn btn-secondary" href="testResult.php"><i class="bi bi-arrow-left"></i>Back</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="" method="POST">
                                <div class="my-3">
                                    <label for="">Enter Appointment ID#</label>
                                    <input type="number" name="appointment_id" id="" class="form-control" placeholder="">
                                </div>
                                <div class="my-3">
                                    <label for="">Enter Test Date</label>
                                    <input type="date" name="test_date" id="" class="form-control">
                                </div>
                                <div class="my-3">
                                    <label for="">Enter Test Result</label>
                                    <input type="text" name="result" id="" class="form-control">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success" name="resultBtn">Add Result</button>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['resultBtn'])) {
                                $appointmentId = $_POST['appointment_id'];
                                $test_date = $_POST['test_date'];
                                $result = $_POST['result'];


                                $addQuery = "INSERT INTO `test_result`(`type`, `test_date`,  `result`, `appointment_id`) VALUES ('test','$test_date',' $result','$appointmentId')";
                                $addRes = mysqli_query($conn,$addQuery);
                                if ($addRes) {
                                    echo '
                                    <div class="toast-container position-fixed top-0 end-0 p-3 ">
                                        <div id="liveToast" class="toast show bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="toast-header justify-content-between">
                                                <div>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                                </div>
                                            </div>
                                            <div class="toast-body text-white">
                                              Result has been Added
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                }
                            }
                            ?>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>