<?php

include 'class-autoload.inc.php';

session_start();

if($_POST['type'] == "checkLogin"){
    $email = $_POST['email'];
    $password = $_POST['password'];
    date_default_timezone_set("Asia/Calcutta");
    $logintime = date("Y-m-d H:i:s");
    
    $Student = new Student();
    echo $Student->checkStudent($email, $password, $logintime);
}

?>