<?php



if($_GET['messagetype'] == "newlogin"){

    $username = $_GET['username'];
    $browser = $_GET['browser'];
    $type = $_GET['type'];
    $user = $_GET['user'];

    if($type == "student"){
        echo $image = "https://campuserp.xyz/student/assets/img/" . $_GET['image'];
    }else{
        echo $image = "https://campuserp.xyz/teacher/assets/img/" . $_GET['image'];
    }
    date_default_timezone_set("Asia/Calcutta");
    $time = date("jS F, Y h:i:s A");
    $apiToken = "1155014817:AAHX7Q2lTO0AdLd3QrNenlfw77Wn1PmvDGA";
    $caption = urlencode('New User Login Detected...!'.PHP_EOL.'<b>Email</b> : <i>'.$username.'</i>'.PHP_EOL.'<b>Time</b> : <i>'.$time.'</i>'.PHP_EOL.'<b>Broswer</b> : <i>'. $browser.'</i>');

    echo $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?chat_id=@erpUpdates&text=$caption&parse_mode=html");
    echo $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?chat_id=$user&text=$caption&parse_mode=html");
}

if($_GET['messagetype'] == "passwordchange"){

    echo $username = $_GET['username'];

    date_default_timezone_set("Asia/Calcutta");
    $time = date("jS F, Y h:i:s A");

    $apiToken = "1155014817:AAHX7Q2lTO0AdLd3QrNenlfw77Wn1PmvDGA";

    $text = urlencode('Hello '.$username.' Password updated.');

    echo $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?chat_id=@erpUpdates&text=$text");
}