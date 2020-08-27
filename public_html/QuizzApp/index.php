<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; QuizzApp</title>
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
                    <div class="col-md-4 my-auto">
                        <div class="card card-primary">
                            <div class="card-body">
                                <h5 class="text-dark text-center">QuizzApp | Student Login</h5>
                                <hr>
                                <div id="login">
                                    <div class="form-group">
                                        <input name="username" id="username" type="text" class="form-control" placeholder="Enter Username">
                                    </div>

                                    <div class="form-group">
                                        <input name="password" id="password" type="password" class="form-control" placeholder="Enter Password">
                                    </div>

                                    <div class="form-group">
                                        <button id="submit" class="btn btn-primary btn-lg btn-block">
                                            Login
                                        </button>
                                    </div>

                                    <div class="text-center">
                                        <a href="./Register.php">Register Now !</a>
                                    </div>
                                </div>
                                <div id="loader" class="text-center">
                                    <img src="./assets/img/final/static/spinner-primary.svg" alt="Spinner" class="img-fluid" style="width:100px;">
                                </div>
                                <div class="row" id="staff">
                                    <div class="col-md-12">
                                        <hr class="bg-dark">
                                        <h6 class="text-center">Management Login</h6>
                                        <a href="login.prof.php" class="btn btn-danger btn-block text-white">Professor's Login</a>
                                    </div>
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
            $(document).on("click", "#submit", function() {
                $("#login").hide();
                $("#staff").hide();
                $("#loader").show();
                var log = moment().format('YYYY-MM-D hh:mm:ss');

                var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
                Browser = "Other";
                if (isChrome)
                    Browser = "Chromium based Browser";

                var dataString = "type=studentLogin&Browser=" + Browser + "&log=" + log + "&username=" + $("#username").val() + "&password=" + $("#password").val();
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
                            window.location.href = "./studentDashboard.php";
                        } else if ($.trim(result[0]) == "userpass") {
                            alert("Wrong Username & Password");
                            $("#login").show();
                            $("#staff").show();
                            $("#loader").hide();
                        } else if ($.trim(result[0]) == "error") {
                            alert(result[1]);
                        }
                    }
                });

            });
        });
    </script>
</body>

</html>