<?php

include 'class-autoload.inc.php';
include '../assets/mail_script/mail_formats.php';

session_start();
date_default_timezone_set("Asia/Kolkata");

$filepath = realpath(dirname(__FILE__));
require_once($filepath . "/dbh.class.php");

class sendMail extends Dbh
{
    function sendNewExam(){
        if($_GET['type'] == "newExam"){
            $exam_id = $_GET['exam_id'];
            echo "Mail Output";

            $sql = "SELECT * FROM `student_info` WHERE student_id = 4";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $Students = $stmt->fetchAll();

            foreach ($Students as $Student) {
                if($Student['student_email'] != null){
                    echo $output = newExam("New MCQ Exam Scheduled | QuizzApp", $Student['student_first_name'], $Student['student_email'], "quizz.app@msgbuddy.com", "Qweasz@123", "WT - Unit I (Set II)", "Web Technologies", "10:30 AM TO 12:30 PM - 24th April, 2020.");
                }else{
                    echo "Email not Sent to ----- ".$Student['student_first_name'];
                }
            }

        }
    }
}

$obj = new sendMail();
$obj->sendNewExam();
