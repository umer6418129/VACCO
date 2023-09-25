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
                    Add New Vaccine
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
                                <a class="btn btn-secondary" href="vaccineList.php"><i class="bi bi-arrow-left"></i>Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <div style="overflow-x: auto; width: 100%;">
                                <div class="col-md-8 mx-auto">
                                <form action="" method="POST">
                                <input type="text" name="name" id="" class="form-control my-2" placeholder="Vaccine Name">
                                <input type="text" name="formula" id="" class="form-control my-2" placeholder="Vaccine Formula">
                                <button type="submit" class="btn btn-success" name="addVaccine">Add Vaccine</button>
                                </form>
                                <?php
                                if (isset($_POST['addVaccine'])) {
                                    $name = $_POST['name'];
                                    $formula = $_POST['formula'];

                                    $addQuery = "INSERT INTO `vaccines`(`name`, `formula`, `availability`, `hospital_id`) VALUES ('$name','$formula','Available','$hospitalId')";
                                    $res = mysqli_query($conn,$addQuery);
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
                                                    Vaccine has been added 
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