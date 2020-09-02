<?php

$filepath = realpath(dirname(__FILE__));
require_once($filepath . "/dbh.class.php");

class Library extends Dbh
{
    public function getBooks(){
        try {
            $sql = "SELECT * FROM `book_basic_info`; ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$student_id]);
            $books = $stmt->fetchAll();
            return $books;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    

}
