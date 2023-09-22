<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-Test Appointment List</title>
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
        // echo $_SESSION['username'];
        // echo '<script type="text/javascript">toastr.success("Have Fun")</script>';
        include('navBar.php');
    } else {
        header('location:login.php');
    }
    ?>
    <div class="content container">
        <div class="pt-3">
            <h3 class="h2 mb-0 text-capitalize d-flex align-items-center gap-2">
                Covid Test Request
            </h3>
        </div>
        <?php
            $hospitalName = $_SESSION['name'];
            $hospitalIdQuery = "SELECT * FROM `hospital` WHERE name = '$hospitalName'";
            $cRes = mysqli_query($conn,$hospitalIdQuery)or die('hospital is not found');
            $hospitalData = mysqli_fetch_assoc($cRes);

            $hospitalId = $hospitalData['id'];
        ?>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <label for="">Select status <span class="text-danger">*</span></label><br> -->
                        <div class="d-flex justify-content-between">
                            <!-- <form action="" method="POST" class="d-flex">
                                <div>
                                    <select class="form-select w-auto" name="status">
                                        <option value="Pending">Pending</option>
                                        <option value="Accepted">Accepted</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </div>
                                <button class="btn btn-info btn-sm mx-2 text-white" name="searchBtn">Search</button>
                            </form> -->
                            <form action="" method="POST">
                                <!-- <button class="btn btn-primary btn-sm mx-2 text-white" name="Reset">Reset Filter</button> -->
                                <a class="btn btn-success" href="testReq.php">
                                    <span>New Appointment Request</span>
                                    <span class="badge">
                                        <?php
                                        $query = "SELECT * FROM test_request WHERE hospital_id = '$hospitalId' AND type = 'test' AND isapprove = 'pending'";
                                        $result = mysqli_query($conn, $query);
                                        echo mysqli_num_rows($result);
                                        ?>
                                    </span>
                                </a>
                            </form>

                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive overflow-auto h-100 w-100">
                            <table class="table col-md-9" style="overflow-x: auto">
                                <thead class="thead-light thead-50 text-capitalize" style="width:auto">
                                    <?php
                                    if (isset($_POST['searchBtn'])) {
                                        $status = $_POST['status'];
                                        $query = "SELECT * FROM test_request WHERE hospital_id = '$hospitalId' AND type = 'test' AND isapprove = 'accepted'";
                                        $result = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($result) != 0) {
                                            echo "
                                            <tr>
                                            <th>Patient name</th>
                                            <th>Patient email</th>
                                            <th>Patient age</th>
                                            <th>address</th>
                                            <th>Blood group</th>
                                            <th>Availabity from</th>
                                            <th>Availabity to</th>
                                            <th>Appointment ID#</th>
                                            </tr>
                                            ";
                                            while ($data = mysqli_fetch_assoc($result)) {
                                                echo "
                                                    <tr>
                                                    <td>" . $data['name'] . "</td>
                                                    <td>" . $data['email'] . "</td>
                                                    <td>" . $data['age'] . "</td>
                                                    <td>" . $data['home_address'] . "</td>
                                                    <td>" . $data['blood_group'] . "</td>
                                                    <td>" . $data['availabity_from'] . "</td>
                                                    <td>" . $data['availabity_to'] . "</td>
                                                    <td class='fw-bold'>" . $data['id'] . "</td>
                                                    </tr>";
                                            }
                                        } else {
                                            echo "
                                                <h2 class='text-center'>No Data</h2>
                                            ";
                                        }
                                    } else if (isset($_POST['Reset'])) {
                                        $query = "SELECT * FROM test_request WHERE hospital_id = '$hospitalId' AND type = 'test' AND isapprove = 'accepted'";
                                        $result = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($result) != 0) {
                                            echo "
                                            <tr>
                                            <th>Patient name</th>
                                            <th>Patient email</th>
                                            <th>Patient age</th>
                                            <th>address</th>
                                            <th>Blood group</th>
                                            <th>Availabity from</th>
                                            <th>Availabity to</th>
                                            <th>Appointment ID#</th>
                                            </tr>
                                            ";
                                            while ($data = mysqli_fetch_assoc($result)) {
                                                echo "
                                                    <tr>
                                                    <td>" . $data['name'] . "</td>
                                                    <td>" . $data['email'] . "</td>
                                                    <td>" . $data['age'] . "</td>
                                                    <td>" . $data['home_address'] . "</td>
                                                    <td>" . $data['blood_group'] . "</td>
                                                    <td>" . $data['availabity_from'] . "</td>
                                                    <td>" . $data['availabity_to'] . "</td>
                                                    <td class='fw-bold'>" . $data['id'] . "</td>
                                                    </tr>";
                                            }
                                        } else {
                                            echo "<h2 class='text-center'>No Data</h2>";
                                        }
                                    } else {
                                        $query = "SELECT * FROM test_request WHERE hospital_id = '$hospitalId' AND type = 'test' AND isapprove = 'accepted'";
                                        $result = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($result) != 0) {
                                            echo "
                                            <tr>
                                            <th>Patient name</th>
                                            <th>Patient email</th>
                                            <th>Patient age</th>
                                            <th>address</th>
                                            <th>Blood group</th>
                                            <th>Availabity from</th>
                                            <th>Availabity to</th>
                                            <th>Appointment ID#</th>
                                            </tr>
                                            ";
                                            while ($data = mysqli_fetch_assoc($result)) {
                                                echo "
                                                    <tr>
                                                    <td>" . $data['name'] . "</td>
                                                    <td>" . $data['email'] . "</td>
                                                    <td>" . $data['age'] . "</td>
                                                    <td>" . $data['home_address'] . "</td>
                                                    <td>" . $data['blood_group'] . "</td>
                                                    <td>" . $data['availabity_from'] . "</td>
                                                    <td>" . $data['availabity_to'] . "</td>
                                                    <td class='fw-bold'>" . $data['id'] . "</td>
                                                    </tr>";
                                            }
                                        } else {
                                            echo "<h2 class='text-center'>No Data</h2>";
                                        }
                                    }
                                    ?>
                                </thead>

                            </table>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>