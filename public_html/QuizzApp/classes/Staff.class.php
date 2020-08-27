<?php

$filepath = realpath(dirname(__FILE__));
require_once($filepath . "/dbh.class.php");

class Staff extends Dbh
{

    public function checkStaff($username, $password, $log, $Browser)
    {

        try {
            $sql = "SELECT `teacher_id` FROM `teacher_info` WHERE `teacher_email` = ? AND `teacher_password` = ? AND `teacher_flag` = 'active' ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$username, $password]);
            $teacher_info = $stmt->fetch();
            $teacher_id = $teacher_info['teacher_id'];

            if (strlen($teacher_id) !== 0) {
                $sql = "UPDATE `teacher_info` SET `teacher_last_login` = ? WHERE `teacher_id` = ? ";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$log, $teacher_id]);
                $_SESSION["teacher_id"] = $teacher_id;
                echo json_encode(array("ok"));
            } else {
                echo json_encode(array("userpass"));
            }
        } catch (Exception $e) {
            echo json_encode(array("error", $e->getMessage()));
        }
    }

    public function getStaffInfo($teacher_id)
    {
        try {
            $sql = "SELECT * FROM `teacher_info` WHERE `teacher_id` = ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$teacher_id]);
            return $student_info = $stmt->fetch();
        } catch (Exception $e) {
            echo json_encode(array("error", $e->getMessage()));
        }
    }
}
