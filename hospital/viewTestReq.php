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
                View Test
            </h3>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-secondary" href="testReq.php"><i class="bi bi-arrow-left"></i>Back</a>
                            <div class="d-flex">
                                <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#accModal">Accept</button>
                                <div class="modal fade" id="accModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form action="" method="POST" class="mx-2">
                                                    <input type="hidden" name="id" value="<?php echo $Id ?>">
                                                    <textarea name="message" class="form-control" placeholder="Write the Message !" id="" cols="30" rows="10" required></textarea>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" name="markBtn">Accept</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#rejModal">Reject</button>
                                <div class="modal fade" id="rejModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form action="" method="POST" class="mx-2">
                                                    <input type="hidden" name="id" value="<?php echo $Id ?>">
                                                    <textarea name="message" class="form-control" placeholder="Write the Message !" id="" cols="30" rows="10" required></textarea>
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger" name="rejBtn">Reject</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        if (isset($_POST['rejBtn'])) {
                            $id = $_POST['id'];
                            $message = $_POST['message'];
                            $markQuery = "UPDATE test_request SET isapprove = 'rejected', message = '$message' WHERE id='$id'";
                            $markRes = mysqli_query($conn, $markQuery);
                            if ($markRes) {
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
                                                Rejected! Request has been Rejected for' . $availabity_from . ' to ' . $availabity_to . ' 
                                            </div>
                                        </div>
                                    </div>';
                            } else {
                                echo '
                                    <div class="toast-container position-fixed top-0 end-0 p-3 ">
                                        <div id="liveToast" class="toast show bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="toast-header justify-content-between">
                                                <div>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                                </div>
                                            </div>
                                            <div class="toast-body text-white">
                                                Oops! Something went wrong
                                            </div>
                                        </div>
                                    </div>
                                    ';
                            }
                        }

                        if (isset($_POST['markBtn'])) {
                            $id = $_POST['id'];
                            $message = $_POST['message'];
                            $markQuery = "UPDATE test_request SET isapprove = 'accepted', message = '$message' WHERE id='$id'";
                            $markRes = mysqli_query($conn, $markQuery);
                            if ($markRes) {
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
                                                Accepted! Request has been accepted for' . $availabity_from . ' to ' . $availabity_to . ' 
                                            </div>
                                        </div>
                                    </div>';
                            } else {
                                echo '
                                    <div class="toast-container position-fixed top-0 end-0 p-3 ">
                                        <div id="liveToast" class="toast show bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="toast-header justify-content-between">
                                                <div>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                                </div>
                                            </div>
                                            <div class="toast-body text-white">
                                                Oops! Something went wrong
                                            </div>
                                        </div>
                                    </div>
                                    ';
                            }
                        }
                        ?>
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