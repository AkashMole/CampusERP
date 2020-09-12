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
    $profile_path = $bookData['profile_path'];
    $publication = $bookData['publication'];

    echo json_encode(array("Result"=>"ok", "name"=>$name, "description"=>$description, "author"=>$author, "total"=>$total, "available"=>$available, "profile_path"=>$profile_path, "publication"=>$publication));
}