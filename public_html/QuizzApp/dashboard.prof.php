<?php
session_start();
include './includes/class-autoload.inc.php';
if (isset($_SESSION['teacher_id'])) {
    $teacher_id = $_SESSION['teacher_id'];
} else {
    header('location: ./login.prof.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Student Dashboard &mdash; QuizzApp</title>
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="assets/css/components.css">
</head>

<body class="sidebar-mini bg-dark">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            <?php

            include "./staticPages/navbar.prof.php";
            include "./staticPages/sidebar.prof.php";

            ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="card bg-dark border border-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Teacher's Dashboard</h5>
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