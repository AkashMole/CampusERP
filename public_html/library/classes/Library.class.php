<?php

$filepath = realpath(dirname(__FILE__));
require_once($filepath . "/dbh.class.php");

class Library extends Dbh
{
    public function getBooks(){
        try {
            $sql = "SELECT * FROM `book_basic_info` ORDER BY `time_log` DESC; ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $books = $stmt->fetchAll();
            return $books;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getBookDetails($book_id){
        try {
            $sql = "SELECT * FROM `book_basic_info` WHERE book_id = ?; ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$book_id]);
            $book = $stmt->fetch();
            return $book;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getReservations($user){
        try {
            $sql = "SELECT * FROM `book_reservation_info` WHERE user_id = ?; ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$user]);
            $Reservations = $stmt->fetchAll();
            return $Reservations;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getDetails($user){
        try {
            $studentInfo = "SELECT * FROM `student_basic_info` WHERE `prn_number` = ?; ";
            $studentstmt = $this->connect()->prepare($studentInfo);
            $studentstmt->execute([$user]);
            $StduentCount = $studentstmt->rowCount();

            if($StduentCount != 1){
                $teacherInfo = "SELECT * FROM `teacher_basic_info` WHERE `primary_number` = ?; ";
                $teacherstmt = $this->connect()->prepare($teacherInfo);
                $teacherstmt->execute([$user]);
                $TeacherCount = $teacherstmt->rowCount();

                if($TeacherCount != 1){
                    echo json_encode(array("error", "Invalid User ID"));
                }else{
                    $teacher = $teacherstmt->fetch();

                    $user_name = $teacher['first_name'] . " " . $teacher['middle_name'] . " " . $teacher['last_name'];
                    $mobile = $teacher['primary_number'];
                    $profile = "https://campuserp.xyz/teacher/assets/img/" . $teacher['profile_path'];

                    echo json_encode(array("ok", $user_name, $mobile, $profile));
                }
            }else{
                $stduent = $studentstmt->fetch();

                $user_name = $stduent['first_name'] . " " . $stduent['middle_name'] . " " . $stduent['last_name'];
                $mobile = $stduent['primary_number'];
                $profile = "https://campuserp.xyz/student/assets/img/" . $stduent['profile_path'];

                echo json_encode(array("ok", $user_name, $mobile, $profile));
            }


            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    

}
