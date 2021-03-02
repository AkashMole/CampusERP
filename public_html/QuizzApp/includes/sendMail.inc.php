<?php

include 'class-autoload.inc.php';
include '../assets/mail_script/mail_formats.php';

session_start();
date_default_timezone_set("Asia/Kolkata");

$filepath = realpath(dirname(__FILE__));
require_once("../classes/Dbh.class.php");

class sendMail extends Dbh
{
    function sendNewExam(){
        if($_GET['type'] == "newExam"){
            $exam_id = $_GET['exam_id'];
            echo "Mail Output";

            $sql = "SELECT * FROM `student_info` WHERE student_id > 200";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $Students = $stmt->fetchAll();

            foreach ($Students as $Student) {
                if($Student['student_email'] != null){
                    echo $output = newExam("New MCQ Exam Scheduled | QuizzApp", $Student['student_first_name'], $Student['student_email'], "quizzapp@campuserp.xyz", "Qweasz@11", "CG - UNIT 02", "Computer Graphics", "11:00 AM TO 12:00 PM ", "12th October, 2020.");
                }else{
                    echo "<hr>Email not Sent to ----- ".$Student['student_first_name'];
                }
            }

        }
    }
    function newUser(){
        if($_GET['type'] == "newUser"){
            echo "Mail Output";

            $sql = "SELECT * FROM `student_info` WHERE student_id = 222";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $Students = $stmt->fetchAll();

            foreach ($Students as $Student) {
                if($Student['student_email'] != null){
                    echo $output = newAccount("Greetings ", $Student['student_first_name'], $Student['student_email'], $Student['student_username'], $Student['student_password'],"quizzapp@campuserp.xyz", "Qweasz@11");
                    echo "<br>";
                }else{
                    echo "Email not Sent to ----- ".$Student['student_email'];
                }
            }

        }
    }
}

$obj = new sendMail();
//$obj->newUser();
$obj->sendNewExam();
