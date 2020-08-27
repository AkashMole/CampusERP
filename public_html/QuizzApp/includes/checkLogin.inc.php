<?php

include 'class-autoload.inc.php';

session_start();
date_default_timezone_set("Asia/Kolkata");

if($_POST['type'] == "studentLogin"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $log = $_POST['log'];
    $Browser = $_POST['Browser'];
    $Student = new Student();
    $Student->checkStudent($username, $password,$log,$Browser);
}

if($_POST['type'] == "staffLogin"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $log = $_POST['log'];
    $Browser = $_POST['Browser'];
    $Staff = new Staff();
    $Staff->checkStaff($username, $password,$log,$Browser);
}

if($_POST['type'] == "studentRegistration"){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $Student = new Student();
    $Student->addStudent($fname, $lname, $email, $mobile, $username, $password);
}

?>