<!doctype html>
<html lang="en">

<head>
    <title>Covid-19_Vaccination</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<style>
    .mainHeading {
        color: #04b700;
    }

    .active {
        color: #04b700 !important;
        background-color: black !important;
    }

    /* CSS for active link */
    .active-link {
        background-color: #007bff;
        /* Change this to your desired background color */
        color: #ffffff;
        /* Change this to your desired text color */
    }
</style>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">COVID<span class="mainHeading">BookingHub</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a id="home" class="nav-link sidebar-item" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a id="hospitals" class="nav-link sidebar-item" aria-current="page" href="#">Hospitals</a>
                        </li>
                        <li class="nav-item">
                            <a id="myAppointments" class="nav-link sidebar-item" aria-current="page" href="#">My Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a id="viewResults" class="nav-link sidebar-item" aria-current="page" href="#">View Results</a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a id="" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li> -->
                    </ul>
                    <div class="nav-item">
                        <a class="nav-link mainHeading" aria-current="page" href="#">Register & Login</a>
                    </div>
                    <!-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->

                </div>
            </div>
        </nav>
    </header>
    <main>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <script>
        // JavaScript to add or remove the active-link class when a link is clicked
        const navLinks = document.querySelectorAll(".nav-link");

        navLinks.forEach(link => {
            link.addEventListener("click", function() {
                // Remove the active-link class from all links
                navLinks.forEach(link => {
                    link.classList.remove("active-link");
                });

                // Add the active-link class to the clicked link
                this.classList.add("active-link");
            });
        });
    </script>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>