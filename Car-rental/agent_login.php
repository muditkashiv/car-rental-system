<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include('inc/links.php'); ?>
    <style>
    div.login-form {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;

    }
    </style>
    <title>Agent login</title>
</head>

<body class="bg-light">
    <?php
    ini_set('display_errors', 0);
    ini_set('log_errors', 0);
    error_reporting(E_ALL);
    // Getting Message From Multiple Pages
    $message = $_GET["message"];
    if ($message) {
        echo "<div class='alert alert-warning alert-dismissible'>
 <i class='bi bi-check2-circle'></i>
  <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
  <strong>$message</strong>.
</div>";
    }
    ?>
    <!-- Login form for agent start-->
    <div class="login-form rounded bg-white overflow-hidden shadow">
        <form action="actions/agent-signin.php" method="post" enctype="multipart/form-data">
            <h4 class="bg-dark text-center text-white py-3"> AGENT LOGIN PANEL</h4>
            <div class="p-4 text-center">
                <div class="mb-3">
                    <input name="admin_email" type="email" class="form-control shadow-none text-center"
                        placeholder="Agent Name">
                </div>
                <div class="mb-4">
                    <input name="admin_pass" type="password" class="form-control shadow-none text-center"
                        placeholder="Password">
                </div>
            </div>
            <div class="mb-4 me-4" style="float:right;">
                <button name="submit" type="submit" class="btn text-white custom-bg shadow-none">LOGIN</button>
                <button data-bs-target="#sign-up" class="btn text-white custom-bg shadow-none" data-bs-toggle="modal"
                    type="button">Sign Up</button>
            </div>
        </form>
    </div>
    <!-- Login form for agent end-->

    <!-- bootstrap js start -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- bootstrap js start -->

    <!-- Modal for Registration -->
    <div class="modal fade" id="sign-up" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center"><i
                            class="bi bi-person-lines-fill  fs-3 me-2"></i>Agent Registration</h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="actions/agent_action.php" method="post">
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                            Note: Your details must match with your ID(Adhar card , passport, driving Liscences, etc)
                            that will be required during verification.
                        </span>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label for="name1" class="form-label">Company Name</label>
                                    <input type="text" name="name1" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label for="name2" class="form-label">Owner Name</label>
                                    <input type="text" name="name2" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="number" name="number" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">GSTIN Number</label>
                                    <input type="text" name="gst" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control shadow-none">
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
    <!-- Modal End Registration -->

</body>

</html>