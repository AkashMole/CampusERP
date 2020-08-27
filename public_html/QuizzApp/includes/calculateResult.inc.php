<?php

include 'class-autoload.inc.php';

session_start();
date_default_timezone_set("Asia/Kolkata");

$exam_id = $_GET['exam_id'];

$Result = new Result();
echo "Result<br>";
echo $Result->calculateResult($exam_id);
