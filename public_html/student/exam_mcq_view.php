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
        $Questions = $Exam->getMCQExamQuestions($exam_id, $exam_info['exam_postfix'], $exam_info['subject_unit'], $student_id);

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
                                <b>Time Left -</b>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

                    $count = 1;

                    foreach($Questions AS $Question){
                ?>
                <div class="mt-2 d-none card singleQuestion">
                    <div class="card-body">
                        <h6>Q. <?php echo " ". $count." -> ".$Question['question']; ?></h6>                               
                        <div class="custom-switches-stacked mt-2">
                            <input type="hidden" name="answer1" value="C State within state" disabled>
                            <input type="hidden" name="mark1" value="1" disabled>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1"><?php echo $Question['option 1']; ?></label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2"><?php echo $Question['option 2']; ?></label>
                            </div>
                            <?php 
                                if($Question['option 3'] != NULL){
                            ?>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio3"><?php echo $Question['option 3']; ?></label>
                            </div>
                            <?php
                                }
                                if($Question['option 4'] != NULL){
                            ?>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
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
                
                <div class="row my-3 d-none" id="submitButtonView">
                    <div class="col-2 mx-auto">
                        <button id="submitExamBtn" class="btn btn-primary btn-block">Submit Exam</button>
                    </div>
                </div>

                <div class="row mt-3 d-none" id="calculationView">
                
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
    <script src="./assets/js/exam_mcq_view.php.js"></script>

</body>

</html>