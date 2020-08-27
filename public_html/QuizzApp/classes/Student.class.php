<?php

$filepath = realpath(dirname(__FILE__));
require_once($filepath . "/dbh.class.php");

class Student extends Dbh
{

    public function checkStudent($username, $password,$log, $Browser)
    {

        try {
            $sql = "SELECT `student_id` FROM `student_info` WHERE `student_username` = ? AND `student_password` = ? AND `student_status` = 'active' ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$username, $password]);
            $student_info = $stmt->fetch();
            $student_id = $student_info['student_id'];

            if (strlen($student_id) !== 0) {
                $sql = "UPDATE `student_info`SET `student_last_login` = ? WHERE `student_id` = ? ";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$log, $student_id]);
                $_SESSION["student_id"] = $student_id;
                echo json_encode(array("ok"));
            } else {
                echo json_encode(array("userpass"));
            }
        } catch (Exception $e) {
            echo json_encode(array("error", $e->getMessage()));
        }
    }

    public function getStudentInfo($student_id){
        try {
            $sql = "SELECT * FROM `student_info` WHERE `student_id` = ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$student_id]);
            return $student_info = $stmt->fetch();
        } catch (Exception $e) {
            echo json_encode(array("error", $e->getMessage()));
        }
    }

    public function addStudent($fname, $lname, $email, $mobile, $username, $password){
        try{
            $sql = "INSERT INTO `student_info`(`student_first_name`, `student_last_name`, `student_email`, `student_mobile`, `student_username`, `student_password`) values(?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$fname, $lname, $email, $mobile, $username, $password]);
            echo json_encode(array("ok"));
            $emailObj = new sendMail();
            $emailObj->newAccount($email, $fname, $username, $password);
        }catch (Exception $e) {
            echo json_encode(array("error", $e->getMessage()));
        }
    }

}
