<?php
session_start();
include './includes/class-autoload.inc.php';
if (isset($_SESSION['student_id'])) {
    $student_id = $_SESSION['student_id'];
} else {
    header('location: ./index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Student Profile &mdash; QuizzApp</title>
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/skins/reverse.css">
</head>

<body class="sidebar-mini bg-dark">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            <?php

            include "./staticPages/navbar.static.php";
            include "./staticPages/sidebar.static.php";

            ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="card bg-dark border">
                            <div class="card-body pb-2">
                                <h5>Student's Profile | Work in Progress</h5>
                            </div>
                        </div>
                        <div class="card bg-dark border-left border-right border-bottom card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2 my-auto">
                                        <div class="form-group">
                                            <img src="assets/img/final/students/default.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-white" for="">First Name:- </label>
                                                    <input type="text" name="" id="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-white" for="">Last Name:- </label>
                                                    <input type="text" name="" id="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-white" for="">Email Address:- </label>
                                                    <input type="text" name="" id="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-white" for="">Mobile Number:- </label>
                                                    <input type="text" name="" id="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-white" for="">Username:- </label>
                                                    <input type="text" name="" id="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-white" for="">Password:- </label>
                                                    <input type="text" name="" id="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-block btn-primary">Update Profile Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/tooltip.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>
    <script src="assets/modules/izitoast/js/iziToast.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>