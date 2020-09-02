<?php
    session_start();
    date_default_timezone_set("Asia/Calcutta");
    include './includes/class-autoload.inc.php';
    if (isset($_SESSION['student_id'])) {
        $student_id = $_SESSION['student_id'];
    } else {
        header('location: ./login.php');
    }

    $ProfilePage = new ProfilePage();
    
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../assets/img/logo.ico">
    <title>Campus ERP - Student Panel</title>
    <link rel="stylesheet" href="./../assets/css/simplebar.css">
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./../assets/css/feather.css">
    <link rel="stylesheet" href="./../assets/css/select2.css">
    <link rel="stylesheet" href="./../assets/css/daterangepicker.css">
    <link rel="stylesheet" href="./../assets/css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="./../assets/css/app-dark.css" id="darkTheme">
</head>

<body class="vertical dark ScrollStyle">
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
                <div class="row">
                    <div class="col-md-9 col-12">
                           <div class="card card-primary shadow mt-3">
                            <div class="card-body">
                                <div class="row mx-1">
                                    <div class="col-12 px-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control text-center" placeholder="Search Books">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mx-1 is-table-row">
                                    <div class="col-md-3 col-6 p-1">
                                        <div class="card border-0">
                                            <div class="card-body p-1 text-center single-book">
                                                <img src="https://markmanson.net/wp-content/uploads/2019/02/eif-3d-fits-shadow.jpg" class="img-fluid p-2">
                                                <div class="face-one">
                                                    <h6>Every Thing is Fucked - A Book about Hope</h6>
                                                </div>
                                                <div class="face-two">
                                                    <h6>Author - Mark Manson</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 p-1">
                                        <div class="card border-0">
                                            <div class="card-body p-1 text-center single-book">
                                                <img src="https://markmanson.net/wp-content/uploads/2019/02/eif-3d-fits-shadow.jpg" class="img-fluid p-2">
                                                <div class="face-one">
                                                    <h6>Every Thing is Fucked - A Book about Hope</h6>
                                                </div>
                                                <div class="face-two">
                                                    <h6>Author - Mark Manson</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 p-1">
                                        <div class="card border-0">
                                            <div class="card-body p-1 text-center single-book">
                                                <img src="https://markmanson.net/wp-content/uploads/2019/02/eif-3d-fits-shadow.jpg" class="img-fluid p-2">
                                                <div class="face-one">
                                                    <h6>Every Thing is Fucked - A Book about Hope</h6>
                                                </div>
                                                <div class="face-two">
                                                    <h6>Author - Mark Manson</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
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
    <script src="./../assets/js/select2.min.js"></script>
    <script src="./assets/js/library.php.js"></script>
</body>

</html>