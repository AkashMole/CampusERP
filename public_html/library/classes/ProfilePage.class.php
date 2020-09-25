<?php

$filepath = realpath(dirname(__FILE__));
require_once($filepath . "/dbh.class.php");

class ProfilePage extends Dbh
{

    public function checkStudent($email, $password, $logintime){

        try {
            
            if (strlen($student_prn) !== 0) {
                $sql = "UPDATE `student_basic_info`SET `last_login` = ? WHERE `prn_number` = ? ";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$logintime, $student_prn]);
                $_SESSION["student_prn"] = $student_prn;
                echo json_encode(array("ok"));
            } else {
                echo json_encode(array("userpass"));
            }
        } catch (Exception $e) {
            echo json_encode(array("error", $e->getMessage()));
        }
    }

}
