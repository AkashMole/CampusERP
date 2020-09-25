<?php
    session_start();
    date_default_timezone_set("Asia/Calcutta");
    include './includes/class-autoload.inc.php';
    if (isset($_SESSION['teacher_id'])) {
        $teacher_id = $_SESSION['teacher_id'];
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
    <link rel="stylesheet" href="./../assets/css/dataTables.bootstrap4.css">
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
                    <div class="col-md-12 col-12">

                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped table-bordered datatables" id="dataTable-1">
                                    <thead class="text-center">
                                        <tr>
                                            <th class="d-none"></th>
                                            <th>name</th>
                                            <th>author</th>
                                            <th>publication</th>
                                            <th>available</th>
                                            <th>rating</th>
                                            <th>r queue</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                            $Library = new Library();
                                            $books = $Library->getBooks();
                                            foreach($books AS $book){
                                        ?>
                                            <tr class="bookRow">
                                                <td class="bookid d-none"><?php echo $book['book_id']; ?></td>
                                                <td class="text-left"><?php echo $book['name']; ?></td>
                                                <td><?php echo $book['author']; ?></td>
                                                <td><?php echo $book['publication']; ?></td>
                                                <td>4.5</td>
                                                <td>0 out of 50</td>
                                                <td>10</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm">Reserve</button>
                                                    <button class="btn btn-secondary btn-sm bookMoreDetailsBtn">More</button>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-12 p-0">
                        <div class="btn btn-block btn-secondary mt-3" id="myBooksViewBtn">My Books</div>
                        <div class="btn btn-block btn-secondary mt-3" id="oldBooksViewBtn">History</div>
                    </div>
                </div>
            </div>
            <?php include './staticPages/modals.static.php'; ?>
        </main>

        <div class="modal fade myBooksViewModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4 class="text-center">My Books</h4>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="table-responsive">
                                    <table class="table table-md table-stripped table-bordered" id="mybooks">
                                        <thead class="text-center">
                                            <tr>
                                                <th>#</th>
                                                <th>Book Name</th>
                                                <th>Publication</th>
                                                <th>Author</th>
                                                <th>Issue Date</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <tr>
                                                <td>1</td>
                                                <td>ABC</td>
                                                <td>Something</td>
                                                <td>Someone</td>
                                                <td>05/07/2020</td>
                                                <td>15/07/2020</td>
                                                <td>Collected</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>ABC</td>
                                                <td>Something</td>
                                                <td>Someone</td>
                                                <td>05/07/2020</td>
                                                <td>15/07/2020</td>
                                                <td>Collected</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>ABC</td>
                                                <td>Something</td>
                                                <td>Someone</td>
                                                <td>05/07/2020</td>
                                                <td>15/07/2020</td>
                                                <td>Reserved</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <button type="button" class="btn btn-danger btn-sm mt-1" data-dismiss="modal" aria-label="Close">Close View</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade oldBooksViewModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4 class="text-center">History</h4>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="table-responsive">
                                    <table class="table table-md table-stripped table-bordered" id="mybooks">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Book Name</th>
                                                <th>Issue Date</th>
                                                <th>Due Date</th>
                                                <th>Return Date</th>
                                                <th>Fine</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>ABC</td>
                                                <td>04/07/2020</td>
                                                <td>08/07/2020</td>
                                                <td>05/07/2020</td>
                                                <td>0</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-danger btn-sm mt-1" data-dismiss="modal" aria-label="Close">Close View</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade BookViewModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title modalBookTitle">Book Name</h5>
                        <h5 class="modal-title">&nbsp; - &nbsp;</h5>
                        <h5 class="modal-title">4.5 / 5.0</h5>
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
                                    <h6 class="text-center">Currently Assigned</h6>
                                    <div class="row">
                                        <div class="col-12 col-md-4 mb-2">
                                            <div class="card bg-light">
                                                <div class="card-body py-1 px-3">
                                                    <div class="row">
                                                        <div class="col-md-3 my-auto p-2">
                                                            <img src="./assets/img/<?php echo $student_info['profile_path']; ?>" class="img-fluid rounded-circle">
                                                        </div>
                                                        <div class="col-md-9 p-0 my-auto">
                                                            <strong>Akash Mole</strong><br>
                                                            Issue - 11/09/2020<br>
                                                            Return - 21/09/2020
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h6 class="text-center">Reservation Queue</h6>
                                    <div class="row">
                                        <div class="col-12 col-md-4 mb-2">
                                            <div class="card bg-light">
                                                <div class="card-body py-1 px-3">
                                                    <div class="row">
                                                        <div class="col-md-3 my-auto p-2">
                                                            <img src="./assets/img/<?php echo $student_info['profile_path']; ?>" class="img-fluid rounded-circle">
                                                        </div>
                                                        <div class="col-md-9 p-0 my-auto">
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
    <script src='./../assets/js/jquery.dataTables.min.js'></script>
    <script src='./../assets/js/dataTables.bootstrap4.min.js'></script>
    <script>
      $('#dataTable-1').DataTable(
      {
        autoWidth: true,
        "lengthMenu": [
          [2, 4, 10, -1],
          [2, 4, 10, "All"]
        ]
      });
    </script>
</body>

</html>