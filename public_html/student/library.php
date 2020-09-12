<?php
    session_start();
    date_default_timezone_set("Asia/Calcutta");
    include './includes/class-autoload.inc.php';
    if (isset($_SESSION['student_id']))
        $student_id = $_SESSION['student_id'];
    else
        header('location: ./login.php');
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
                    <div class="col-md-8 col-12">
                        <div class="card timeline card-primary shadow mt-3">
                            <div class="card-header bg-light">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control text-center" id="searchBooks" placeholder="Search Books">
                                </div>
                            </div>
                            <div class="card-body" data-simplebar style="max-height:70vh; overflow-y: auto; overflow-x: hidden;">
                                <div class="row mx-1" id="booksView">
                                    <?php
                                        $Library = new Library();
                                        $books = $Library->getBooks();
                                        foreach($books AS $book){
                                    ?>
                                    <div class="col-md-3 col-6 p-1 singleBook" style="max-height:30vh">
                                        <div class="card border-0">
                                            <div class="card-body p-1 text-center single-book">
                                                <img src="<?php echo $book['profile_path']; ?>" class="img-fluid p-2">
                                                <h6><?php echo $book['name']; ?></h6>
                                                <h6 class="d-none"><?php echo $book['author']; ?></h6>
                                                <h6 class="d-none"><?php echo $book['publication']; ?></h6>
                                                <span class="d-none bookid"><?php echo $book['book_id']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="card timeline card-primary shadow mt-3">
                            <div class="card-header bg-light">
                                <strong class="card-title">Rented Books</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="https://markmanson.net/wp-content/uploads/2019/02/eif-3d-fits-shadow.jpg" class="img-fluid">
                                    </div>
                                    <div class="col-8">
                                        <h6>Book Title</h6>
                                        <h6>Issue Date</h6>
                                        <h6>Return Date</h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-4">
                                        <img src="https://markmanson.net/wp-content/uploads/2019/02/eif-3d-fits-shadow.jpg" class="img-fluid">
                                    </div>
                                    <div class="col-8">
                                        <h6>Book Title</h6>
                                        <h6>Issue Date</h6>
                                        <h6>Return Date</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include './staticPages/modals.static.php'; ?>
        </main>

        <div class="modal fade BookViewModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title modalBookTitle">Book Name</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-3 mx-auto" id="modalLoadingView">
                                <img src="./../assets/img/loading.gif" class="img-fluid">
                        </div>
                        <div id="modalBookView">
                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <img id="modalBookImage" src="" class="img-fluid">
                                    <h6 class="text-center">Available <span id="modalBookAvailable"></span> out of <span id="modalBookTotal"></span></h6>
                                    <hr>
                                    <h6>Author : <span id="modalBookAuthor"></span></h6>
                                    <h6>Publication : <span id="modalBookPublication"></span></h6>
                                </div>
                                <div class="col-md-9 col-12">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="card bg-light">
                                                <div class="card-body p-2">
                                                    <div class="row">
                                                        <div class="col-md-4 my-auto">
                                                            <img src="./assets/img/<?php echo $student_info['profile_path']; ?>" class="img-fluid rounded-circle">
                                                        </div>
                                                        <div class="col-md-8 px-1">
                                                            <strong>Akash Mole</strong><br>
                                                            Issue - 11/09/2020<br>
                                                            Return - 21/09/2020
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
                </div>
            </div>
        </div>

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