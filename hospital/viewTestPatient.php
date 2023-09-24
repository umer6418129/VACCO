<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccines-Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <?php
    include('connection.php');

    session_start();
    ?>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <?php
    if (isset($_SESSION['name'])) {
        include('navBar.php');
        $Id = $_GET['id'] ?? "";
        $name = $_GET['name'] ?? "";
        $email = $_GET['email'] ?? "";
        $home_address = $_GET['home_address'] ?? "";
        $blood_group = $_GET['blood_group'] ?? "";
        $availabity_from = $_GET['availabity_from'] ?? "";
        $availabity_to = $_GET['availabity_to'] ?? "";
    } else {
        header('location:login.php');
    }
    ?>
    <div class="content container">
        <div class="pt-3">
            <h3 class="h2 mb-0 text-capitalize d-flex align-items-center gap-2">
                View Patient Details
            </h3>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-secondary" href="testAppointmentList.php"><i class="bi bi-arrow-left"></i>Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="d-flex  my-2 mt-3">
                                <h4 class="fw-bold">Appointment Id#</h4>
                                <h4 class="mx-3 fw-bold">
                                    <?php
                                    echo $Id;
                                    ?>
                                </h4>
                            </div>
                            <div class="d-flex  my-2 mt-3">
                                <h4 class="fw-bold">Name:</h4>
                                <h4 class="mx-3">
                                    <?php
                                    echo $name;
                                    ?>
                                </h4>
                            </div>
                            <div class="d-flex  my-2 mt-3">
                                <h4 class="fw-bold">Subject:</h4>
                                <h4 class="mx-3">
                                    <?php
                                    echo $email;
                                    ?>
                                </h4>
                            </div>
                            <div class="d-flex  my-2 mt-3">
                                <h4 class="fw-bold">Home Address:</h4>
                                <h4 class="mx-3">
                                    <?php
                                    echo $home_address;
                                    ?>
                                </h4>
                            </div>
                            <div class="d-flex  my-2 mt-3">
                                <h4 class="fw-bold">Blood Group:</h4>
                                <h4 class="mx-3">
                                    <?php
                                    echo $blood_group;
                                    ?>
                                </h4>
                            </div>
                            <div class="d-flex  my-2 mt-3">
                                <h4 class="fw-bold">Availabity:</h4>
                                <h4 class="mx-3">
                                    <?php
                                    echo $availabity_from . "<h3>-</h3>" . "<h4 class='mx-3'>" . $availabity_to . "</h4>";
                                    ?>
                                </h4>
                            </div>
                            <!-- <div class="col-4 mx-auto my-2 mt-3">
                                <h3 class="fw-bold">Detail</h3>    
                            </div> -->
                            

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>