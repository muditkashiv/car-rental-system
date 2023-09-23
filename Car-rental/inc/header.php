<?php
// code for showing error 
ini_set('display_errors', 0);
ini_set('log_errors', 0);
error_reporting(E_ALL);

// Starting Session
session_start();
// connecting database by including connect page
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/common.css">
    <style>
    .availability-form {
        margin-top: -60px;
        z-index: 2;
        position: relative;
    }

    @media screen and (max-width:575px) {
        .availability-form {
            margin-top: 25px;
            padding: 0 35px;
        }
    }
    </style>
</head>

<body class="bg-light">
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Car Rental Agency</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#headerid" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="headerid">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active me-2" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  me-2" href="cars.php">Cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  me-2" href="aboutus.php">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  me-2" href="agent_login.php">Agent</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <!---------------- Php Code For Changing Icon On Sign IN ----------------->
                    <?php if ($_SESSION['name']) {

                        $name = $_SESSION['name'];
                        $sqla = "SELECT name from customer WHERE name = '$name'";
                        $cat = mysqli_query($conn, $sqla);
                        if ($cat) {
                            while ($rows = mysqli_fetch_assoc($cat)) {
                                echo "<div class='nav-item dropdown' style='float: right;'>
                                        <a class='nav-link dropdown-toggle text-dark' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                          <i class='bi bi-person-circle'></i> Welcome "  . $rows['name'] . " 
                                        </a>
                                        <ul class='dropdown-menu'>
                                          <li><a class='dropdown-item' href='inc/logout.php'><i class='bi bi-box-arrow-right pe-2'></i> Logout</a></li>
                                        </ul>
                                      </div>";
                            }
                        }
                    } else {
                        echo "<button type='button' class='btn btn-outline-dark shadow-none me-lg-3 me-2' data-bs-toggle='modal' data-bs-target='#LoginModal'>
                                  Login
                              </button>
                              <button type='button' class='btn btn-outline-dark shadow-none' data-bs-toggle='modal' data-bs-target='#RegisterModal'>
                                  Register
                              </button>";
                    } ?>
                    <!---------------- /Php Code For Changing Icon On Sign IN Closed ----------------->
                </div>
            </div>
        </div>
    </nav>

    <!-- Modal for Login -->
    <div class="modal fade" id="LoginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-circle fs-3 me-2"></i>User
                        Login</h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="actions/login_action.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control shadow-none">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control shadow-none">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <button type="submit" name="submit" id="submit"
                                class="btn btn-dark shadow-none">Login</button>
                            <!-- <a href="#RegisterModal" class="text-secondary text-decoration-none">Sign in</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End Login -->

    <!-- Modal for Registration -->
    <div class="modal fade" id="RegisterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center"><i
                            class="bi bi-person-lines-fill  fs-3 me-2"></i>User Registration</h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="actions/sign-up.php" method="post">
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                            Note: Your details must match with your ID(Adhar card , passport, driving Liscences, etc)
                            that will be required during car bookings.
                        </span>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 p-0">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="number" name="number" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="pass" class="form-control shadow-none">
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-1">
                            <button type="submit" name="submit" class="btn btn-dark shadow-none">REGISTER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End Login -->