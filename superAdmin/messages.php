<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccines-Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <?php
    include('connection.php');
    session_start();
    ?>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<style>
    .btn .badge {
        position: absolute;
        right: -21px;
        top: -19px !important;
        border-radius: 50%;
        background-color: red;
        color: white;
    }

    .unread-row {
        background-color: #ffcccc !important;
        font-weight: bold;
    }
</style>

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
                Messages
            </h3>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <input id="myInput" type="search" class="form-control mt-2" placeholder="Search Hospital">
                            </div>
                            <div>
                                <a class="btn btn-success" href="">
                                    <span>New Messages</span>
                                    <span class="badge">
                                        <?php
                                        $query = "SELECT * from contactuser WHERE mark = 'unread'";
                                        $result = mysqli_query($conn, $query);
                                        echo mysqli_num_rows($result);
                                        ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light thead-50 text-capitalize">
                                    <?php
                                    $query = "SELECT * from contactuser";
                                    $result = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($result) != 0) {
                                        echo "
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Subject</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            ";

                                        while ($data = mysqli_fetch_assoc($result)) {
                                            $statusClass = ($data['mark'] === 'unread') ? 'unread-row' : ''; // Check the 'mark' value

                                            echo "
                                                <tr class='data $statusClass'>
                                                    <td>" . $data['name'] . "</td>
                                                    <td>" . $data['email'] . "</td>
                                                    <td>" . $data['subject'] . "</td>
                                                    <td>" . $data['mark'] . "</td>
                                                    <td class='d-flex'>
                                                        <a href='./manageMsg/delMsg.php ?id=$data[id]' class='btn btn-danger btn-sm mx-2' name='deleteRecord'>Delete</a>
                                                        <form action='' method='POST'>
                                                        <input type='hidden' name='viewId' value='" . $data['id'] . "'>
                                                        <a type='submit' href='view.php ?id=$data[id]&name=$data[name]&email=$data[email]&subject=$data[subject]&query=$data[query]' class='btn btn-success btn-sm' name='view'>View</a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            ";
                                            if (isset($_POST['view'])) {
                                                $viewId = $_POST['viewId'];
                                                $viewQuery = "UPDATE contactuser
                                                SET mark = 'read'
                                                WHERE id='$viewId'";
                                                $delResult = mysqli_query($conn, $viewQuery);
                                            }
                                        }
                                    } else {
                                        echo "
                                                <h2 class='text-center'>No Data</h2>
                                            ";
                                    }

                                    ?>
                                </thead>
                            </table>

                            <div id='noDataMessage' class='mt-3' style='display: none;'>
                                <h1 class='text-dark text-center'>No data found</h1>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                var found = false; // Flag to track if any results were found

                $(".data").each(function() {
                    var text = $(this).text().toLowerCase();
                    var match = text.indexOf(value) > -1;
                    $(this).toggle(match);
                    if (match) {
                        found = true;
                    }
                });

                // Display "No data found" message if no results were found
                if (!found) {
                    $("#noDataMessage").show();
                } else {
                    $("#noDataMessage").hide();
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>