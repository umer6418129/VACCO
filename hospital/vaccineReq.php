<!doctype html>
<html lang="en">

<head>
    <title>Test-Request</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    include('connection.php');
    session_start();
    ?>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <?php
        if (isset($_SESSION['name'])) {
            include('navBar.php');
        } else {
            header('location:auth.php');
        }
        ?>
        <div class="content container">
            <div class="pt-3">
                <h3 class="h2 mb-0 text-capitalize d-flex align-items-center gap-2">
                    Vaccination Rquests
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
                            <div>
                                <a class="btn btn-secondary" href="vaccineAppointmentList.php"><i class="bi bi-arrow-left"></i>Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <div style="overflow-x: auto; width: 100%;">
                                <table class="table">
                                    <thead class="thead-light thead-50 text-capitalize">
                                        <?php
                                        $query = "SELECT * FROM test_request WHERE hospital_id = '$hospitalId' AND type = 'vaccine' AND isapprove = 'pending'";
                                        $result = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($result) != 0) {
                                            echo "
                                            <tr>
                                                <th>Patient name</th>
                                                <th>Patient email</th>
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
                                                    <td>" . $data['availabity_from'] . "</td>
                                                    <td>" . $data['availabity_to'] . "</td>
                                                    <td class='d-flex'>
                                                        <a href='viewVaccineReq.php?id=$data[id]&name=$data[name]&email=$data[email]&age=$data[age]&home_address=$data[home_address]&blood_group=$data[blood_group]&availabity_from=$data[availabity_from]&availabity_to=$data[availabity_to]&vaccine=$data[vaccine]' class='btn btn-success'>View Request</a>
                                                    </td>
                                                </tr>";
                                            }
                                        } else {
                                            echo "<h2 class='text-center'>No Request</h2>";
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
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>