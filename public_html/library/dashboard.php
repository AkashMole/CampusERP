<?php
    session_start();
    include './includes/class-autoload.inc.php';
    if (isset($_SESSION['teacher_id'])) {
        $teacher_id = $_SESSION['teacher_id'];
    } else {
        header('location: ./login.php');
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Campus ERP - Student Panel</title>
    <link rel="stylesheet" href="./../assets/css/simplebar.css">
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./../assets/css/feather.css">
    <link rel="stylesheet" href="./../assets/css/daterangepicker.css">
    <link rel="stylesheet" href="./../assets/css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="./../assets/css/app-dark.css" id="darkTheme">
</head>

<body class="vertical dark ScrollStyle collapsed">
    <div class="wrapper">

        <?php
        include './staticPages/navbar.static.php';
        include './staticPages/sidebar.static.php';
        ?>

        <main role="main" class="main-content">
            <div class="container-fluid px-2">
                <div class="row justify-content-center">
                    <div class="col text-left">
                        <h1 class="h4 page-title"><?php echo $msg; ?>.....</h1>
                    </div>
                    <div class="col text-right d-none d-md-block">
                        <h1 class="h6 page-title">Last Login : <?php echo $last_login_datetime; ?></h1>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-sm bg-primary-light">
                                                <i class="fe fe-18 fe-shopping-bag text-white mb-0"></i>
                                            </span>
                                        </div>
                                        <div class="col pr-0">
                                            <p class="small text-muted mb-1">Total Available Books</p>
                                            <span class="h3 mb-0">151250</span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-sm bg-primary-light">
                                                <i class="fe fe-18 fe-shopping-bag text-white mb-0"></i>
                                            </span>
                                        </div>
                                        <div class="col pr-0">
                                            <p class="small text-muted mb-1">Total Registered Authors</p>
                                            <span class="h3 mb-0">151250</span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-sm bg-primary-light">
                                                <i class="fe fe-18 fe-shopping-bag text-white mb-0"></i>
                                            </span>
                                        </div>
                                        <div class="col pr-0">
                                            <p class="small text-muted mb-1">Total Registered Publications</p>
                                            <span class="h3 mb-0">151250</span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card timeline shadow" style="height:400px; overflow-y: auto; overflow-x: hidden;">
                            <div class="card-header bg-light">
                                <strong class="card-title">Fine Collection Logs</strong>
                            </div>
                            <div class="card-body" data-simplebar style="height:350px; overflow-y: auto; overflow-x: hidden;">
                                <h6 class="text-uppercase text-muted mb-2">19 September, 2020</h6>
                                <div class="pb-1 timeline-item item-danger">
                                    <div class="pl-5">
                                        <p class="small">
                                            Akash Milind Mole <br>
                                            PRN - 10638520 <br>
                                            Fine - $5 <br>
                                            Transaction - #145236 <br>
                                            <span class="text-muted">Ajaykumar Challa</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="pb-1">
                                    <button class="btn btn-primary btn-sm">Show More</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php include './staticPages/modals.static.php'; ?>
        </main>
    </div> 
    <script src="./../assets/js/jquery.min.js"></script>
    <script src="./../assets/js/popper.min.js"></script>
    <script src="./../assets/js/moment.min.js"></script>
    <script src="./../assets/js/bootstrap.min.js"></script>
    <script src="./../assets/js/simplebar.min.js"></script>
    <script src='./../assets/js/daterangepicker.js'></script>
    <script src='./../assets/js/jquery.stickOnScroll.js'></script>
    <script src="./../assets/js/tinycolor-min.js"></script>
    <script src="./../assets/js/config.js"></script>
    <script src="./../assets/js/apps.js"></script>
    <script src="./../assets/js/gauge.min.js"></script>
    <script src="./../assets/js/jquery.sparkline.min.js"></script>
    <script src="./../assets/js/apexcharts.min.js"></script>
    <script src="./../assets/js/apexcharts.custom.js"></script>

</body>

</html>