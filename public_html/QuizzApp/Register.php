<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Registration &mdash; QuizzApp</title>
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
</head>

<body>
    <div class="nojs text-center">
        Enable JavaScript to Continue
    </div>
    <div id="app" class="d-none">
        <section class="section">
            <div class="container mt-5 pt-md-5">
                <div class="row">
                    <div class="col-md-6 d-none d-md-block p-5 my-auto">
                        <img src="assets/img/final/static/login.png" alt="Login Image" class="img-fluid p-5">
                    </div>
                    <div class="col-md-6 my-auto">
                        <div class="card card-primary">
                            <div class="card-body">
                                <h5 class="text-dark text-center">QuizzApp | Student Registration</h5>
                                <hr>
                                <div class="row" id="login">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input id="fname" type="text" class="form-control" placeholder="Enter First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input id="lname" type="text" class="form-control" placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email ID</label>
                                            <input id="email" type="text" class="form-control" placeholder="Enter Email ID">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input id="mobile" type="text" class="form-control" placeholder="Enter Mobile Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>PRN (Username)</label>
                                            <input id="username" type="text" class="form-control" placeholder="Enter PRN Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input id="password" type="password" class="form-control" placeholder="Enter Password">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button id="registerBtn" class="btn btn-block btn-primary">Register Now</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="./index.php" class="btn btn-block btn-primary">Already Registered? Login Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="loader" class="text-center">
                                    <img src="./assets/img/final/static/spinner-primary.svg" alt="Spinner" class="img-fluid" style="width:100px;">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/tooltip.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //Initial Setup
            $("#loader").hide();
            $(".nojs").addClass("d-none");
            $("#app").removeClass("d-none");

            // on Submit Click
            $(document).on("click", "#registerBtn", function() {
                $("#login").hide();
                $("#loader").show();

                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var email = $('#email').val();
                var mobile = $('#mobile').val();
                var username = $('#username').val();
                var password = $('#password').val();

                var dataString = "type=studentRegistration&fname=" + fname 
                + "&lname=" + lname
                + "&email=" + email
                + "&mobile=" + mobile
                + "&username=" + username
                + "&password=" + password;
                console.log(dataString);
                $.ajax({
                    type: "POST",
                    url: "./includes/checkLogin.inc.php",
                    data: dataString,
                    cache: false,
                    success: function(statusVar) {
                        console.log(statusVar);
                        var result = $.parseJSON(statusVar);
                        if ($.trim(result[0]) == "ok") {
                            alert("Account created Successfully");
                            window.location.href = "./index.php";
                        } else if ($.trim(result[0]) == "error") {
                            alert("Account already exists. Please Login");
                            window.location.href = "./index.php";
                        }
                    }
                });

            });
        });
    </script>
</body>

</html>