<?php

include 'class-autoload.inc.php';

session_start();

if (!isset($_SESSION['student_id'])) {
    echo "Error !";
}

if($_POST['type'] == "setMCQExamSession"){
    $exam_id = $_POST['exam_id'];

    $_SESSION['exam_id'] = $exam_id;
    if (isset($_SESSION['student_id'])) {
        echo "OK";
    }
}