<?php

include 'class-autoload.inc.php';

session_start();

if (!isset($_SESSION['student_id'])) {
    echo "Error !";
}

$student_id = $_SESSION['student_id'];

if($_POST['type'] == "updateCommDetails"){

    $mobile_number = $_POST['mobile_number'];
    $secondary_number = $_POST['secondary_number'];
    $parents_number = $_POST['parents_number'];
    $email = $_POST['email'];
    $add01 = $_POST['add01'];
    $add02 = $_POST['add02'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];

    $Student = new Student();
    echo $Student->updateDetails($student_id, $mobile_number, $secondary_number, $parents_number, $email, $add01, $add02, $city, $pincode);
    
}

if($_POST['type'] == "updatePassword"){
    $password = $_POST['password'];
    $old = $_POST['old'];
    
    $Student = new Student();
    echo $Student->updatePassword($student_id, $password, $old);
}

?>