<?php

include 'class-autoload.inc.php';

session_start();

if (!isset($_SESSION['student_id'])) {
    echo "Error !";
}

if($_POST['type'] == "getBookDetails"){
    $book_id = $_POST['book_id'];

    $Library = new Library();
    $bookData = $Library->getBookDetails($book_id);

    $name = $bookData['name'];
    $description = $bookData['description'];
    $author = $bookData['author'];
    $total = $bookData['total'];
    $available = $bookData['available'];
    $publication = $bookData['publication'];

    echo json_encode(array("Result"=>"ok", "name"=>$name, "description"=>$description, "author"=>$author, "total"=>$total, "available"=>$available, "publication"=>$publication));
}

if($_POST['type'] == "reserveBook"){
    $book_id = $_POST['book_id'];
    $student_id = $_SESSION['student_id'];

    $Student = new Student();
    $StudentInfo = $Student->getStudentBasicInfo($student_id);
    $user_id = $StudentInfo['prn_number'];

    $Library = new Library();
    echo $reserveBook = $Library->reserveBook($book_id, $user_id);
}