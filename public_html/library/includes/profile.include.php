<?php

include 'class-autoload.inc.php';

session_start();

if (!isset($_SESSION['teacher_id'])) {
    echo "Error !";
}

$teacher_id = $_SESSION['teacher_id'];

if($_POST['type'] == "updateCommDetails"){

    $mobile_number = $_POST['mobile_number'];
    $secondary_number = $_POST['secondary_number'];
    $email = $_POST['email'];
    $add01 = $_POST['add01'];
    $add02 = $_POST['add02'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];

    $Teacher = new Teacher();
    echo $Teacher->updateDetails($teacher_id, $mobile_number, $secondary_number, $email, $add01, $add02, $city, $pincode);
    
}

if($_POST['type'] == "updatePassword"){
    $password = $_POST['password'];
    $old = $_POST['old'];
    
    $Teacher = new Teacher();
    echo $Teacher->updatePassword($teacher_id, $password, $old);
}

?>