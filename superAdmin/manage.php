<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
    <?php
    if (isset($_SESSION['username'])) {
        // echo $_SESSION['username'];
        // echo '<script type="text/javascript">toastr.success("Have Fun")</script>';
        include('navBar.php');
    } else {
        echo '<script type="text/javascript">window.location.href = "auth.php";</script>';
    }
    ?>
    <div class="content container">
        <div class="pt-3">
            <h3 class="h2 mb-0 text-capitalize d-flex align-items-center gap-2">
                Setting
            </h3>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <!-- Empty div to push the button to the right -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="username-tab" data-bs-toggle="tab" data-bs-target="#username" type="button" role="tab" aria-controls="username" aria-selected="true">Change Username</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#passwordTab" type="button" role="tab" aria-controls="passwordTab" aria-selected="false">Change Password</button>
                                </li>
                            </ul>
                            <a class="btn btn-danger" href="logout.php">Logout</a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="username" role="tabpanel" aria-labelledby="username-tab" tabindex="0">

                            </div>
                            <!-- Password -->
                            <div class="tab-pane" id="passwordTab" role="tabpanel" aria-labelledby="password-tab" tabindex="0">
                                <form action="" method="POST" class="col-6 mx-auto mt-5">
                                    <input type="password" name="currentPassword" placeholder="Enter Current Password" id="currentPassword" class="form-control my-2" required />
                                    <i class="bi bi-eye-fill toogleCurrentPass text-black" id="showCurrentPassword"></i>
                                    <i class="bi bi-eye-slash-fill toogleCurrentPass text-black" id="hideCurrentPassword"></i>
                                    <input type="text" name="NewPassword" id="password" class="form-control my-2" placeholder="Enter New Password" required />
                                    <i class="bi bi-eye-fill tooglePass text-black" id="showPassword"></i>
                                    <i class="bi bi-eye-slash-fill tooglePass text-black" id="hidePassword"></i>
                                    <a id="changeModalBtn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#changeModal">Change</a>
                                    <!-- modal -->
                                    <div class="modal fade" id="changeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3 class="text-dark text-center">Are you sure to Change Password ?</h3>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" id="changePassword" class="btn btn-primary" name="changebtn">Change</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <?php
                                if (isset($_POST['changebtn'])) {
                                    if (isset($_SESSION['username'])) {
                                        $name = $_SESSION['username'];
                                        $query = "select * from super_admin where username = '$name'";
                                        $res = mysqli_query($conn, $query); // Corrected variable name here
                                        $data = mysqli_fetch_assoc($res);

                                        $currentPass = $data['password_hash'];
                                        $id = $data['id'];

                                        $current = $_POST['currentPassword'];
                                        $new = $_POST['NewPassword'];

                                        $checkquery = "select * from super_admin where password_hash = '$current'";
                                        $checkResult = mysqli_query($conn, $checkquery);
                                        if (mysqli_num_rows($checkResult) != 1) {
                                            echo '<script>
                                            alert("Please type correct Password")
                                            </script>';
                                        } else {
                                            $updateQuery = "update super_admin set password_hash = '$new' where id = '$id'";
                                            $checkUpdate = mysqli_query($conn, $updateQuery);
                                            if ($checkUpdate) {
                                                echo '<script>
                                                alert("Password has been Updated")
                                                </script>';
                                            }else{
                                                echo '<script>
                                                alert("Something went wrong, kindly try it again !")
                                                </script>';
                                            }
                                        }
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
    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordIcon = document.getElementById('showPassword');
        const hidePasswordIcon = document.getElementById('hidePassword');

        passwordInput.type = 'password';
        hidePasswordIcon.style.display = 'none';
        showPasswordIcon.addEventListener('click', () => {
            passwordInput.type = 'text';
            showPasswordIcon.style.display = 'none';
            hidePasswordIcon.style.display = 'inline-block';
        });

        hidePasswordIcon.addEventListener('click', () => {
            passwordInput.type = 'password';
            hidePasswordIcon.style.display = 'none';
            showPasswordIcon.style.display = 'inline-block';
        });

        const currentPasswordInput = document.getElementById('currentPassword');
        const showCurrentPasswordIcon = document.getElementById('showCurrentPassword');
        const hideCurrentPasswordIcon = document.getElementById('hideCurrentPassword');
        currentPasswordInput.type = 'password';
        hideCurrentPasswordIcon.style.display = 'none';
        showCurrentPasswordIcon.addEventListener('click', () => {
            currentPasswordInput.type = 'text';
            showCurrentPasswordIcon.style.display = 'none';
            hideCurrentPasswordIcon.style.display = 'inline-block';
        });

        hideCurrentPasswordIcon.addEventListener('click', () => {
            currentPasswordInput.type = 'password';
            hideCurrentPasswordIcon.style.display = 'none';
            showCurrentPasswordIcon.style.display = 'inline-block';
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>