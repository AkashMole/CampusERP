<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../assets/img/logo.ico">
    <title>Campus ERP - Student Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./../assets/css/feather.css">
    <link rel="stylesheet" href="./../assets/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="./../assets/css/app-light.css" id="lightTheme">
</head>

<body class="vertical dark ScrollStyle">

    <?php
    session_start();
    date_default_timezone_set("Asia/Calcutta");
    include './includes/class-autoload.inc.php';
    if (isset($_SESSION['student_id']))
        $student_id = $_SESSION['student_id'];
    else
        header('location: ./login.php');

    if (isset($_SESSION['exam_id']))
        $exam_id = $_SESSION['exam_id'];
    else
        echo "<script>window.close();</script>";

    date_default_timezone_set("Asia/Kolkata");
    $ProfilePage = new ProfilePage();
    $Exam = new Exam();
    $Student = new Student();

    $student_info = $Student->getStudentBasicInfo($student_id);

    $exam_info = $Exam->getMCQExamDetails($exam_id);
    $exam_marks = intval($exam_info['marks']);
    $Questions = $Exam->getMCQExamQuestions($exam_id, $exam_info['exam_postfix'], $exam_info['subject_unit'], $student_id, $exam_marks);

    ?>
    <div class="d-block d-md-none">
        <div style="min-height: 100%;  min-height: 100vh; display: flex; align-items: center;">
            <h1 class="text-center">
                This Web Page is only Viewable in Landscape Mode.
                <br>
                <small>Please rotate your device to Landscape Mode.</small>
            </h1>
        </div>
    </div>
    <div class="wrapper d-none d-md-block">
        <main role="main">
            <div class="container-fluid px-2 pl-4 pt-3">
                <div class="card position-sticky sticky-top">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 text-left my-auto h6">
                                <b>Exam Name - <?php echo $exam_id; ?></b>
                            </div>
                            <div class="col-md-3 text-right my-auto h6">
                                <h6 class="text-center timerRow pt-2">Remaining Time :- <span class="timer"><?php echo $exam_info['duration']; ?>:00</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-1">
                    <?php

                    $count = 1;

                    foreach ($Questions as $Question) {
                    ?>
                        <div class="mt-2 col-md-6 card singleQuestion d-none">
                            <div class="card-body">
                                <h6>Q. <?php echo " " . $count . " -> " . $Question['question']; ?></h6>
                                <div class="custom-switches-stacked mt-2">
                                    <input type="hidden" name="answer1" value="C State within state" disabled>
                                    <input type="hidden" name="mark1" value="1" disabled>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="option<?php echo $counter ?>" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio1"><?php echo $Question['option 1']; ?></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="option<?php echo $counter ?>" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio2"><?php echo $Question['option 2']; ?></label>
                                    </div>
                                    <?php
                                    if ($Question['option 3'] != NULL) {
                                    ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio3" name="option<?php echo $counter ?>" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio3"><?php echo $Question['option 3']; ?></label>
                                        </div>
                                    <?php
                                    }
                                    if ($Question['option 4'] != NULL) {
                                    ?>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio4" name="option<?php echo $counter ?>" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio4"><?php echo $Question['option 4']; ?></label>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                        $count++;
                    }
                    ?>
                </div>
                <div class="row my-3 d-none" id="submitButtonView">
                    <div class="col-2 mx-auto">
                        <button id="submitExamBtn" class="btn btn-primary btn-block">Submit Exam</button>
                    </div>
                </div>

                <div class="row mt-3 d-none" id="calculationView">
                    Calculating Marks....
                </div>

                <div class="modal fade RefreshModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <h6 class="mb-0">Right Click is Disabled on this Page</h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

    </div>
    <script src="./../assets/js/jquery.min.js"></script>
    <script src="./../assets/js/popper.min.js"></script>
    <script src="./../assets/js/moment.min.js"></script>
    <script src="./../assets/js/bootstrap.min.js"></script>
    <script src="./../assets/js/tinycolor-min.js"></script>
    <script src="./../assets/js/config.js"></script>
    <script src="./../assets/js/apps.js"></script>

    <script>
        //Timer Function
        function startTimer() {
            var minutes;
            var timer2 = $(".timer").html();
            interval = setInterval(function() {
                var timer = timer2.split(':');
                minutes = parseInt(timer[0], 10);
                var seconds = parseInt(timer[1], 10);
                --seconds;
                minutes = (seconds < 0) ? --minutes : minutes;
                if (minutes < 0) {
                    $("#endSubmit").trigger("click");
                } else {
                    if (minutes == 20 && seconds == 0)
                        sendAlert("Alert", "20 Minutes Remaining", "red", 10000);
                    if (minutes == 10 && seconds == 0)
                        sendAlert("Alert", "10 Minutes Remaining", "red", 10000);
                    if (minutes == 5 && seconds == 0)
                        sendAlert("Alert", "Last 5 Minutes Remaining", "red", 15000);
                    if (minutes == 1 && seconds == 0)
                        sendAlert("Alert", "Last 1 Minute Remaining", "red", 20000);
                }
                seconds = (seconds < 0) ? 59 : seconds;
                seconds = (seconds < 10) ? '0' + seconds : seconds;
                //minutes = (minutes < 10) ?  minutes : minutes;
                $('.timer').html(minutes + ':' + seconds);
                timer2 = minutes + ':' + seconds;
            }, 1000);
        }

        $(document).ready(function() {

            $(".singleQuestion").removeClass("d-none");
            $("#submitButtonView").removeClass("d-none");
            startTimer();
            start_time = moment().format('YYYY-MM-D h:mm:ss');

            $("#submitExamBtn").on("click", () => {

                $("#submitButtonView").addClass("d-none");
                $(".singleQuestion").addClass("d-none");
                $("#calculationView").removeClass("d-none");

                $(window).unbind('beforeunload');
                window.location.href = "./exam_mcq.php";
            });

            document.addEventListener('contextmenu', event => event.preventDefault());

            $(document).on('contextmenu', (event) => {
                event.preventDefault();
                $(".RefreshModal").modal('show');
            });

        });

        $(window).bind('beforeunload', function() {
            return "";
        });




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


        });
    </script>

</body>

</html>