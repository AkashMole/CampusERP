<?php

include 'class-autoload.inc.php';

session_start();

if (!isset($_SESSION['student_id'])) {
    echo "Error !";
}

$student_id = $_SESSION['student_id'];

if($_POST['type'] == "updateCommDetails"){
    
}

if($_POST['type'] == "updatePassword"){
    $password = $_POST['password'];
    date_default_timezone_set("Asia/Calcutta");
    $logintime = date("Y-m-d H:i:s");
    
    $Student = new Student();
    echo $Student->updatePassword($student_id, $password, $logintime);
}

?>