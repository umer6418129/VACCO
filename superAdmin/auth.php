<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
    }

    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
    }

    .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #1764a3;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }

    .form button:hover,
    .form button:active,
    .form button:focus {
        background: #227dc7;
    }

    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
    }

    .form .message a {
        color: #4CAF50;
        text-decoration: none;
    }

    .form .register-form {
        display: none;
    }

    .container {
        position: relative;
        z-index: 1;
        max-width: 300px;
        margin: 0 auto;
    }

    .container:before,
    .container:after {
        content: "";
        display: block;
        clear: both;
    }

    .container .info {
        margin: 50px auto;
        text-align: center;
    }

    .container .info h1 {
        margin: 0 0 15px;
        padding: 0;
        font-size: 36px;
        font-weight: 300;
        color: #1a1a1a;
    }

    .container .info span {
        color: #4d4d4d;
        font-size: 12px;
    }

    .container .info span a {
        color: #000000;
        text-decoration: none;
    }

    .container .info span .fa {
        color: #EF3B3A;
    }

    h1 {
        color: #1764a3;
    }

    body {
        background: #0342a1;
        /* fallback for old browsers */
        /* background: rgb(141,194,111); */
        background: #1764a3;
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .tooglePass{
    position: absolute;
    bottom: 127px;
    left: 293px;
    cursor: pointer;
    }
</style>

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
    include('connection.php');
    session_start();

    if (isset($_POST['btn'])) {
        $username= $_POST['username'];
        $password_hash= $_POST['password_hash'];

        $query = "select * from super_admin where username='$username' and password_hash='$password_hash'";
        $res = mysqli_query($conn,$query);
        $total = mysqli_num_rows($res);
        if ($total == 1) {
            $_SESSION['username']=$username;
            header('location:index.php');
          }else{
            header('location:login.php');
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