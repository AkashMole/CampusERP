<?php
    session_start();
    date_default_timezone_set("Asia/Calcutta");
    include './includes/class-autoload.inc.php';
    if (isset($_SESSION['student_id']))
        $student_id = $_SESSION['student_id'];
    else
        header('location: ./login.php');
    $ProfilePage = new ProfilePage();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="manifest" href="./staticPages/manifest.json">
    <link rel="icon" href="../assets/img/logo.ico">
    <title>Campus ERP - Student Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./../assets/css/feather.css">
    <link rel="stylesheet" href="./../assets/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="./../assets/css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="./../assets/css/app-dark.css" id="darkTheme">
</head>

<body class="vertical dark ScrollStyle">
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
                                <h5>Upcoming MCQ Exams</h5>
                                <table class="table table-striped table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th class="d-none"></th>
                                            <th>Exam Name</th>
                                            <th>Subject</th>
                                            <th>Unit</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Duration</th>
                                            <th>Marks</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                            $Exam = new Exam();
                                            $exams = $Exam->getExams($student_id);
                                            foreach($exams AS $exam){
                                        ?>
                                            <tr class="examRow">
                                                <td class="examid d-none"><?php echo $exam['exam_id']; ?></td>
                                                <td class="examname text-left"><?php echo $exam['exam_name']; ?></td>
                                                <td><?php echo $exam['subject_unit']; ?></td>
                                                <td><?php echo $exam['subject_unit']; ?></td>
                                                <td><?php echo $exam['start_time']; ?></td>
                                                <td><?php echo $exam['end_time']; ?></td>
                                                <td class="examduration"><?php echo $exam['duration']; ?></td>
                                                <td class="exammarks"><?php echo $exam['marks']; ?></td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm" id="startExamModalBtn">Start Exam</button>
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
                </div>
            </div>
            <?php include './staticPages/modals.static.php'; ?>
        </main>

        <div class="modal fade startExamModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                    <div class="row">
                        <div class="col-8">
                            <h6 class="mb-0">
                                <span class="d-none" id="examModalExamID"></span>
                                <span id="examModalExamName"></span> 
                            </h6>
                        </div>
                        <div class="col-4 text-left">
                            <h6 class="mb-0">
                                <span class="float-left">Time - <span id="examModalExamDuration"></span> Mins.</span>
                                <span class="float-right">Marks - <span id="examModalExamMarks"></span></span>
                            </h6>
                        </div>
                    </div>
                    <hr class="px-5">
                    <h6>Exam Instructions -</h6>
                    <div class="row" id="InstructionsRow">
                        <div class="col-md-12">
                            <h6>
                                <li>Before the Examination starts</li>
                            </h6>
                            <ol>
                                <li>Please verify that above details are correct before you start exam.</li>
                                <li>Students must complete all multiple-choice questions within given period of time.</li>
                                <li>Close all other browser tabs before you start the Examination</li>
                                <li>Make Sure you have stable internet connection. You can check your internet speed at <a href="https://fast.com/" target="_blank">Fast by Netflix</a> (Opens in New Tab)</li>
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
                        </div>
                    </div>

                    </div>
                    <div class="modal-footer bg-light">
                        <button class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary btn-sm" id="startExamBtn">Start Exam</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="./../assets/js/jquery.min.js"></script>
    <script src="./../assets/js/popper.min.js"></script>
    <script src="./../assets/js/moment.min.js"></script>
    <script src="./../assets/js/bootstrap.min.js"></script>
    <script src="./../assets/js/tinycolor-min.js"></script>
    <script src="./../assets/js/config.js"></script>
    <script src="./../assets/js/apps.js"></script>
    <script src="./assets/js/exam_mcq.php.js"></script>
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