<?php

session_start();
ob_start();
if(isset($_SESSION['loggedin'])){
    header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Netzwelt Exercise</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.1.0/dist/sweetalert2.min.css">
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="my-4">
                                <h2 class="fw-bold text-uppercase">Welcome Back!</h2>
                                <p class="text-white-50 mb-3">Please login to continue</p>


                                <!-- username input group -->
                                <div class="d-flex mt-4">
                                    <div class="align-self-center">
                                        <span class="input-icon"> <i class="fas fa-user mx-1"></i> </span>
                                    </div>

                                    <div class="group w-100 align-self-center my-3">
                                        <input type="text" class="textbox" id="username" required>
                                        <span class="bar"></span>
                                        <label>Username</label>
                                    </div>
                                </div>
                                <!-- password input group -->
                                <div class="d-flex my-2">
                                    <div class="align-self-center">
                                        <span class="input-icon"> <i class="fas fa-key mx-1"></i> </span>
                                    </div>

                                    <div class="group w-100 align-self-center my-3">
                                        <input type="password" id="password" class="textbox" required>
                                        <span class="bar"></span>
                                        <label>Password</label>
                                    </div>
                                </div>
                                <!-- Login Button -->
                                <button class="btn btn-outline-primary btn-lg px-5" type="submit" id="submit-form">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- BOOTSTRAP JS BUNDLE -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.1.0/dist/sweetalert2.min.js"></script>
    <!-- CUSTOM JS -->
    <script src="../js/login.js"></script>

</body>

</html>