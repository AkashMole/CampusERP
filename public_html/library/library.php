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
                    <div class="col-12">
                    
                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#AllocationTab" role="tab" aria-controls="contact" aria-selected="false">Book Allocation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab" data-toggle="tab" href="#CollectionTab" role="tab" aria-controls="home" aria-selected="true">Book Collection</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab" data-toggle="tab" href="#InventoryTab" role="tab" aria-controls="home" aria-selected="true">Inventory Mangement</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab" data-toggle="tab" href="#SettingsTab" role="tab" aria-controls="home" aria-selected="true">Library Settings</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="AllocationTab" role="tabpane"> 
                                <div class="row">
                                    <div class="col-md-8">
                                       
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <input id="allocationSearchUserInput" type="text" class="form-control text-center" placeholder="Enter ID">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button class="btn btn-block btn-primary" id="allocationSearchUserBtn">Search User</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-3 d-none" id="allocationSearchUserView">
                                            <div class="card-header bg-light">
                                                <strong class="card-title">User Details</strong>
                                            </div>
                                            <div class="card-body">
                                                <h1 id="allocationSearchUserViewLoading" class="my-5 text-center">Loading</h1>
                                                <div class="row d-none loading" id="allocationAfterSuccessView">
                                                    <div class="col-md-3">
                                                        <img id="allocationUserProfile" src="" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>
                                                            <span id="allocationUserName"></span> <br>
                                                            Mobile - <span id="allocationMobile"></span>
                                                        <p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <table class="table table-sm table-hover table-bordered" id="allocationUserTable">
                                                            <thead class="text-center">
                                                                <tr>
                                                                    <th class="d-none"></th>
                                                                    <th>Reserved Book</th>
                                                                    <th>Position</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-center">
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control text-center" id="allocationBookSearchInput" placeholder="Enter Book ID">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <button id="allocationSearchBookBtn" class="btn btn-block btn-primary">Search Book</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-3 d-none" id="allocationSearchBookView">
                                            <div class="card-header bg-light">
                                                <strong class="card-title">Book Details</strong>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="text-center" id="beforeBookLoadView">Loading</h5>
                                                <div id="afterBookLoadView">
                                                    <h6>Book Name<br> <span class="mt-1 text-muted" id="allocationBookName"></span> <span class="mt-1 text-muted"> (August 2018 - WIP) </span></h6>
                                                    <h6>Author - Publication<br> <span class="mt-1 text-muted" id="allocationBookAuthor"></span> - <span class="mt-1 text-muted" id="allocationBookPublication"></span></h6>
                                                    <h6>Available Quantity - <span class="mt-1 text-muted" id="allocationBookAvailable"></span></h6>
                                                    <h6>Reserved Quantity - <span class="mt-1 text-muted"> 5 - WIP</span></h6>

                                                    <div class="mt-3">
                                                        <button class="btn btn-block btn-sm btn-primary" id="bookSearchAllocateBtn">Allocate Book</button>
                                                        <button class="btn btn-block btn-sm btn-warning" id="bookSearchReservationQueueBtn">Reservation Queue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            
                            </div>
                            <div class="tab-pane fade show" id="InventoryTab" role="tabpane"> 
                            
                                <div class="card">
                                    <div class="card-body">
                                        InventoryTab
                                    </div>
                                </div>
                            
                            </div>
                            <div class="tab-pane fade show" id="SettingsTab" role="tabpane"> 
                            
                                <div class="card">
                                    <div class="card-body">
                                        SettingsTab
                                    </div>
                                </div>
                            
                            </div>
                            <div class="tab-pane fade show" id="CollectionTab" role="tabpane"> 
                            
                                <div class="card">
                                    <div class="card-body">
                                        CollectionTab
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
    <script src='./../assets/js/jquery.dataTables.min.js'></script>
    <script src='./../assets/js/dataTables.bootstrap4.min.js'></script>
    <script>
      $('#dataTable-1').DataTable(
      {
        autoWidth: true,
        "lengthMenu": [
          [5, 15, 50, -1],
          [5, 15, 50, "All"]
        ]
      });
    </script>
</body>

</html>