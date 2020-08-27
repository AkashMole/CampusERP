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
    <link rel="stylesheet" href="./../assets/css/select2.css">
    <link rel="stylesheet" href="./../assets/css/daterangepicker.css">
    <link rel="stylesheet" href="./../assets/css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="./../assets/css/app-dark.css" id="darkTheme">
</head>

<body class="vertical dark">
    <div class="wrapper">

        <?php
            include './staticPages/navbar.static.php';
            include './staticPages/sidebar.static.php';
        ?>

        <main role="main" class="main-content">
            <div class="container-fluid px-2">
                <div class="row justify-content-center">
                    <div class="col text-left">
                        <h1 class="h4 page-title">Good Morning, Akash.....</h1>
                    </div>
                    <div class="col text-right d-none d-md-block">
                        <h1 class="h6 page-title">Last Login : 13 August 2020, 10:13 AM</h1>
                    </div>
                </div>
                <hr class="pb-3">
                <div class="row mt-3">
                    <div class="col-12 col-md-3">
                        <h5 class="text-center">Akash Milind Mole</h5>
                        <img id="userProfile" src="https://scontent.fnag1-1.fna.fbcdn.net/v/t1.0-9/70928791_2224645207832910_3418321534098341888_o.jpg?_nc_cat=102&_nc_sid=09cbfe&_nc_ohc=S_spyrbtjTkAX_i3tDY&_nc_ht=scontent.fnag1-1.fna&oh=453ad6671f7235b84420103b73875c8b&oe=5F5BEFB9" class="img-fluid rounded p-2">
                        <div id="updateProfileImageView" class="text-center my-3">
                            <h5>Update Profile</h5>
                            <input type="file" class="form-control">
                        </div>
                        <hr>
                        <h5 class="text-center mt-3 mb-0">aakashmole@gmail.com</h5>
                        <h5 class="text-center mt-3 mb-0">PRN - 10638520</h5>
                        <div class="text-center">
                            <button class="btn btn-flat btn-warning btn-md mt-3">Request Password Reset</button>
                        </div>
                    </div>
                    <div class="col-md-9" id="updateProfileView">
                        <div class="row mb-3">
                            <div class="col-4 mx-auto">
                                <h5 class="border-bottom border-light text-center pb-2 text-warning">Contact Details</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Primary Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="7744967474">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Secondary Number</label>
                                <input type="text" class="form-control" value="8355849234">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Parent's Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="9067611171">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-8 col-md-5 mx-auto">
                                <h5 class="text-center border-bottom border-light pb-2 text-warning">Residential Address Details</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Address Line 1 <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="7744967474">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Address Line 2</label>
                                <input type="text" class="form-control" value="8355849234">
                            </div>
                            <div class="form-group col-md-4">
                                <label>State <span class="text-danger">*</span></label>
                                <select class="form-control select2">
                                    <option selected="">Choose...</option>
                                    <option>...</option>
                                    <option>one</option>
                                    <option>two</option>
                                    <option>five</option>
                                    <option>ten</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>District <span class="text-danger">*</span></label>
                                <select class="form-control select2" disabled>
                                    <option selected="">Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Taluka <span class="text-danger">*</span></label>
                                <select class="form-control select2" disabled>
                                    <option selected="">Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>City / Village <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="9067611171">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Landmark</label>
                                <input type="text" class="form-control" value="9067611171">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Pincode <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="9067611171">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-8 col-md-5 mx-auto">
                                <h5 class="text-center border-bottom border-light pb-2 text-warning">Permanent Address Details</h5>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Address Line 1 <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="7744967474">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Address Line 2</label>
                                <input type="text" class="form-control" value="8355849234">
                            </div>
                            <div class="form-group col-md-4">
                                <label>State <span class="text-danger">*</span></label>
                                <select class="form-control select2">
                                    <option selected="">Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>District <span class="text-danger">*</span></label>
                                <select class="form-control select2">
                                    <option selected="">Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Taluka <span class="text-danger">*</span></label>
                                <select class="form-control select2">
                                    <option selected="">Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>City / Village <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="9067611171">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Landmark</label>
                                <input type="text" class="form-control" value="9067611171">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Pincode <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="9067611171">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-5 mx-auto">
                                <button id="updateProfileButton" class="btn btn-block btn-warning">Update Profile</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 text-center" id="loadingSpinner">
                        <div class="spinner-border mr-3 text-warning" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="col-md-9" id="confirmUpdateView">
                        <div class="form-row">
                            <div class="form-group col-4 my-auto">
                                <label>Password</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-4 my-auto">
                                <label>Confirm Password</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-4 my-auto">
                                <label>OTP (Check Email)</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-5 mx-auto mt-3">
                                <button id="confirmProfileButton" class="btn btn-block btn-warning">Confirm Changes</button>
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
    <script>
        $(document).ready(function() {
            //Initial Setup
            $("#confirmUpdateView").hide();
            $("#loadingSpinner").hide();
            $("#updateProfileImageView").hide();
            $('.select2').select2({
                theme: 'bootstrap4',
            });

            $(document).on("click", "#userProfile", function() {
                $("#updateProfileImageView").toggle();
            });
            $(document).on("click", "#updateProfileButton", function() {
                $("#updateProfileView").hide();
                $("#loadingSpinner").show();

                setTimeout(function() {
                    $("#loadingSpinner").hide();
                    $("#confirmUpdateView").show();
                }, 3000);
            });
            $(document).on("click", "#confirmProfileButton", function() {
                $("#confirmUpdateView").hide();
                $("#loadingSpinner").show();

                setTimeout(function() {
                    $("#loadingSpinner").hide();
                    $("#updateProfileView").show();
                }, 3000);
            });

        });
    </script>
</body>

</html>