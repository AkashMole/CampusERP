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

    public function reserveBook($book_id, $user_id){
        try {
            $sql = "INSERT INTO `book_reservation_info` (`user_id`, `book_id`) VALUES (?,?);";
            $stmt = $this->connect()->prepare($sql);
            
            if($stmt->execute([$user_id, $book_id]))
                echo "ok";
            else
                echo "error";
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    

}
