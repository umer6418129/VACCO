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

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<style>
  * {
    padding: 0;
    margin: 0;
    font-family: 'Playfair Display', serif;
  }

  #mainHead {
    font-size: 60px;
    text-transform: capitalize;
    font-weight: 700;
    margin-bottom: 12px;
    line-height: 1.2;
  }
</style>

<body>
  <header>
    <?php
    include('navbar.php')
    ?>
    <!-- <div id="carouselExampleControls" class="carousel carousel-light slide rounded mx-auto d-block align-items-center img-fluid mt-5" data-bs-ride="carousel">
      <div class="carousel-inner mx-auto rounded d-block">
        <div class="carousel-item active">
          <img class="d-block w-100 cs" src="" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 cs" src="" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 cs" src="" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div> -->
  </header>
  <main>
    <div class="row container col-12 mx-auto my-5 mt-5 py-2">
      <div class="col-lg-5 col-xl-5 mt-5">
        <div>
          <h6>We Are Here For You</h6>
          <h1 id="mainHead" class="text-dark img-fluid">Best Vaccination & Better Doctor</h1>
          <span class="text-black-50">Welcome to our website, where we are dedicated to providing you with the best vaccination services and connecting you with top-notch doctors. Your health and well-being are our top priorities, and we are committed to delivering the highest quality care possible. Explore our services and find the best solutions for your healthcare needs. We're here to ensure you receive the best vaccination and better doctor care.</span><br>
          <a class="btn btn-primary btn-lg my-4 " href='hospital.php'>Find Hospitals</a>
        </div>
      </div>
      <div class="col-lg-7 mt-5">
        <img class="img-fluid my-5 mx-5" src="./static_images/homePageImage.png" alt="">
      </div>
    </div>
    <div class="col-12 container-fluid row row-cols-1 row-cols-md-2 my-5">
      <div class=" ">
        <img class="img-fluid" src="./static_images/aboutUs.png" alt="">
      </div>
      <div class="mt-5">
        <h1>About Us</h1>
        <span class="text-black-50">At COVIDBookingHub, our mission is clear and concise: facilitating your health and well-being. We specialize in top-tier vaccination services and connecting you with exceptional doctors. Our unwavering commitment to your health journey is at the core of everything we do. Discover the convenience and quality of healthcare through COVIDBookingHub today.</span><br>
        <a class="btn btn-primary btn-lg my-5 " href='hospital.php'>Find Hospitals</a>
        <div class="d-flex justify-content-between container my-5">
          <div class="text-center">
            <h1 class="bi bi-hospital-fill text-primary"></h1>
            <h5 class="text-black-50">Hospitality</h5>
          </div>
          <div class="text-center">
            <h1 class="bi bi-file-medical-fill text-primary"></h1>
            <h5 class="text-black-50">Appointment</h5>
          </div>
          <div class="text-center">
            <h1 class="bi bi-capsule text-primary"></h1>
            <h5 class="text-black-50">Treatment</h5>
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