<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php
    session_start();
    include('connection.php');
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>

<style>
    .tooglePass {
        position: absolute;
        bottom: 62px;
        right: 295px;
        cursor: pointer;
    }

    .toogleCurrentPass {
        position: absolute;
        bottom: 106px;
        right: 295px;
        cursor: pointer;
    }
</style>

<body>
    <header>

    </header>
    <?php
    if (isset($_SESSION['f_name'])) {
        $getUser = $_SESSION['f_name'];
        $userQuery = "SELECT * FROM users WHERE email_phone = '$getUser'";
        $resUserQuery = mysqli_query($conn, $userQuery);
        $userData = mysqli_fetch_assoc($resUserQuery);
        $userId = $userData['id'];
    } else {
        echo '<script type="text/javascript">window.location.href = "auth.php";</script>';
    }
    ?>
    <div class="content container">
        <div class="pt-3">
            <h3 class="h2 mb-0 text-capitalize d-flex align-items-center gap-2">
                My Appointments
            </h3>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link text-black active" id="username-tab" data-bs-toggle="tab" data-bs-target="#username" type="button" role="tab" aria-controls="username" aria-selected="true">Test Appointments</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link text-black" id="password-tab" data-bs-toggle="tab" data-bs-target="#passwordTab" type="button" role="tab" aria-controls="passwordTab" aria-selected="false">Vaccine Appointments</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- username -->
                            <div class="tab-pane active" id="username" role="tabpanel" aria-labelledby="username-tab" tabindex="0">
                                <div class="mt-5">
                                    <?php
                                    $testQuery = "SELECT test_request.*, hospital.name AS hospital_name 
                                   FROM `test_request` 
                                   INNER JOIN hospital ON test_request.hospital_id = hospital.id 
                                   WHERE user_id = '$userId' AND type= 'test' ORDER BY id DESC";
                                    $res = mysqli_query($conn, $testQuery);
                                    if (mysqli_num_rows($res) != 0) {
                                        while ($data = mysqli_fetch_assoc($res)) {
                                            $statusClass = ($data['isapprove'] === 'pending') ? 'text-info' : 'text-success';
                                            echo '
                                            <div class="alert alert-primary
                                            " role="alert">
                                                <span class="fw-bold"> Id#' . $data['id'] . '</span><br>
                                                <span class="fw-bold text-center"> Hospital:' . " " . $data['hospital_name'] . '</span>
                                                <div>Your Apointment is <span class="fw-bold">' . $data['isapprove'] . '</span> from <span class="fw-bold">' . $data['availabity_from'] . '</span> to <span class="fw-bold">' . $data['availabity_to'] . '</span></div> 
                                                <div>
                                                <span class="fw-bold">Message:</span>
                                                <span>' . $data['message'] . ' </span>
                                                </div>
                                            </div>
                                            ';
                                        }
                                    } else {
                                        echo '
                                        <h4 class="text-center">No Test Appointment</h4>
                                        ';
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- Password -->
                            <div class="tab-pane" id="passwordTab" role="tabpanel" aria-labelledby="password-tab" tabindex="0">
                                <div class="mt-5">
                                    <?php
                                    $testQuery = "SELECT test_request.*, hospital.name AS hospital_name 
                                   FROM `test_request` 
                                   INNER JOIN hospital ON test_request.hospital_id = hospital.id 
                                   WHERE user_id = '$userId' AND type= 'vaccine' ORDER BY id DESC";
                                    $res = mysqli_query($conn, $testQuery);
                                    if (mysqli_num_rows($res) != 0) {
                                        while ($data = mysqli_fetch_assoc($res)) {
                                            $statusClass = ($data['isapprove'] === 'pending') ? 'text-info' : 'text-success';
                                            echo '
                                            <div class="alert alert-primary" role="alert">
                                                <span class="fw-bold"> Id#' . $data['id'] . '</span><br>
                                                <span class="fw-bold text-center"> Hospital:' . " " . $data['hospital_name'] . '</span><br>
                                                <span class="fw-bold text-center"> Vaccine:' . " " . $data['vaccine'] . '</span>
                                                <div>Your Apointment is <span class="fw-bold">' . $data['isapprove'] . '</span> from <span class="fw-bold">' . $data['availabity_from'] . '</span> to <span class="fw-bold">' . $data['availabity_to'] . '</span></div>
                                                <div>
                                                <span class="fw-bold">Message:</span>
                                                <span>' . $data['message'] . ' </span>
                                                </div> 
                                            </div>
                                            ';
                                        }
                                    } else {
                                        echo '
                                        <h4 class="text-center">No Vaccination Appointment</h4>
                                        ';
                                    }
                                    ?>
                                </div>



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