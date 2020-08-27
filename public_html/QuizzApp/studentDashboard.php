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
    <title>Student Dashboard &mdash; QuizzApp</title>
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="assets/css/components.css">
</head>

<body class="">
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
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Student Dashboard</h5>
                                        This is your Dashboard, from here you can check your available Exams as well as check results of previous exams.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card border-left border-right border-bottom card-primary">
                                    <div class="card-body">
                                        <h5>Available Exams</h5>
                                        <hr>
                                        <table class="table table-md table-bordered table-striped">
                                            <thead class="border">
                                                <tr class="text-center">
                                                    <th class="">Exam</th>
                                                    <th class="">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $Exam = new Exam();
                                                echo $Exam->getAvailableExamToStudent($student_id);
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-left border-right border-bottom card-primary">
                                    <div class="card-body">
                                        <h5>Exam Results</h5>
                                        <hr>
                                        <table class="table table-md table-bordered table-striped">
                                            <thead class="border">
                                                <tr class="text-center">
                                                    <th class="">Exam</th>
                                                    <th class="">Marks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $Result = new Result();
                                                echo $Result->getAllResults($student_id);
                                                ?>
                                            </tbody>
                                        </table>
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