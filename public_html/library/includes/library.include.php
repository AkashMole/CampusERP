<?php

    include 'class-autoload.inc.php';

    session_start();

    if (!isset($_SESSION['teacher_id'])) {
        echo "Error !";
    }

    $teacher_id = $_SESSION['teacher_id'];

    if($_POST['type'] == "getUser"){

        $user = $_POST['user'];

        $Library = new Library();
        echo $Library->getDetails($user);
        
    }

    if($_POST['type'] == "getBookDetails"){

        $book_id = $_POST['book_id'];

        $Library = new Library();
        $Book = $Library->getBookDetails($book_id);

        $book_name = $Book['name'];
        $book_author = $Book['author'];
        $book_publication = $Book['publication'];
        $book_available = $Book['available'];

        echo json_encode(array("ok", $book_name, $book_author, $book_publication, $book_available));
        
    }

    if($_POST['type'] == "getReservations"){

        $user = $_POST['user'];

        $Library = new Library();
        $Reservations = $Library->getReservations($user);

        $output = "";

        foreach( $Reservations AS $Reservation ){

            $book = $Library->getBookDetails( $Reservation['book_id']);

            $output .= '
                        <tr class="bookRow">
                            <td class="bookid d-none">'. $Reservation['book_id'] .'</td>
                            <td class="text-left">'. $book['name'] .'</td>
                            <td>5R2C</td>
                            <td>
                                <button class="btn btn-sm btn-block btn-primary bookAllocateBtn">Allocate</button>
                            </td>
                        </tr>
            ';
        }

        echo $output;
        
    }
