<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updates-Vaccine Status</title>
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
        $formula = $_GET['formula'] ?? "";
        $availability = $_GET['availability'] ?? "";
    } else {
        header('location:login.php');
    }
    ?>
    <div class="content container">
        <div class="pt-3">
            <h3 class="h2 mb-0 text-capitalize d-flex align-items-center gap-2">
                Update Status
            </h3>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <div class="col-md-6 mx-auto">
                        <div class="d-flex justify-content-between my-2">
                            <span class="fw-bold">Name:</span>
                            <span class="fw-bold"><?php echo $name ?></span>
                        </div>
                        <div class="d-flex justify-content-between my-2">
                            <span class="fw-bold">Formula:</span>
                            <span class="fw-bold"><?php echo $formula ?></span>
                        </div>
                    </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" class="col-md-6 mx-auto mt-5">
                            <label for="">Select Status <span class="text-danger">*</span></label>
                            <select name="availability" id="" class="form-select my-3">
                                <option value="Available" >Available</option>
                                <option value="Unavailable" >Unavailable</option>
                            </select>
                            <button type="submit" class="btn btn-success" name="updateStatus">Update Status</button>
                        </form>
                        <?php
                        if (isset($_POST['updateStatus'])) {
                            $availability =$_POST['availability'];
                            $updateStatus = "UPDATE `vaccines` SET `availability`='$availability' WHERE id = '$Id'";
                            $updateRes = mysqli_query($conn,$updateStatus);
                            if ($updateRes) {
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
                                                Status has been Updated 
                                            </div>
                                        </div>
                                    </div>';
                            }else{
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
                                                Something went Wrong ! 
                                            </div>
                                        </div>
                                    </div>';
                            }
                        }
                        ?>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>