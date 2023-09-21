<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<style>
  .active {
    color: #8ce98a !important;
    background-color: rgba(239, 246, 255, 0.1) !important;
  }

  #user {
    position: absolute;
    bottom: 0px;
  }
</style>

<body>
  <div class="w3-sidebar w3-bar-block w3-xxlarge" style="width:70px; color:white; background-color: #073b74;">
    <a href="dashboard.php" id="dashboard" class="w3-bar-item w3-button sidebar-item"><i class="fa fa-dashboard"></i></a>
    <a href="testAppointmentList.php" id="list" class="w3-bar-item w3-button sidebar-item"><i class="fa fa-thermometer-0"></i></a>
    <a href="vaccineReq.php" id="vaccine" class="w3-bar-item w3-button sidebar-item"><i class='fa fa-eyedropper'></i></a>
    <!-- <a href="vaccineReq.php" id="result" class="w3-bar-item w3-button sidebar-item"><i class='bi bi-card-checklist'></i></a> -->
    <!-- <a href="patient.php" id="patient" class="w3-bar-item w3-button sidebar-item"><i class="fa fa-user"></i></a>
    <a href="vaccineList.php" id="vaccine" class="w3-bar-item w3-button sidebar-item"><i class="bi bi-virus"></i></a>
    <a href="messages.php" id="message" class="w3-bar-item w3-button sidebar-item"><i class="bi bi-chat-dots-fill"></i></a>
    <a href="manage.php" id="user" class="w3-bar-item w3-button sidebar-item"><i class='fa fa-user-circle'></i></a> -->
  </div>

  <div class="text-dark" style="float: right;">
    <h3>
      <?php
      if (isset($_SESSION['name'])) {
        // echo $_SESSION['username'];
      } else {
        header('location:login.php');
      }
      ?>
    </h3>
  </div>



  <!-- Script -->
  <script>
    $(document).ready(function() {
      var activeItemID = localStorage.getItem('activeItem');
      if (activeItemID) {
        $("#" + activeItemID).addClass("active");
      }
      $(".sidebar-item").click(function() {
        $(".sidebar-item").removeClass("active");
        $(this).addClass("active");

        localStorage.setItem('activeItem', $(this).attr('id'));
      });
    });

    function hospital() {
      $.ajax({
        url: "hospitalList.php", //the page containing php script
        // type: "post",    //request type,
        // dataType: 'json',
        // data: {registration: "success", name: "xyz", email: "abc@gmail.com"},
        success: function(result) {
          console.log(result.abc);
        }
      });
    }
  </script>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>