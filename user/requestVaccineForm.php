<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <?php
    //   session_start();
    include('connection.php');
    ?>

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<style>
    * {
        padding: 0;
        margin: 0;
        font-family: 'Playfair Display', serif;
    }
</style>

<body>
    <?php
    include('navbar.php');
    if (isset($_SESSION['f_name'])) {
        $Id = $_GET['id'] ?? "";

        $getVaccine = "SELECT * FROM `vaccines` WHERE hospital_id = '$Id'";
        $responseVaccine = mysqli_query($conn, $getVaccine) or die('no vaccine');
        // $vaccineName = mysqli_fetch_assoc($responseVaccine);
    } else {
        echo "<script>
        window.location.href = 'auth.php'
            </script>";
    }
    ?>

    <main>
        <div>
            <div class="my-5 mx-5 row row-cols-1 row-cols-md-4 justify-content-between">
                <div>
                    <h1 class="text-black-50">Request Form</h1>
                </div>
            </div>
            <div class="container">
                <form action="requestVaccineForm.php" method="POST">
                    <div>
                        <input name="hospital_id" type='hidden' value="<?php echo $Id; ?> " id='req_id'>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="my-2 ">
                            <input type="text" name="name" placeholder="Patient name" id="" class="form-control " required>
                        </div>
                        <div class="my-2 ">
                            <input type="text" name="email" placeholder="Email" id="" class="form-control " required>
                        </div>
                        <div class="my-2 ">
                            <input type="text" name="age" placeholder="Patient Age" id="" class="form-control " required>
                        </div>
                        <div class="my-2 ">
                            <input type="text" name="address" placeholder="Write complete address" id="" class="form-control " required>
                        </div>
                        <div class="my-2 ">
                            <input type="text" name="bloodGroup" placeholder="Patient blood group" id="" class="form-control " required>
                        </div>
                        <div>
                            <select name="vaccine" id="" class="form-select">
                                <option value="0" selected disabled>--Select Vaccine--</option>
                                <?php
                                while ($vaccine = mysqli_fetch_assoc($responseVaccine)) {
                                    echo "<option value='" . $vaccine['name'] . "'>" . $vaccine['name'] . "</option>";
                                }
                                ?>
                            </select>


                        </div>
                    </div>
                    <h4 class="mt-3">Your availabity</h4>
                    <div class="row row-cols-1 row-cols-md-2 mt-4">
                        <div class="col-6">
                            <label for="">From Date</label>
                            <input type="date" name="from" id="" class="form-control " required>
                        </div>
                        <div class="col-6">
                            <label for="">To Date</label>
                            <input type="date" name="to" id="" class="form-control " required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-4" name="reqBtn">Submit</button>
                </form>
            </div>
        </div>
        <?php
        if (isset($_POST['reqBtn'])) {
            $userId = $_SESSION['f_name'];
            $getUserQuery = "select * from users where email_phone = '$userId'";
            $userRes = mysqli_query($conn, $getUserQuery);
            $data = mysqli_fetch_assoc($userRes);
            $usid = $data['id'];

            $name = $_POST['name'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $address = $_POST['address'];
            $bloodGroup = $_POST['bloodGroup'];
            $vaccine = $_POST['vaccine'];
            $from = $_POST['from'];
            $to = $_POST['to'];
            $hospital_id = $_POST['hospital_id'];

            $insertQuery = "INSERT INTO `test_request` (`name`, `email`, `age`, `home_address`, `blood_group`, `vaccine`, `availabity_from`, `availabity_to`, `isapprove`, `type`, `hospital_id`, `user_id`) VALUES ('$name', '$email', '$age', '$address', '$bloodGroup', '$vaccine', '$from', '$to', 'pending', 'vaccine', '$hospital_id', '$usid')";
            $res = mysqli_query($conn, $insertQuery);

            if ($res) {
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
                               Your request has been submited
                            </div>
                        </div>
                    </div>
                    ';
            }
        }
        ?>
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