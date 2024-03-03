    <?php
    include('../../../helpers/globalVariablesHelper.php');
    $pageTitle = 'Login';
    include('master.php');
    ?>

    <body>
        <div class="main-wrapper">
            <div class="preloader">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>
            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="<?php echo globalVariablesHelper::$backgroundAuthImage ?>">
                <div class="auth-box">
                    <div id="loginform">
                        <div class="logo">
                            <span class="db"><img src="<?php echo globalVariablesHelper::$iconAuthPath ?>" alt="logo" /></span>
                            <h5 class="font-medium m-b-20">Sign In to Admin</h5>
                        </div>
                        <!-- Form -->
                        <div class="row">
                            <div class="col-12">
                                <form class="form-horizontal m-t-20" id="loginform" action="login.php" method="post">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                        </div>
                                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                                        </div>
                                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                    </div>
                                    <!-- <div class="form-group row">
                                        <div class="col-md-12">
                                            <a href="javascript:void(0)" id="to-recover" class="text-dark float-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>
                                        </div>
                                    </div> -->
                                    <div class="form-group text-center">
                                        <div class="col-xs-12 p-b-20">
                                            <button class="btn btn-block btn-lg btn-info" name="loginBtn" type="submit">Log In</button>
                                        </div>
                                    </div>
                                    <div class="form-group m-b-0 m-t-10">
                                        <div class="col-sm-12 text-center">
                                            Don't have an account? <a href="register.php" class="text-info m-l-5"><b>Sign Up</b></a> as Hopital
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <div id="recoverform">
                        <div class="logo">
                            <span class="db"><img src="../../../assets/images/logo-icon.png" alt="logo" /></span>
                            <h5 class="font-medium m-b-20">Recover Password</h5>
                            <span>Enter your Email and instructions will be sent to you!</span>
                        </div>
                        <div class="row m-t-20">
                            <form class="col-12" action="index.html">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input class="form-control form-control-lg" type="email" required="" placeholder="Username">
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-lg btn-danger" type="submit" name="action">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['loginBtn'])) {
            // $username = $_POST['username'];
            $password_hash = $_POST['password'];

            // $query = "select * from super_admin where username='$username' and password_hash='$password_hash'";
            // $res = mysqli_query($conn, $query);
            // $total = mysqli_num_rows($res);
            // if ($total == 1) {
            //     $_SESSION['username'] = $username;
            //     echo '<script type="text/javascript">window.location.href = "dashboard.php";</script>';
            //     echo '<script type="text/javascript">toastr.success("Login Successfully")</script>';
            // } else {
            //     echo '<script type="text/javascript">toastr.error("Incorrect username or password")</script>';
            // }
        }
        include('script.php')
        ?>
    </body>

    </html>