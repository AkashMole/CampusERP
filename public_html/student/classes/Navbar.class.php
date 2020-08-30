<?php

$filepath = realpath(dirname(__FILE__));
require_once($filepath . "/dbh.class.php");

class Navbar extends Dbh
{

    public function getInfo($student_prn){

        try {
            $sql = "SELECT * FROM `student_basic_info` WHERE `student_prn` = ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$student_prn]);
            return $stmt;
        } catch (Exception $e) {

        }
    }

}
