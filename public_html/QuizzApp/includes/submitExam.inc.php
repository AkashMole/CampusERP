<?php

include 'class-autoload.inc.php';

session_start();
date_default_timezone_set("Asia/Kolkata");

if($_POST['type'] == "submitExam"){
    $exam_id = $_POST['exam_id'];
    $student_id = $_POST['student_id'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];   
    $marks = $_POST['marks'];   

    $ResultObj = new Result();

    if($ResultObj->setExamResult($exam_id, $student_id, $start_time, $end_time, $marks)){
        echo json_encode(array("ok"));
    }else{
        echo json_encode(array("exists"));
    }

    
}
