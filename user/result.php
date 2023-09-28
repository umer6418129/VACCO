<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment-Results</title>
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
                Results
            </h3>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link text-black active" id="username-tab" data-bs-toggle="tab" data-bs-target="#username" type="button" role="tab" aria-controls="username" aria-selected="true">Test Results</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link text-black" id="password-tab" data-bs-toggle="tab" data-bs-target="#passwordTab" type="button" role="tab" aria-controls="passwordTab" aria-selected="false">Vaccine Results</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- username -->
                            <div class="tab-pane active" id="username" role="tabpanel" aria-labelledby="username-tab" tabindex="0">
                                <div class="mt-5">
                                    <?php
                                    $testQuery = "SELECT test_result.*, test_request.user_id AS user_id
                                    FROM test_result
                                    INNER JOIN test_request ON test_result.appointment_id = test_request.id
                                    WHERE test_request.type = 'test' AND user_id = '$userId'";
                                    $res = mysqli_query($conn, $testQuery);
                                    if (mysqli_num_rows($res) != 0) {
                                        while ($data = mysqli_fetch_assoc($res)) {
                                            echo '
                                            <div class="alert alert-primary
                                            " role="alert">
                                                <span class="fw-bold">Appointment Id# ' . $data['appointment_id'] . '</span><br>
                                                <div>
                                                    <span class="fw-bold">Test Date: </span>
                                                    <span>'.$data['test_date'].' </span>
                                                </div>
                                                <div>
                                                    <span class="fw-bold">Result: </span>
                                                    <span>'.$data['result'].'</span>
                                                </div> 
                                                <div>
                                                    <span class="fw-bold">Note:</span>
                                                    <span class="fw-semibold">Kindly come to hospital for certification or further process !</span>
                                                </div> 
                                            </div>
                                            ';
                                        }
                                    } else {
                                        echo '
                                        <h4 class="text-center">No Result</h4>
                                        ';
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- Password -->
                            <div class="tab-pane" id="passwordTab" role="tabpanel" aria-labelledby="password-tab" tabindex="0">
                                <div class="mt-5">
                                <?php
                                    $testQuery = "SELECT test_result.*, test_request.user_id AS user_id
                                    FROM test_result
                                    INNER JOIN test_request ON test_result.appointment_id = test_request.id
                                    WHERE test_request.type = 'vaccine' AND user_id = '$userId'";
                                    $res = mysqli_query($conn, $testQuery);
                                    if (mysqli_num_rows($res) != 0) {
                                        while ($data = mysqli_fetch_assoc($res)) {
                                            echo '
                                            <div class="alert alert-primary
                                            " role="alert">
                                                <span class="fw-bold">Appointment Id# ' . $data['appointment_id'] . '</span><br>
                                                <div>
                                                    <span class="fw-bold">Vaccine: </span>
                                                    <span>'.$data['vaccine'].' </span>
                                                </div> 
                                                <div>
                                                    <span class="fw-bold">Vaccination Date: </span>
                                                    <span>'.$data['test_date'].' </span>
                                                </div> 
                                                <div>
                                                    <span class="fw-bold">Status: </span>
                                                    <span> Done </span>
                                                </div>
                                                <div>
                                                    <span class="fw-bold">Note:</span>
                                                    <span class="fw-semibold">Kindly come to hospital for certification or further process !</span>
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
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>