<?php
    session_start();
    include './includes/class-autoload.inc.php';
    if (isset($_SESSION['student_id'])) {
        $student_id = $_SESSION['student_id'];
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

<body class="vertical dark collapsed ScrollStyle">
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
                    <div class="col-md-3 col-12">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <a href="./exam.php" class="mb-0 h5"><i class="fe fe-user fe-16"></i> Exam Center</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        icon
                                    </div>
                                    <div class="col-8">
                                        Menu 01
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        icon
                                    </div>
                                    <div class="col-8">
                                        Menu 01
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        icon
                                    </div>
                                    <div class="col-8">
                                        Menu 01
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="card card-primary shadow mb-3" style="height:400px; overflow-y: auto; overflow-x: hidden;">
                            <div class="card-header bg-light">
                                <div class="row">
                                    <div class="my-auto col-6">
                                        <p class="mb-3"><strong class="text-uppercase">Dues/Fees Paid</strong></p>
                                        <h3>₹ 35400</h3>
                                    </div>
                                    <div class="my-auto col-6 my-4 text-center">
                                        <div class="chart-box mx-4">
                                            <div id="radialbarWidget"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body mt-2 pt-1">
                                <div class="row pt-2">
                                    <div class="col-12">
                                        <p class="mb-0"><strong class="text-uppercase">Dues/Fees Pending</strong></p>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <p class="mb-1"><strong class="text-muted">Tution</strong></p>
                                        <h4 class="mb-0">₹ 6500</h4>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <p class="mb-1"><strong class="text-muted">Transport</strong></p>
                                        <h4 class="mb-0">₹ 7800</h4>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <p class="mb-1"><strong class="text-muted">Library</strong></p>
                                        <h4 class="mb-0">₹ 160</h4>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <p class="mb-1"><strong class="text-muted">Hostel</strong></p>
                                        <h4 class="mb-0">₹ 0</h4>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <p class="mb-1"><strong class="text-muted">Other</strong></p>
                                        <h4 class="mb-0">₹ 0</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card timeline shadow" style="height:400px; overflow-y: auto; overflow-x: hidden;">
                            <div class="card-header bg-light">
                                <strong class="card-title">Upcoming Events</strong>
                            </div>
                            <div class="card-body" data-simplebar style="height:350px; overflow-y: auto; overflow-x: hidden;">
                                <h6 class="text-uppercase text-muted mb-2">19 September, 2020</h6>
                                <div class="pb-1 timeline-item item-danger">
                                    <div class="pl-5">
                                        <div class="mb-1">
                                            Last date to submit AIR Assigment Number 01 is 19/08/2020.
                                        </div>
                                        <p class="small text-muted">Pro. G. B. Yadav <span class="badge badge-danger float-right p-1">11 September, 2020 @ 04:30 PM </span>
                                        </p>
                                    </div>
                                </div>
                                <h6 class="text-uppercase text-muted mb-2 mt-2">01 , 2020</h6>
                                <div class="pb-1 timeline-item item-warning">
                                    <div class="pl-5">
                                        <div class="mb-1">
                                            Project Reviews will be conducted on 01/09/2020 10:30 AM.
                                        </div>
                                        <p class="small text-muted">Pro. K. R. Pathak <span class="badge badge-warning float-right p-1">13 September, 2020 @ 04:30 PM </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="pb-1 timeline-item item-warning">
                                    <div class="pl-5">
                                        <div class="mb-1">
                                            Project Reviews will be conducted on 01/09/2020 10:30 AM.
                                        </div>
                                        <p class="small text-muted">Pro. K. R. Pathak <span class="badge badge-warning float-right p-1">13 September, 2020 @ 04:30 PM </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="pb-1 timeline-item item-warning">
                                    <div class="pl-5">
                                        <div class="mb-1">
                                            Project Reviews will be conducted on 01/09/2020 10:30 AM.
                                        </div>
                                        <p class="small text-muted">Pro. K. R. Pathak <span class="badge badge-warning float-right p-1">13 September, 2020 @ 04:30 PM </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="pb-1 timeline-item item-warning">
                                    <div class="pl-5">
                                        <div class="mb-1">
                                            Project Reviews will be conducted on 01/09/2020 10:30 AM.
                                        </div>
                                        <p class="small text-muted">Pro. K. R. Pathak <span class="badge badge-warning float-right p-1">13 September, 2020 @ 04:30 PM </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="pb-1 timeline-item item-warning">
                                    <div class="pl-5">
                                        <div class="mb-1">
                                            Project Reviews will be conducted on 01/09/2020 10:30 AM.
                                        </div>
                                        <p class="small text-muted">Pro. K. R. Pathak <span class="badge badge-warning float-right p-1">13 September, 2020 @ 04:30 PM </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="pb-1 timeline-item item-warning">
                                    <div class="pl-5">
                                        <div class="mb-1">
                                            Project Reviews will be conducted on 01/09/2020 10:30 AM.
                                        </div>
                                        <p class="small text-muted">Pro. K. R. Pathak <span class="badge badge-warning float-right p-1">13 September, 2020 @ 04:30 PM </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="pb-1 timeline-item item-warning">
                                    <div class="pl-5">
                                        <div class="mb-1">
                                            Project Reviews will be conducted on 01/09/2020 10:30 AM.
                                        </div>
                                        <p class="small text-muted">Pro. K. R. Pathak <span class="badge badge-warning float-right p-1">13 September, 2020 @ 04:30 PM </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 my-auto">
                        <div class="card shadow mb-3" style="height:120px">
                            <div class="card-body text-center">
                                Cooming Soon
                            </div>
                        </div>
                        <div class="card shadow mb-3" style="height:120px">
                            <div class="card-body text-center">
                                Coming Soon
                            </div>
                        </div>
                        <div class="card shadow mb-3" style="height:120px">
                            <div class="card-body text-center">
                                Coming Soon
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