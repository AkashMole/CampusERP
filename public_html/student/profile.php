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
                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-12 mx-auto mb-2">
                                <img src="https://scontent.fnag1-1.fna.fbcdn.net/v/t1.0-9/70928791_2224645207832910_3418321534098341888_o.jpg?_nc_cat=102&_nc_sid=09cbfe&_nc_ohc=S_spyrbtjTkAX_i3tDY&_nc_ht=scontent.fnag1-1.fna&oh=453ad6671f7235b84420103b73875c8b&oe=5F5BEFB9" class="img-fluid rounded">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 class="mt-2 text-left">Name</h6>
                            </div>
                            <div class="col-auto">
                                <h6 class="mt-2 text-right text-muted">Akash Milind Mole</h6>
                            </div>
                        </div>
                        <hr class="my-1">
                        <div class="row">
                            <div class="col">
                                <h6 class="mt-2 text-left">PRN</h6>
                            </div>
                            <div class="col-auto">
                                <h6 class="mt-2 text-right text-muted">10638520</h6>
                            </div>
                        </div>
                        <hr class="my-1">
                        <div class="row">
                            <div class="col">
                                <h6 class="mt-2 text-left">DOB</h6>
                            </div>
                            <div class="col-auto">
                                <h6 class="mt-2 text-right text-muted">November 07, 1997</h6>
                            </div>
                        </div>
                        <hr class="my-1">
                        <div class="row">
                            <div class="col">
                                <h6 class="mt-2 text-left">Email</h6>
                            </div>
                            <div class="col-auto">
                                <h6 class="mt-2 text-right text-muted">aakashmole@gmail.com</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                    
                        

                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Communcation Details</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Educational Details</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Account Settings</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpane" aria-labelledby="home-tab"> 
                            
                                <div class="card shadow p-0">
                                    <div class="card-body py-2">
                                         <div class="form-row">
                                            <div class="form-group mb-1 col-md-3">
                                                <label for="firstname">Primary Number</label>
                                                <input type="text" id="firstname" class="form-control" value="<?php echo $student_info['primary_number']; ?>">
                                            </div>
                                            <div class="form-group mb-1 col-md-3">
                                                <label for="firstname">Secondary Number</label>
                                                <input type="text" id="firstname" class="form-control" value="<?php echo $student_info['secondary_number']; ?>">
                                            </div>
                                            <div class="form-group mb-1 col-md-3">
                                                <label for="firstname">Parent's Number</label>
                                                <input type="text" id="firstname" class="form-control" value="<?php echo $student_info['parents_number']; ?>">
                                            </div>
                                            <div class="form-group mb-1 col-3">
                                                <label>&nbsp;</label>
                                                <button class="btn btn-block btn-primary">Update Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 col-md-6">
                                        <div class="card shadow">
                                            <div class="card-header bg-light">
                                                <h6 class="mb-0">Permanent Address</h6>
                                            </div>
                                            <div class="card-body py-2">
                                                <span id="PermanentAddLine1">Plot No. 107, Goldmine Housing Society,</span> <br>
                                                <span id="PermanentAddLine2">Bhavani Nagar, MIDC Road,</span> 
                                                <span id="PermanentAddCity">Shendurjane,</span><br>
                                                Taluka - <span id="PermanentAddTaluka"></span>, District - <span id="PermanentAddDistrict"></span>, <br>
                                                <span id="PermanentAddState"></span>, India. <span id="PermanentAddPincode"></span>
                                                <button class="btn btn-primary btn-block btn-sm mt-2 mb-1" data-toggle="modal" data-target="#permanentAddressModal">Update Address</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card shadow">
                                            <div class="card-header bg-light">
                                                <h6 class="mb-0">Temporary Address</h6>
                                            </div>
                                            <div class="card-body py-2">
                                                Plot No. 107, Goldmine Housing Society, <br>
                                                Bhavani Nagar, MIDC Road, Shendurjane, <br>
                                                Taluka - Wai, District - Satara, <br>
                                                Maharashtra, India. 412803
                                                <button data-toggle="modal" data-target="#temporaryAddressModal" class="btn btn-primary btn-block btn-sm mt-2 mb-1">Update Address</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpane" aria-labelledby="profile-tab">
                                <div class="form-row">
                                    <div class="form-group col-md-4 col-12">
                                        <label>Title</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpane" aria-labelledby="contact-tab">

                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <?php include './staticPages/modals.static.php'; ?>
        </main>

        <!-- Modal -->
        <div class="modal fade" id="permanentAddressModal" tabindex="-1" role="dialog" aria-labelledby="permanentAddressModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalModalTitle">Update Permanent Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Address Line 01</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label>Address Line 02</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label>City / Village</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label>Pincode</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn mb-2 btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="temporaryAddressModal" tabindex="-1" role="dialog" aria-labelledby="temporaryAddressModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalModalTitle">Update Temporary Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Address Line 01</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label>Address Line 02</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label>City / Village</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label>Pincode</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn mb-2 btn-primary">Save changes</button>
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
    <script>
        $(document).ready(function() {


        });
    </script>
</body>

</html>