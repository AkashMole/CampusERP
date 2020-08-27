<?php

include '../assets/mail_script/mail_formats.php';

date_default_timezone_set("Asia/Kolkata");

$filepath = realpath(dirname(__FILE__));
require_once($filepath . "/dbh.class.php");

class sendMail extends Dbh
{
    function sendNewExam(){
        if($_GET['type'] == "newExam01"){
            $exam_id = $_GET['exam_id'];
            $date = date('d-M-Y h:i:s');

            echo "Mail Output";

            $sql = "SELECT * FROM `student_info` WHERE student_id = 14";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $Students = $stmt->fetchAll();

            foreach ($Students as $Student) {
                if($Student['student_email'] != null){
                    echo $output = newExam("New MCQ Exam Scheduled | QuizzApp",$Student['student_first_name'], $Student['student_last_name'], $Student['student_email'], "quizzapp@campuserp.xyz", "Qweasz@123", "SMD - Unit III", "Software Modeling & Design", "03:00 PM TO 06:00 PM - 26th April, 2020.", $date);
                }else{
                    echo "<br>Email not Sent to ----- ".$Student['student_first_name'];
                }
            }

        }
    }

    function loginSuccess($student_id, $browser){
        date_default_timezone_set('Asia/Calcutta');
        $Hour = date('G');
        $greetings = "Hello";
        if ($Hour >  0) $greetings = "Working Late, ";
        if ($Hour >  6) $greetings = "Good Morning, ";
        if ($Hour > 12) $greetings = "Good Afternoon, ";
        if ($Hour > 17) $greetings = "Good Evening, ";

        try {
            $stdentObj = new Student();
            $Student = $stdentObj->getStudentInfo($student_id);
            $date = date('d-M-Y h:i:s');
            $student_first_name = $Student['student_first_name'];
            $student_email = $Student['student_email'];
            newLogin($greetings, $student_first_name, $student_email, $browser, $date, "quizzapp@campuserp.xyz", "Qweasz@123");
        } catch (Exception $e) {

        }
    }

    function newAccount($email, $fname, $username, $password){
        date_default_timezone_set('Asia/Calcutta');
        $Hour = date('G');
        $greetings = "Hello";
        if ($Hour >  0) $greetings = "Working Late, ";
        if ($Hour >  6) $greetings = "Good Morning, ";
        if ($Hour > 12) $greetings = "Good Afternoon, ";
        if ($Hour > 17) $greetings = "Good Evening, ";

        try {
            newAccount($greetings, $fname, $email, $username, $password, "quizzapp@campuserp.xyz", "Qweasz@123");
        } catch (Exception $e) {
            echo "123123";
        }
    }
}

//$obj = new sendMail();
//$obj->sendNewExam();
