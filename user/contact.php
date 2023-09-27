<!doctype html>
<html lang="en">

<head>
    <title>Contact us</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <?php
    include('connection.php');
    ?>


</head>

<style>
    * {
        padding: 0;
        margin: 0;
        font-family: 'Playfair Display', serif;
    }

    ::placeholder {
        color: #b3b3b3 !important;
        font-weight: lighter !important;
    }
</style>

<body>
    <header>
        <?php
        include('navbar.php');
        include('connection.php');
        if (isset($_SESSION['f_name'])) {
        } else {
            echo "<script>
        window.location.href = 'auth.php'
            </script>";
        }
        ?>
    </header>
    <main>
        <div class="my-2 mt-4 mx-5 ">
            <div>
                <h1 class="text-black-50">Contact Us</h1>
            </div>
        </div>
        <div class="my-2">
            <form action="contact.php" method="POST" class="container mx-auto">
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="name" placeholder="Enter your full name" class="form-control my-2" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="email" name="email" placeholder="Enter your email" class="form-control my-2" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="text" name="subject" placeholder="Subject" class="form-control my-2" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <textarea name="query" placeholder="Write your query in detail" class="col-12 form-control my-2" required name="" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="row-sm-3">
                        <input type="submit" value="Submit" name="contactBtn" class="btn btn-success my-2" required>
                    </div>
                </div>
            </form>

            <?php
            if (isset($_POST['contactBtn'])) {
                if (isset($_SESSION['f_name'])) {
                    $getMail = $_SESSION['f_name'];
                    $getId = "SELECT * FROM users WHERE email_phone = '$getMail'";
                    $res = mysqli_query($conn, $getId);
                    if ($res) {
                        $data = mysqli_fetch_assoc($res);
                        $id = $data['id'];

                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $subject = $_POST['subject'];
                        $query = $_POST['query'];

                        $contactQuery = "INSERT INTO contactuser (`name`,`email`,`subject`,`query`,`userid`,`mark`) VALUES ('$name','$email','$subject','$query','$id','unread') ";
                        $response = mysqli_query($conn, $contactQuery);

                        if ($response) {
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
                                        Thanks! we will contact you as soon as possible
                                    </div>
                                </div>
                            </div>
                        ';
                        } else {
                            // Handle the case where the INSERT query failed
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
                                        Oops! Something went wrong
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                    } else {
                        echo '
                        <div class="toast-container position-fixed top-0 end-0 p-3 ">
                            <div id="liveToast" class="toast show bg-info" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header justify-content-between">
                                    <div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                </div>
                                <div class="toast-body text-white">
                                    Please Register youself!
                                </div>
                            </div>
                        </div>
                        ';
                    }
                }
            }

            ?>

        </div>

        

       

    </main>
    <script>
        const toastTrigger = document.getElementById('liveToastBtn')
        const toastLiveExample = document.getElementById('liveToast')
        if (toastTrigger) {
            toastTrigger.addEventListener('click', () => {
                const toast = new bootstrap.Toast(toastLiveExample)

                toast.show()
            })
        }
    </script>
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