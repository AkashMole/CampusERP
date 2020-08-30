<?php

$filepath = realpath(dirname(__FILE__));
require_once($filepath . "/dbh.class.php");

class Teacher extends Dbh
{

    public function checkTeacher($email, $password, $logintime){

        try {
            $sql = "SELECT * FROM `teacher_basic_info` WHERE `email_address` = ? AND `password` = ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email, $password]);
            $teacher_info = $stmt->fetch();
            $teacher_id = $teacher_info['teacher_id'];
            if (strlen($teacher_id) !== 0) {
                $sql = "UPDATE `teacher_basic_info` SET `last_login` = ? WHERE `teacher_id` = ? ";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$logintime, $teacher_id]);
                $_SESSION["teacher_id"] = $teacher_id;
                echo json_encode(array("ok", $teacher_info['profile_path']));
            } else {
                echo json_encode(array("userpass"));
            }
        } catch (Exception $e) {
            echo json_encode(array("error", $e->getMessage()));
        }
    }

    public function getStudentBasicInfo($teacher_id){
        try {
            $sql = "SELECT * FROM `teacher_basic_info` WHERE `teacher_id` = ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$teacher_id]);
            $teacher_info = $stmt->fetch();
            return $teacher_info;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updatePassword($teacher_id, $password, $old){
        try {
            $sql = "UPDATE `teacher_basic_info` SET `password` = $password WHERE `teacher_id` = $teacher_id AND `password` = $old ";
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


    public function updateDetails($teacher_id, $mobile_number, $secondary_number, $email, $add01, $add02, $city, $pincode){
        try {
            $sql = "UPDATE teacher_basic_info SET primary_number = ?, secondary_number = ?, email_address = ?, add_line_01 = ?, add_line_02 = ?, city_village = ?, pincode = ? WHERE teacher_id = ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$mobile_number, $secondary_number, $email, $add01, $add02, $city, $pincode, $teacher_id]);
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
