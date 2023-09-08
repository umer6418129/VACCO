<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccines-List</title>
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

<body>
    <?php
    if (isset($_SESSION['username'])) {
        include('navBar.php');
    } else {
        header('location:auth.php');
    }
    ?>
    <div class="content container">
        <div class="pt-3">
            <h3 class="h2 mb-0 text-capitalize d-flex align-items-center gap-2">
                Vaccine List
            </h3>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <form action="" method="POST" class="d-flex">
                                <div>
                                    <select class="form-select w-auto" name="availability">
                                        <option value="Available">Available</option>
                                        <option value="Unavailable">Unavailable</option>
                                    </select>
                                </div>
                                <button class="btn btn-info btn-sm mx-2 text-white" name="searchBtn">Search</button>
                            </form>
                            <form action="" method="POST">
                                <button class="btn btn-primary btn-sm mx-2 text-white" name="Reset">Reset Filter</button>
                            </form>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light thead-50 text-capitalize">
                                    <?php
                                    if (isset($_POST['searchBtn'])) {
                                        $availability = $_POST['availability'];
                                        $query = "SELECT vaccines.name AS vaccine_name, vaccines.formula, hospital.name AS hospital_name, vaccines.availability
                                              FROM vaccines
                                              INNER JOIN hospital ON vaccines.hospital_id = hospital.id
                                              WHERE vaccines.availability = '$availability'";
                                        $result = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($result) != 0) {
                                            echo "
                                            <tr>
                                                <th>Vaccine Name</th>
                                                <th>Formula</th>
                                                <th>Owner Hospital</th>
                                                <th>Availability</th>
                                            </tr>
                                            ";

                                            while ($data = mysqli_fetch_assoc($result)) {
                                                echo "
                                                <tr>
                                                    <td>" . $data['vaccine_name'] . "</td>
                                                    <td>" . $data['formula'] . "</td>
                                                    <td>" . $data['hospital_name'] . "</td>
                                                    <td>" . $data['availability'] . "</td>
                                                </tr>";
                                            }
                                        } else {
                                            echo "
                                                <h2 class='text-center'>No Data</h2>
                                            ";
                                        }
                                    } else if (isset($_POST['Reset'])) {
                                        $query = "SELECT vaccines.name AS vaccine_name, vaccines.formula, hospital.name AS hospital_name, vaccines.availability
                                        FROM vaccines
                                        INNER JOIN hospital ON vaccines.hospital_id = hospital.id";
                                        $result = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($result) != 0) {
                                            echo "
                                            <tr>
                                                <th>Vaccine Name</th>
                                                <th>Formula</th>
                                                <th>Owner Hospital</th>
                                                <th>Availability</th>
                                            </tr>
                                            ";

                                            while ($data = mysqli_fetch_assoc($result)) {
                                                echo "
                                                    <tr>
                                                        <td>" . $data['vaccine_name'] . "</td>
                                                        <td>" . $data['formula'] . "</td>
                                                        <td>" . $data['hospital_name'] . "</td>
                                                        <td>" . $data['availability'] . "</td>
                                                    </tr>";
                                            }
                                        } else {
                                            echo "
                                          <h2 class='text-center'>No Data</h2>
                                            ";
                                        }
                                    }else{
                                        $query = "SELECT vaccines.name AS vaccine_name, vaccines.formula, hospital.name AS hospital_name, vaccines.availability
                                        FROM vaccines
                                        INNER JOIN hospital ON vaccines.hospital_id = hospital.id";
                                        $result = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($result) != 0) {
                                            echo "
                                            <tr>
                                                <th>Vaccine Name</th>
                                                <th>Formula</th>
                                                <th>Owner Hospital</th>
                                                <th>Availability</th>
                                            </tr>
                                            ";

                                            while ($data = mysqli_fetch_assoc($result)) {
                                                echo "
                                                    <tr>
                                                        <td>" . $data['vaccine_name'] . "</td>
                                                        <td>" . $data['formula'] . "</td>
                                                        <td>" . $data['hospital_name'] . "</td>
                                                        <td>" . $data['availability'] . "</td>
                                                    </tr>";
                                            }
                                        } else {
                                            echo "
                                          <h2 class='text-center'>No Data</h2>
                                            ";
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