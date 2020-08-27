<?php
session_start();
include './includes/class-autoload.inc.php';
if (isset($_SESSION['student_id'])) {
    $student_id = $_SESSION['student_id'];
} else {
    header('location: ./index.php');
}

if ($_GET['exam_id'] > 0) {
    $exam_id = $_GET['exam_id'];
} else {
    header('location: ./studentDashboard.php');
}

$StudentObj = new Student();
$ExamObj = new Exam();
$ResultObj = new Result();

$student_info = $StudentObj->getStudentInfo($student_id);
$exam_info = $ExamObj->getExam($exam_id);

$ResultData = $ResultObj->getStudentExamResult($exam_id, $student_id);
$ResultDataCount = $ResultData->rowCount();
if ($ResultDataCount > 0) {
    header('location: ./studentDashboard.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Student Dashboard &mdash; QuizzApp</title>
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="assets/css/components.css">
</head>

<body class="sidebar-mini bg-dark">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <!-- Main Content -->
            <div class="main-content mt-4 pt-0 text-white">
                <section class="section">
                    <div class="section-body">
                        <div class="sticky-top">
                            <div class="card border border-white">
                                <div class="card-body bg-dark pb-1">
                                    <div class="row">
                                        <div class="col-md-12 d-none d-md-block">
                                            <h5 class="text-center"><?php echo $student_info['student_username']; ?> | <?php echo $exam_info['exam_name']; ?></h5>
                                        </div>
                                        <div class="col-md-12 d-block d-md-none">
                                            <h6 class="text-center"><?php echo $student_info['student_username']; ?> | <?php echo $exam_info['exam_name']; ?></h6>
                                        </div>
                                    </div>
                                    <hr class="bg-white my-0 py-0">
                                    <h6 class="text-center timerRow pt-2">Remaining Time :- <span class="timer"><?php echo $exam_info['exam_time']; ?>:00</span></h6>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="InstructionsRow">
                            <div class="col-md-12">
                                <h5 class="text-center">Instructions To The Candidates For The Examination</h5>
                                <hr class="bg-white">
                                <h6>
                                    <li>Before the Examination starts</li>
                                </h6>
                                <ol>
                                    <li>Please verify that above details are correct before you start exam.</li>
                                    <li>Students must complete all multiple-choice questions within given period of time.</li>
                                    <li>Close all other browser tabs before you start the Examination</li>
                                    <li>Make Sure you have stable internet connection. You can check your internet speed at <a href="https://fast.com/" target="_blank">Fast by Netflix</a></li>
                                </ol>
                                <h6>
                                    <li>Browser Requirements</li>
                                </h6>
                                <ol>
                                    <li>
                                        Make Sure you have enabled Javascript Support for your Browser.
                                        (
                                        <span class="text-success">
                                            <script>
                                                document.write("Your Browser has Javasript Enabled");
                                            </script>
                                        </span>
                                        <span class="text-danger">
                                            <noscript>
                                                document.write("Your Browser has No Javasript Support");
                                            </noscript>
                                        </span>
                                        )
                                    </li>
                                    <li>Required Browser :- Chromium Based ( <span id="browser"></span> )</li>
                                </ol>
                                <h6>
                                    <li>Instructions to follow during Examination</li>
                                </h6>
                                <ol>
                                    <li class="text-danger">Do not Manually Refresh the Page. Doing such will submit your exam with 0 Marks.</li>
                                    <li class="text-danger">Do not Minimize or change the Exam Window. All window changes are being logged into System.</li>
                                </ol>
                                <div class="form-group">
                                    <a class="btn btn-block btn-primary" id="startSubmit">Start Exam</a>
                                </div>
                            </div>
                        </div>
                        <div class="loader text-center">
                            <img src="./assets/img/final/static/spinner-white.svg" alt="Loading" class="img-fluid" style="width:100px;">
                        </div>
                        <div class="row" id="examRow">
                            <?php
                            echo $ExamObj->getExamQuestions($exam_id);
                            ?>
                            <div class="col-md-12 mt-5 mb-2">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" id="endSubmit">Submit Exam</button>
                                </div>
                            </div>
                            <div class="col-md-12 border-top border-white">
                                <h6 class="text-center pt-2">Designed & Developed By Akash Mole.</h6>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/tooltip.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>
    <script src="assets/modules/izitoast/js/iziToast.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


    <script>
        $("#examRow").hide();
        $(document).ready(function() {

            //Initial Setup
            document.addEventListener('contextmenu', event => event.preventDefault());
            var interval;
            $("#examRow").hide();
            $(".loader").hide();
            var Browser = null,
                start_time = null,
                end_time = null,
                totalMarks = 0;
            checkBrowser();

            //Start Submit
            $(document).on("click", "#startSubmit", function() {
                Swal.fire({
                    title: 'Please Confirm',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#6777EF',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Start Exam..!'
                }).then((result) => {
                    if (result.value) {
                        startExam();
                    }
                })
            });

            //End Submit
            $(document).on("click", "#endSubmit", function() {
                clearInterval(interval);
                $(".timerRow").html("Exam Ended Successfully");
                end_time = moment().format('YYYY-MM-D h:mm:ss');

                $("#endSubmit").hide();
                $("#examRow").slideUp(1000).delay(1000);
                sendAlert("Exam Submit", "Submitting Exam To Server", "blue", 6000);
                $(".loader").show();

                var questionCount = $(".questionAnswer").length;
                for (var i = 1; i <= questionCount; i++) {
                    var data = $('input[name="option' + i + '"]:checked').val();
                    var ans = $('input[name="answer' + i + '"]').val();
                    var mark = parseInt($('input[name="mark' + i + '"]').val());
                    if (data == ans) {
                        totalMarks = totalMarks + mark;
                    }
                }

                var dataString = "type=submitExam&marks=" + totalMarks + "&start_time=" + start_time + "&end_time=" + end_time + "&exam_id=<?php echo $exam_id; ?>&student_id=<?php echo $student_id; ?>";
                console.log(dataString);
                $.ajax({
                    type: "POST",
                    url: "./includes/submitExam.inc.php",
                    data: dataString,
                    cache: false,
                    success: function(statusVar) {
                        console.log(statusVar);
                        var result = $.parseJSON(statusVar);
                        if ($.trim(result[0]) == "ok") {
                            sendAlert("Success", "Exam Result Submitted", "blue", 5000);
                            setTimeout(function() {
                                $(".loader").html("<h5>You have Scored - " + totalMarks + " Mark/s</h5>");
                            }, 5000);
                        } else if ($.trim(result[0]) == "exists") {
                            sendAlert("Warning", "Exam Submitted Previously.", "red", 5000);
                            setTimeout(function() {
                                $(".loader").html("Error! Exam Submitted Previously....");
                            }, 5000);
                        } else if ($.trim(result[0]) == "error") {
                            sendAlert("SQL Error", result[1], "red", 5000);
                        }
                    }
                });
            });

            //Start Exam
            function startExam() {
                $("#InstructionsRow").slideUp(1000).delay(1000);
                $(".loader").fadeIn(1000).delay(2500);
                setTimeout(function() {
                    $(".loader").hide();
                    $("#examRow").show();
                    startTimer();
                    start_time = moment().format('YYYY-MM-D h:mm:ss');
                }, 5000);
            }

            //Alert funciton
            function sendAlert(Title, Msg, Color, Timeout) {
                iziToast.show({
                    title: Title,
                    color: Color,
                    timeout: Timeout,
                    theme: 'light',
                    message: Msg
                });
            }

            //Check Browser
            function checkBrowser() {

                var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);

                Browser = "Other";
                if (isChrome)
                    Browser = "Google Chrome";

                if (Browser == "Other") {
                    $("#browser").text(" Your Browser is not Chromium Based. Please Change your browser to continue. ");
                    $("#browser").addClass("text-danger");
                    $("#startSubmit").hide();

                } else {
                    $("#browser").text(" Your Browser is Chromium Based. You can start Exam.");
                    $("#browser").addClass("text-success");
                }
            }

            //Timer Function
            function startTimer() {
                var minutes;
                var timer2 = $(".timer").html();
                interval = setInterval(function() {
                    var timer = timer2.split(':');
                    //by parsing integer, I avoid all extra string processing
                    minutes = parseInt(timer[0], 10);
                    var seconds = parseInt(timer[1], 10);
                    --seconds;
                    minutes = (seconds < 0) ? --minutes : minutes;
                    if (minutes < 0) {
                        $("#endSubmit").trigger("click");
                    } else {
                        if (minutes == 20 && seconds == 0) {
                            sendAlert("Alert", "20 Minutes Remaining", "red", 10000);
                        }
                        if (minutes == 10 && seconds == 0) {
                            sendAlert("Alert", "10 Minutes Remaining", "red", 10000);
                        }
                        if (minutes == 5 && seconds == 0) {
                            sendAlert("Alert", "Last 5 Minutes Remaining", "red", 15000);
                        }
                        if (minutes == 1 && seconds == 0) {
                            sendAlert("Alert", "Last 1 Minute Remaining", "red", 20000);
                        }
                    }
                    seconds = (seconds < 0) ? 59 : seconds;
                    seconds = (seconds < 10) ? '0' + seconds : seconds;
                    //minutes = (minutes < 10) ?  minutes : minutes;
                    $('.timer').html(minutes + ':' + seconds);
                    timer2 = minutes + ':' + seconds;
                }, 1000);
            }
        });
    </script>
</body>

</html>