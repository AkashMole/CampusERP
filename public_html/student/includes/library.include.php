<?php

include 'class-autoload.inc.php';

session_start();

if (!isset($_SESSION['student_id'])) {
    echo "Error !";
}