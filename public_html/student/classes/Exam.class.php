<?php

$filepath = realpath(dirname(__FILE__));
require_once($filepath . "/dbh.class.php");

class Exam extends Dbh
{
    public function getExams($student_id){
        try {
            $sql = "SELECT * FROM `mcq_exam_basic_info` WHERE `status` = 'active'; ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $exams = $stmt->fetchAll();
            return $exams;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }   

    public function getMCQExamQuestions($exam_id, $exam_postfix, $subject_unit, $student_id){
        try {

            $sql = "SELECT * FROM mcq_question_$exam_postfix WHERE subject_unit_id = ?; ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$subject_unit]);
            $Questions = $stmt->fetchAll();
            return $Questions;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getMCQExamDetails($exam_id){
        try {
            $sql = "SELECT * FROM `mcq_exam_basic_info` WHERE exam_id = ? ; ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$exam_id]);
            $Exam = $stmt->fetch();
            return $Exam;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
