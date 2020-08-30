<?php

$filepath = realpath(dirname(__FILE__));
require_once($filepath . "/dbh.class.php");

class Student extends Dbh
{

    public function checkStudent($email, $password, $logintime){

        try {
            $sql = "SELECT * FROM `student_basic_info` WHERE `email_address` = ? AND `password` = ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email, $password]);
            $student_info = $stmt->fetch();
            $student_id = $student_info['student_id'];
            if (strlen($student_id) !== 0) {
                $sql = "UPDATE `student_basic_info` SET `last_login` = ? WHERE `student_id` = ? ";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$logintime, $student_id]);
                $_SESSION["student_id"] = $student_id;
                echo json_encode(array("ok"));
            } else {
                echo json_encode(array("userpass"));
            }
        } catch (Exception $e) {
            echo json_encode(array("error", $e->getMessage()));
        }
    }

    public function getStudentBasicInfo($student_id){
        try {
            $sql = "SELECT * FROM `student_basic_info` WHERE `student_id` = ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$student_id]);
            $student_info = $stmt->fetch();
            return $student_info;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
