<?php

session_start();
ob_start();
if (!$_SESSION['loggedin']) {
    header("location: account/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Netzwelt Exercise - Home Page</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.1.0/dist/sweetalert2.min.css">
</head>

<body class="bg-secondary">
    <header class="p-3 mb-3 border-bottom bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2  text-white">Home</a></li>
                </ul>



                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="data:image/png;base64,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" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="card">
            <div class="card-header">
                Territories List
            </div>
            <div class="card-body">
                <div class="container d-flex justify-content-center align-items-center spinner-container" id="spinner">
                    <div class="spinner"></div>
                    <p class="ms-3">Please wait while fetching the data....</p>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                        <div id="accordion"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- BOOTSTRAP JS BUNDLE -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.1.0/dist/sweetalert2.min.js"></script>
    <!-- CUSTOM JS -->
    <script src="js/recursion.js"></script>
    <?php ob_flush(); ?>
</body>

</html>