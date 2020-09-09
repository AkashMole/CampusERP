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
            $telegram_username = $student_info['telegram_username'];
            if (strlen($student_id) !== 0) {
                $sql = "UPDATE `student_basic_info` SET `last_login` = ? WHERE `student_id` = ? ";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$logintime, $student_id]);
                $_SESSION["student_id"] = $student_id;
                echo json_encode(array("ok", $student_info['profile_path'], $telegram_username));
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

    public function updatePassword($student_id, $password, $old){
        try {
            $sql = "UPDATE `student_basic_info` SET `password` = $password WHERE `student_id` = $student_id AND `password` = $old ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                echo json_encode(array("ok"));
            }else{
                echo json_encode(array("error", "Could not update password"));
            }
        } catch (Exception $e) {
            echo json_encode(array("error", $e->getMessage()));
        }
    }


    public function updateDetails($student_id, $mobile_number, $secondary_number, $parents_number, $email, $add01, $add02, $city, $pincode){
        try {
            $sql = "UPDATE student_basic_info SET primary_number = ?, secondary_number = ?, parents_number = ?, email_address = ?, add_line_01 = ?, add_line_02 = ?, city_village = ?, pincode = ? WHERE student_id = ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$mobile_number, $secondary_number, $parents_number, $email, $add01, $add02, $city, $pincode, $student_id]);
            if($stmt->rowCount() > 0){
                echo json_encode(array("ok"));
            }else{
                echo json_encode(array("error", "Could not update password"));
            }
        } catch (Exception $e) {
            echo json_encode(array("error", $e->getMessage()));
        }
    }



}
