<?php

$filepath = realpath(dirname(__FILE__));
require_once($filepath . "/dbh.class.php");

class Exam extends Dbh
{

    //Student Dashboard
    public function getExamFromStatus($exam_status)
    {
        try {
            $time = date('Y-M-D h:m:s');
            $sql = "SELECT * FROM `exam_info` WHERE `exam_staus` = ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$exam_status]);
            return $stmt;
        } catch (Exception $e) {
        }
    }

    //Student Dashboard
    public function getAvailableExamToStudent($student_id)
    {
        $output = null;

        try {

            $stmt = $this->getExamFromStatus("Active");
            $examCount = $stmt->rowCount();

            if ($examCount > 0) {
                $Exams = $stmt->fetchAll();
                foreach ($Exams as $Exam) {
                    $exam_name = $Exam['exam_name'];
                    $exam_id = $Exam['exam_id'];
                    $resultObj = new Result();
                    $stmt = $resultObj->getStudentExamResult($exam_id, $student_id);
                    $resultCount = $stmt->rowCount();
                    if ($resultCount < 1) {
                        $output .= '
                            <tr class="text-center">
                                <td>' . $exam_name . '</td>
                                <td>
                                    <a href="./studentExam.php?exam_id=' . $exam_id . '" class="btn btn-primary btn-block btn-sm">Attempt</a>
                                </td>
                            </tr>
                        ';
                    }
                }
            }
            return $output;
        } catch (Exception $e) {
            return json_encode(array("error", $e->getMessage()));
        }
    }

    //Student Dashboard
    public function getExam($exam_id)
    {
        try {
            $sql = "SELECT * FROM `exam_info` WHERE `exam_id` = ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$exam_id]);
            $Exam = $stmt->fetch();
            return $Exam;
        } catch (Exception $e) {
            echo json_encode(array("error", $e->getMessage()));
        }
    }

    //Exam Page
    //TODO Working on optimizing
    public function getExamQuestions($exam_id)
    {
        $output = null;
        $counter = 1;

        try {
            $sql = "SELECT * FROM `exam_info` WHERE `exam_id` = ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$exam_id]);
            $Exam = $stmt->fetch();

            $exam_unit = $Exam['exam_unit'];
            $exam_subject = $Exam['exam_subject'];
            $exam_marks = intval($Exam['exam_marks']);
            $sql = "SELECT * FROM `questions_info` WHERE `subject_id` = ? AND `unit_number` = ? ORDER BY rand() LIMIT $exam_marks";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$exam_subject, $exam_unit]);
            $QuestionsData = $stmt->fetchAll();
            $qCount = $stmt->rowCount();
            if ($qCount > 0) {
                foreach ($QuestionsData as $QuestionData) {
                    $question_id = $QuestionData['question_id'];
                    $question = $QuestionData['question'];
                    $option1 = $QuestionData['option1'];
                    $option2 = $QuestionData['option2'];
                    $option3 = $QuestionData['option3'];
                    $option4 = $QuestionData['option4'];
                    $answer = $QuestionData['answer'];
                    $mark = $QuestionData['mark'];
                    $output .= '
                            <div class="col-md-6 col-12">
                                <div class="card border border-light questionAnswer">
                                    <div class="card-body bg-dark">
                                        <h6>Q. ' . $counter . ' - ' . $question . '</h6>
                                        <div class="custom-switches-stacked mt-2">
                                            <input type="hidden" name="answer' . $counter . '" value="' . $answer . '" disabled>
                                            <input type="hidden" name="mark' . $counter . '" value="' . $mark . '" disabled>
                                            <label class="custom-switch">
                                                <input type="radio" name="option' . $counter . '" value="' . $option1 . '" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description text-white">' . $option1 . '</span>
                                            </label>
                                            <label class="custom-switch">
                                                <input type="radio" name="option' . $counter . '" value="' . $option2 . '" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description text-white">' . $option2 . '</span>
                                            </label>
                            ';

                    if ($option3 != null) {
                        $output .= '
                                <label class="custom-switch">
                                    <input type="radio" name="option' . $counter . '" value="' . $option3 . '" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description text-white">' . $option3 . '</span>
                                </label>
                                ';
                    }
                    if ($option4 != null) {
                        $output .= '
                                <label class="custom-switch">
                                    <input type="radio" name="option' . $counter . '" value="' . $option4 . '" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description text-white">' . $option4 . '</span>
                                </label>
                                ';
                    }

                    $output .= '
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                    $counter++;
                }
            }
            return $output;
        } catch (Exception $e) {
            echo json_encode(array("error", $e->getMessage()));
        }
    }
}
