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
                            
                                <div class="form-row mt-2">
                                    <div class="form-group col-md-6">
                                        <label>Primary Number</label>
                                        <input type="text" id="mobile_number" class="form-control" value="<?php echo $student_info['primary_number']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Secondary Number</label>
                                        <input type="text" id="s_number_input" class="form-control" value="<?php echo $student_info['secondary_number']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Parent's Number</label>
                                        <input type="text" id="p_number_input" class="form-control" value="<?php echo $student_info['parents_number']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email Address</label>
                                        <input type="text" id="email_input" class="form-control" value="<?php echo $student_info['email_address']; ?>">
                                    </div>
                                </div>

                                <hr>

                                <div class="form-row mt-2">
                                    <div class="form-group col-md-12">
                                        <label>Address Line 01</label>
                                        <input type="text" id="add_01_input" class="form-control" value="<?php echo $student_info['add_line_01']; ?>">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Address Line 02</label>
                                        <input type="text" id="add_02_input" class="form-control" value="<?php echo $student_info['add_line_02']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>City/Village</label>
                                        <input type="text" id="city_village_input" class="form-control" value="<?php echo $student_info['city_village']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Pincode</label>
                                        <input type="text" id="pincode_input" class="form-control" value="<?php echo $student_info['pincode']; ?>">
                                    </div>
                                </div>

                                <div class="form-row mt-2">
                                    <div class="form-group col-md-12">
                                        <button id="comm_details_update_btn" class="btn btn-block btn-primary">Update Details</button>
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
    <script src="./assets/js/profile.php.js"></script>
</body>

</html>