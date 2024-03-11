<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-login</title>
    <!-- <link rel="stylesheet" src="../helpers/DataHelper.php"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <?php
    // include('connection.php');
    include('../database/config/DbConnect.php');
    include('../helpers/DataHelper.php');
    // var_dump($conn);
    // die();
    session_start();
    ?>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<style>
    <?php
    include('../assets/css/global.css');
    ?>
</style>
<!-- <a href="../assets/css/style.css"></a> -->

<body>
    <div class="login-page">
        <div class="form">
            <h1>Admin</h1>
            <form action="auth.php" method="POST" class="login-form">
                <input type="text" name="username" placeholder="username" />
                <input type="password" name="password_hash" id="password" placeholder="password" />
                <i class="bi bi-eye-fill tooglePass" id="showPassword"></i>
                <i class="bi bi-eye-slash-fill tooglePass" id="hidePassword"></i>
                <button type="submit" name="btn">login</button>
            </form>

        </div>
    </div>

    <?php
    if (isset($_POST['btn'])) {
        $username = $_POST['username'];
        $password_hash = base64_encode($_POST['password_hash']);
        // $table = "tbl_user";
        // $conditions = array("email" => $username, "password" => $password_hash);
        // $user = DataHelper::selectWithConditions($table, $conditions, $conn);
        $query = "SELECT tbl_user.*, tbl_userroles.name AS role_name 
          FROM tbl_user 
          INNER JOIN tbl_userroles ON tbl_user.role_id = tbl_userroles.id 
          WHERE tbl_user.email='$username' AND tbl_user.password='$password_hash'";
        $res = mysqli_query($conn, $query);
        $total = mysqli_num_rows($res);
        if ($total == 1) {
            $user_data = mysqli_fetch_assoc($res);
            $_SESSION['user'] = $user_data;
            $_SESSION['username'] = $username;
            echo '<script type="text/javascript">window.location.href = "dashboard.php";</script>';
            echo '<script type="text/javascript">toastr.success("Login Successfully")</script>';
        } else {
            echo '<script type="text/javascript">toastr.error("Incorrect username or password")</script>';
        }
    }
    ?>





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
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>