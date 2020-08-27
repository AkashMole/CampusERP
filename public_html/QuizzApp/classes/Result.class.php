<?php

$filepath = realpath(dirname(__FILE__));
require_once($filepath . "/dbh.class.php");

class Result extends Dbh
{
    //Student Dashboard
    public function getStudentExamResult($exam_id, $student_id)
    {
        try {
            $sql = "SELECT * FROM `result_info` WHERE `exam_id` = ? AND `student_id` = ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$exam_id, $student_id]);
            return $stmt;
        } catch (Exception $e) {
        }
    }

    //Student Dashboard
    public function getAllResults($student_id)
    {
        $sql = "SELECT * FROM `result_info` WHERE `student_id` = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$student_id]);
        $ExamResultsCount = $stmt->rowCount();

        if ($ExamResultsCount > 0) {
            $ExamResults = $stmt->fetchAll();
            foreach ($ExamResults as $ExamResult) {
                $exam_id = $ExamResult['exam_id'];

                $examObj = new Exam();
                $Exam = $examObj->getExam($exam_id);
                $exam_name = $Exam['exam_name'];
                $exam_marks = $ExamResult['marks_scored'];

                echo '
                            <tr class="text-center">
                                <td>' . $exam_name . '</td>
                                <td>' . $exam_marks . '</td>
                            </tr>

                        ';
            }
        }
    }

    public function setExamResult($exam_id, $student_id, $start_time, $end_time, $marks){
        try {
            $sql = "INSERT INTO `result_info`(`exam_id`, `student_id`, `marks_scored`, `start_time`, `end_time`) VALUES (?,?,?,?,?) ";
            $stmt = $this->connect()->prepare($sql);
            if($stmt->execute([$exam_id, $student_id, $marks, $start_time, $end_time])){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            
        }
    }

}
