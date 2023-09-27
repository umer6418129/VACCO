<!doctype html>
<html lang="en">

<head>
  <title>Hospital</title>
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
          <h1 class="text-black-50">Find Hospitals</h1>
        </div>
        <div>
          <input id="myInput" type="search" class="form-control mt-2" placeholder="Search Hospital">
        </div>
      </div>


      <div class="container">
        <div id="noDataMessage" class="mt-3" style="display: none;">
          <h1 class="text-dark text-center">No data found</h1>
        </div>
        <div class="row">

          <?php
          $hospitalQuery = "SELECT * FROM hospital WHERE isapprove = 'Accepted' ORDER BY isapprove DESC";
          $res = mysqli_query($conn, $hospitalQuery);
          if (mysqli_num_rows($res) != 0) {
            while ($data = mysqli_fetch_assoc($res)) {
              echo '
                  <div class="col-sm-6 mt-5 hospital-card">
                      <div class="card">
                          <div class="card-body">
                              <h5 class="card-title">'  . $data['name'] . "</h5>
                              <p class='card-text'>" . $data['address']. " " . $data['country'] . "</p>
                              <a href='requestForm.php ?id=$data[id]' class='btn btn-primary'>Request for Test</a>
                              <a href='requestVaccineForm.php ?id=$data[id]' class='btn btn-primary'>Request for Vaccination</a>
                          </div>
                      </div>
                  </div>
              ";
            };
          }else{
            echo "<h1>No Data</h1>";
          }

          ?>

        </div>
      </div>


    </div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->

  <script>
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        var found = false; // Flag to track if any results were found

        $(".hospital-card").each(function() {
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

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>