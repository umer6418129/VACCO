<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital-List</title>
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
                Vaccination Approved Patients
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
                                <a class="btn btn-success" href="vaccineReq.php">
                                    <span>New Appointment Request</span>
                                    <span class="badge">
                                        <?php
                                        $query = "SELECT * FROM test_request WHERE hospital_id = '$hospitalId' AND type = 'vaccine' AND isapprove = 'pending'";
                                        $result = mysqli_query($conn, $query);
                                        echo mysqli_num_rows($result);
                                        ?>
                                    </span>
                                </a>
                            </form>

                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light thead-50 text-capitalize">
                                    <?php
                                    if (isset($_POST['searchBtn'])) {
                                        $status = $_POST['status'];
                                        $query = "SELECT * FROM test_request WHERE hospital_id = '$hospitalId' AND type = 'vaccine' AND isapprove = 'accepted'";
                                        $result = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($result) != 0) {
                                            echo "
                                            <tr>
                                                <th>Patient name</th>
                                                <th>Email</th>
                                                <th>Vaccine</th>
                                                <th>Availabity from</th>
                                                <th>Availabity to</th>
                                                <th>Action</th>

                                            </tr>
                                            ";
                                            while ($data = mysqli_fetch_assoc($result)) {
                                                echo "
                                                    <tr>
                                                        <td>" . $data['name'] . "</td>
                                                        <td>" . $data['email'] . "</td>
                                                        <td>" . $data['vaccine'] . "</td>
                                                        <td>" . $data['availabity_from'] . "</td>
                                                        <td>" . $data['availabity_to'] . "</td>
                                                        <td class='d-flex'>
                                                            <a href='viewVaccinePatient.php ?id=$data[id]&name=$data[name]&email=$data[email]&age=$data[age]&home_address=$data[home_address]&blood_group=$data[blood_group]&availabity_from=$data[availabity_from]&availabity_to=$data[availabity_to]' class='btn btn-sm btn-sm btn-success'>View</a>
                                                            <a class='btn btn-sm btn-danger ms-2' href = 'approvedReqDel.php ?id=$data[id]'>Delete</a>
                                                        </td>
                                                    </tr>";
                                            }
                                        } else {
                                            echo "
                                                <h2 class='text-center'>No Data</h2>
                                            ";
                                        }
                                    } else if (isset($_POST['Reset'])) {
                                        $query = "SELECT * FROM test_request WHERE hospital_id = '$hospitalId' AND type = 'vaccine' AND isapprove = 'accepted'";
                                        $result = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($result) != 0) {
                                            echo "
                                            <tr>
                                                <th>Patient name</th>
                                                <th>Email</th>
                                                <th>Vaccine</th>
                                                <th>Availabity from</th>
                                                <th>Availabity to</th>
                                                <th>Action</th>

                                            </tr>
                                            ";
                                            while ($data = mysqli_fetch_assoc($result)) {
                                                echo "
                                                    <tr>
                                                       <td>" . $data['name'] . "</td>
                                                       <td>" . $data['email'] . "</td>
                                                       <td>" . $data['vaccine'] . "</td>
                                                        <td>" . $data['availabity_from'] . "</td>
                                                        <td>" . $data['availabity_to'] . "</td>
                                                        <td class='d-flex'>
                                                            <a href='viewVaccinePatient.php ?id=$data[id]&name=$data[name]&email=$data[email]&age=$data[age]&home_address=$data[home_address]&blood_group=$data[blood_group]&availabity_from=$data[availabity_from]&availabity_to=$data[availabity_to]' class='btn btn-sm btn-success'>View</a>
                                                            <a class='btn btn-sm btn-danger ms-2' href = 'approvedReqDel.php ?id=$data[id]'>Delete</a>
                                                        </td>
                                                    </tr>";
                                            }
                                        } else {
                                            echo "<h2 class='text-center'>No Data</h2>";
                                        }
                                    } else {
                                        $query = "SELECT * FROM test_request WHERE hospital_id = '$hospitalId' AND type = 'vaccine' AND isapprove = 'accepted'";
                                        $result = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($result) != 0) {
                                            echo "
                                            <tr>
                                                <th>Patient name</th>
                                                <th>Email</th>
                                                <th>Vaccine</th>
                                                <th>Availabity from</th>
                                                <th>Availabity to</th>
                                                <th>Action</th>

                                            </tr>
                                            ";
                                            while ($data = mysqli_fetch_assoc($result)) {
                                                echo "
                                                    <tr>
                                                       <td>" . $data['name'] . "</td>
                                                       <td>" . $data['email'] . "</td>
                                                       <td>" . $data['vaccine'] . "</td>
                                                        <td>" . $data['availabity_from'] . "</td>
                                                        <td>" . $data['availabity_to'] . "</td>
                                                        <td class='d-flex'>
                                                            <a href='viewVaccinePatient.php ?id=$data[id]&name=$data[name]&email=$data[email]&age=$data[age]&home_address=$data[home_address]&blood_group=$data[blood_group]&availabity_from=$data[availabity_from]&availabity_to=$data[availabity_to]' class='btn btn-sm btn-success'>View</a>
                                                            <a class='btn btn-sm btn-danger ms-2' href = 'approvedReqDel.php ?id=$data[id]'>Delete</a>
                                                        </td>
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