<?php
date_default_timezone_set('Asia/Kolkata');
$date = date('d-M-Y h:i:s');

include 'PHPMailerAutoload.php'; 

function sendCredentials($student_name, $student_user_name, $student_password, $student_email_id, $sender_email, $sender_password)
{
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.stackmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $sender_email;
    $mail->Password = $sender_password;
    $mail->SMTPSecure = 'STARTTLS';
    $mail->Port = 587;
    $mail->setFrom($sender_email, "No-Reply @ QuizzApp");
    $mail->addReplyTo($sender_email, "No-Reply @ QuizzApp");
    $mail->addAddress($student_email_id);
    $mail->Subject = "QuizzApp | Login Credentials";
    $mail->isHTML(true);

    $mailContent = '
		
		



    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Mailto</title>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
        <style type="text/css">
            html {
                -webkit-text-size-adjust: none;
                -ms-text-size-adjust: none;
            }

            @media only screen and (min-device-width: 750px) {
                .table750 {
                    width: 750px !important;
                }
            }

            @media only screen and (max-device-width: 750px),
            only screen and (max-width: 750px) {
                table[class="table750"] {
                    width: 100% !important;
                }

                .mob_b {
                    width: 93% !important;
                    max-width: 93% !important;
                    min-width: 93% !important;
                }

                .mob_b1 {
                    width: 100% !important;
                    max-width: 100% !important;
                    min-width: 100% !important;
                }

                .mob_left {
                    text-align: left !important;
                }

                .mob_soc {
                    width: 50% !important;
                    max-width: 50% !important;
                    min-width: 50% !important;
                }

                .mob_menu {
                    width: 50% !important;
                    max-width: 50% !important;
                    min-width: 50% !important;
                    box-shadow: inset -1px -1px 0 0 rgba(255, 255, 255, 0.2);
                }

                .mob_center {
                    text-align: center !important;
                }

                .top_pad {
                    height: 15px !important;
                    max-height: 15px !important;
                    min-height: 15px !important;
                }

                .mob_pad {
                    width: 15px !important;
                    max-width: 15px !important;
                    min-width: 15px !important;
                }

                .mob_div {
                    display: block !important;
                }
            }

            @media only screen and (max-device-width: 550px),
            only screen and (max-width: 550px) {
                .mod_div {
                    display: block !important;
                }
            }

            .table750 {
                width: 750px;
            }
        </style>
    </head>

    <body style="margin: 0; padding: 0;">

        <table cellpadding="0" cellspacing="0" border="0" width="100%"
            style="background: #191D21; min-width: 350px; font-size: 1px; line-height: normal;">
            <tr>
                <td align="center" valign="top">
                    <!--[if (gte mso 9)|(IE)]>
            <table border="0" cellspacing="0" cellpadding="0">
            <tr><td align="center" valign="top" width="750"><![endif]-->
                    <table cellpadding="0" cellspacing="0" border="0" width="750" class="table750"
                        style="width: 100%; max-width: 750px; min-width: 350px; background: #191D21;">
                        <tr>
                            <td class="mob_pad" width="25" style="width: 25px; max-width: 25px; min-width: 25px;">&nbsp;
                            </td>
                            <td align="center" valign="top" style="background: #191D21;">

                                <table cellpadding="0" cellspacing="0" border="0" width="100%"
                                    style="width: 100% !important; min-width: 100%; max-width: 100%; background: #191D21;">
                                    <tr>
                                        <td align="right" valign="top">
                                            <div class="top_pad" style="height: 25px; line-height: 25px; font-size: 23px;">
                                                &nbsp;</div>
                                        </td>
                                    </tr>
                                </table>

                                <table cellpadding="0" cellspacing="0" border="0" width="88%"
                                    style="width: 88% !important; min-width: 88%; max-width: 88%;">
                                    <tr>
                                        <td align="left" valign="top">
                                            <div style="height: 39px; line-height: 39px; font-size: 37px;">&nbsp;</div>
                                            <span href="#" target="_blank"
                                                style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif;
                                                color: #4458EB; display: block; font-size: 52px;">
                                                QuizzApp
                                            </span>
                                            <div style="height: 10px; line-height: 39px; font-size: 37px;">&nbsp;</div>
                                            <span href="#" target="_blank"
                                                style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif;
                                                color: rgb(207, 207, 207); display: block; font-size: 18px;">
                                                A Product of MicroVersion Technologies
                                            </span>
                                            <div style="height: 15px; line-height: 73px; font-size: 71px;">&nbsp;</div>
                                            <hr>
                                            <div style="height: 30px; line-height: 73px; font-size: 71px;">&nbsp;</div>

                                        </td>
                                    </tr>
                                </table>

                                <table cellpadding="0" cellspacing="0" border="0" width="88%"
                                    style="width: 88% !important; min-width: 88%; max-width: 88%;">
                                    <tr>
                                        <td align="left" valign="top">
                                            <font face="Source Sans Pro, sans-serif" color="#1a1a1a"
                                                style="font-size: 52px; line-height: 60px; font-weight: 300; ">
                                                <span style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #FFFFFF; font-size: 42px; line-height: 60px; font-weight: 500; ">Greetings Akash Mole,</span>
                                            </font>
                                            <div style="height: 33px; line-height: 33px; font-size: 31px;">&nbsp;</div>
                                            <font face="Source Sans Pro, sans-serif" color="#585858" style="font-size: 24px; line-height: 32px;">
                                                <span style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #FFFFFF; font-size: 24px; line-height: 32px; font-weight: 300; ">Your Account has been created at <span style="color:#4458EB; font-weight: 1000; font-size: 28px;">QuizzApp</span> by your College Representative.</span>
                                            </font>
                                            <div style="height: 20px; line-height: 20px; font-size: 18px;">&nbsp;</div>
                                            <font face="Source Sans Pro, sans-serif" color="#585858"
                                                style="font-size: 24px; line-height: 32px;">
                                                <span
                                                    style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif;
                                                    color: #FFFFFF; font-size: 24px; line-height: 32px; font-weight: 300;
                                                    ">You can use <span
                                                        style="color:#4458EB; font-weight: 1000; font-size: 28px;">QuizzApp</span>
                                                    to attempt MCQ Exams held / organized by your college. Your will get
                                                    further information from your respective teachers. Kindly use following
                                                    Credentials to log on to your QuizzApp Account.</span>
                                            </font>
                                            <div style="height: 20px; line-height: 20px; font-size: 18px;">&nbsp;</div>
                                            <font face="Source Sans Pro, sans-serif" color="#585858"
                                                style="font-size: 24px; line-height: 32px;">
                                                <span
                                                    style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif;
                                                    color: #585858; font-size: 24px; line-height: 32px;">Username :-
                                                    1923017<br>Password&nbsp; :- 19230170000</span>
                                            </font>
                                            <div style="height: 33px; line-height: 33px; font-size: 31px;">&nbsp;</div>
                                            <table class="mob_btn" cellpadding="0" cellspacing="0" border="0"
                                                style="background: #4458EB; border-radius: 4px;">
                                                <tr>
                                                    <td align="center" valign="top">
                                                        <a href="#" target="_blank"
                                                            style="display: block; border: 1px solid #4458EB; border-radius:
                                                            4px; padding: 12px 23px; font-family: Source Sans Pro, Arial,
                                                            Verdana, Tahoma, Geneva, sans-serif; color: #ffffff; font-size:
                                                            20px; line-height: 30px; text-decoration: none; white-space:
                                                            nowrap; font-weight: 600;">
                                                            <font face="Source Sans Pro, sans-serif" color="#ffffff"
                                                                style="font-size: 20px; line-height: 30px; text-decoration: none; white-space: nowrap; font-weight: 600;">
                                                                <span
                                                                    style="font-family: Source Sans Pro, Arial, Verdana, Tahoma, Geneva, sans-serif; color: #ffffff; font-size: 20px; line-height: 30px; text-decoration: none; white-space: nowrap; font-weight: 600;">Visit QuizzApp</span>
                                                            </font>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div style="height: 75px; line-height: 75px; font-size: 73px;">&nbsp;</div>
                                        </td>
                                    </tr>
                                </table>

                                <table cellpadding="0" cellspacing="0" border="0" width="90%"
                                    style="width: 90% !important; min-width: 90%; max-width: 90%; border-width: 1px; border-style: solid; border-color: #e8e8e8; border-bottom: none; border-left: none; border-right: none;">
                                    <tr>
                                        <td align="left" valign="top">
                                            <div style="height: 15px; line-height: 15px; font-size: 13px;">&nbsp;</div>
                                        </td>
                                    </tr>
                                </table>

                                

                                <table cellpadding="0" cellspacing="0" border="0" width="100%"
                                    style="width: 100% !important; min-width: 100%; max-width: 100%; background: #191D21;">
                                    <tr>
                                        <td align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" border="0" width="88%"
                                                style="width: 88% !important; min-width: 88%; max-width: 88%;">
                                                <tr>
                                                    <td align="center" valign="top">
                                                        <font face="Source Sans Pro, sans-serif" color="#868686"
                                                            style="font-size: 17px; line-height: 20px;">
                                                            <span
                                                                style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #868686; font-size: 17px; line-height: 20px;">Copyright
                                                                &copy; 2020 QuizApp. | Designed & Developed by Akash Mole</span>
                                                        </font>
                                                        <div style="height: 35px; line-height: 35px; font-size: 33px;">
                                                            &nbsp;</div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                            <td class="mob_pad" width="25" style="width: 25px; max-width: 25px; min-width: 25px;">&nbsp;
                            </td>
                        </tr>
                    </table>
                    <!--[if (gte mso 9)|(IE)]>
            </td></tr>
            </table><![endif]-->
                </td>
            </tr>
        </table>
    </body>

    </html>




		';

    $mail->Body = $mailContent;
    if (!$mail->send()) {
        // echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}

function newExam($subject, $student_name,$student_last_name, $student_email_id, $sender_email, $sender_password, $exam_name, $subject_name, $exam_duration, $date)
{
    echo "<br>Sending mail:- <br>";
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.stackmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $sender_email;
    $mail->Password = $sender_password;
    $mail->SMTPSecure = 'STARTTLS';
    $mail->Port = 587;
    $mail->setFrom($sender_email, "QuizzApp Alerts");
    $mail->addReplyTo($sender_email, "CRM @ QuizzApp");
    $mail->addAddress($student_email_id, $student_name.' '.$student_last_name.' | QuizzApp Student');
    $mail->Subject = $subject;
    $mail->isHTML(true);

    $mailContent = '
		

    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Mailto</title>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
        <style type="text/css">
            html {
                -webkit-text-size-adjust: none;
                -ms-text-size-adjust: none;
            }

            @media only screen and (min-device-width: 750px) {
                .table750 {
                    width: 750px !important;
                }
            }

            @media only screen and (max-device-width: 750px),
            only screen and (max-width: 750px) {
                table[class="table750"] {
                    width: 100% !important;
                }

                .mob_b {
                    width: 93% !important;
                    max-width: 93% !important;
                    min-width: 93% !important;
                }

                .mob_b1 {
                    width: 100% !important;
                    max-width: 100% !important;
                    min-width: 100% !important;
                }

                .mob_left {
                    text-align: left !important;
                }

                .mob_soc {
                    width: 50% !important;
                    max-width: 50% !important;
                    min-width: 50% !important;
                }

                .mob_menu {
                    width: 50% !important;
                    max-width: 50% !important;
                    min-width: 50% !important;
                    box-shadow: inset -1px -1px 0 0 rgba(255, 255, 255, 0.2);
                }

                .mob_center {
                    text-align: center !important;
                }

                .top_pad {
                    height: 15px !important;
                    max-height: 15px !important;
                    min-height: 15px !important;
                }

                .mob_pad {
                    width: 15px !important;
                    max-width: 15px !important;
                    min-width: 15px !important;
                }

                .mob_div {
                    display: block !important;
                }
            }

            @media only screen and (max-device-width: 550px),
            only screen and (max-width: 550px) {
                .mod_div {
                    display: block !important;
                }
            }

            .table750 {
                width: 750px;
            }
        </style>
    </head>

    <body style="margin: 0; padding: 0;">

        <table cellpadding="0" cellspacing="0" border="0" width="100%"
            style="background: #191D21; min-width: 350px; font-size: 1px; line-height: normal;">
            <tr>
                <td align="center" valign="top">
                    <!--[if (gte mso 9)|(IE)]>
            <table border="0" cellspacing="0" cellpadding="0">
            <tr><td align="center" valign="top" width="750"><![endif]-->
                    <table cellpadding="0" cellspacing="0" border="0" width="750" class="table750"
                        style="width: 100%; max-width: 750px; min-width: 350px; background: #191D21;">
                        <tr>
                            <td class="mob_pad" width="25" style="width: 25px; max-width: 25px; min-width: 25px;">&nbsp;
                            </td>
                            <td align="center" valign="top" style="background: #191D21;">

                                <table cellpadding="0" cellspacing="0" border="0" width="100%"
                                    style="width: 100% !important; min-width: 100%; max-width: 100%; background: #191D21;">
                                    <tr>
                                        <td align="right" valign="top">
                                            <div class="top_pad" style="height: 25px; line-height: 25px; font-size: 23px;">
                                                &nbsp;</div>
                                        </td>
                                    </tr>
                                </table>

                                <table cellpadding="0" cellspacing="0" border="0" width="88%"
                                    style="width: 88% !important; min-width: 88%; max-width: 88%;">
                                    <tr>
                                        <td align="left" valign="top">
                                            <div style="height: 39px; line-height: 39px; font-size: 37px;">&nbsp;</div>
                                            <span href="#" target="_blank" style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif;
                                                color: #4458EB; display: block; font-size: 52px;">
                                                QuizzApp
                                            </span>
                                            <div style="height: 10px; line-height: 39px; font-size: 37px;">&nbsp;</div>
                                            <span href="#" target="_blank" style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif;
                                                color: rgb(207, 207, 207); display: block; font-size: 18px;">
                                                A Product of MicroVersion Technologies
                                            </span>
                                            <div style="height: 15px; line-height: 73px; font-size: 71px;">&nbsp;</div>
                                            <hr>
                                            <div style="height: 30px; line-height: 73px; font-size: 71px;">&nbsp;</div>

                                        </td>
                                    </tr>
                                </table>

                                <table cellpadding="0" cellspacing="0" border="0" width="88%"
                                    style="width: 88% !important; min-width: 88%; max-width: 88%;">
                                    <tr>
                                        <td align="left" valign="top">
                                            <font face="Source Sans Pro, sans-serif" color="#1a1a1a"
                                                style="font-size: 52px; line-height: 60px; font-weight: 300; ">
                                                <span
                                                    style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #FFFFFF; font-size: 42px; line-height: 60px; font-weight: 500; ">Greetings
                                                    ' . $student_name . ',</span>
                                            </font>
                                            <div style="height: 33px; line-height: 33px; font-size: 31px;">&nbsp;</div>
                                            <font face="Source Sans Pro, sans-serif" color="#585858"
                                                style="font-size: 24px; line-height: 32px;">
                                                <span
                                                    style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #FFFFFF; font-size: 24px; line-height: 32px; font-weight: 300; ">New Exam has been Scheduled on <span
                                                        style="color:#4458EB; font-weight: 1000; font-size: 28px;">QuizzApp</span>
                                                    by your College. Following are the details for the same.</span>
                                            </font>
                                            <div style="height: 20px; line-height: 20px; font-size: 18px;">&nbsp;</div>
                                            <font face="Source Sans Pro, sans-serif" color="#585858"
                                                style="font-size: 24px; line-height: 32px;">
                                                <span style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif;
                                                    color: #585858; font-size: 22px; line-height: 32px;">Exam
                                                    Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:-
                                                    ' . $exam_name . '</span>
                                            </font>
                                            <div style="height: 20px; line-height: 20px; font-size: 18px;">&nbsp;</div>
                                            <font face="Source Sans Pro, sans-serif" color="#585858"
                                                style="font-size: 24px; line-height: 32px;">
                                                <span style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif;
                                                    color: #585858; font-size: 22px; line-height: 32px;">Subject
                                                    Name&nbsp;&nbsp;&nbsp;:-
                                                    ' . $subject_name . '</span>
                                            </font>
                                            <div style="height: 20px; line-height: 20px; font-size: 18px;">&nbsp;</div>
                                            <font face="Source Sans Pro, sans-serif" color="#585858"
                                                style="font-size: 24px; line-height: 32px;">
                                                <span style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif;
                                                    color: #585858; font-size: 22px; line-height: 32px;">Exam Duration&nbsp;&nbsp;:-
                                                    ' . $exam_duration . '</span>
                                            </font>
                                            <div style="height: 33px; line-height: 33px; font-size: 31px;">&nbsp;</div>
                                            <table class="mob_btn" cellpadding="0" cellspacing="0" border="0"
                                                style="background: #4458EB; border-radius: 4px;">
                                                <tr>
                                                    <td align="center" valign="top">
                                                        <a href="https://msgbuddy.com/QuizzApp" target="_blank" style="display: block; border: 1px solid #4458EB; border-radius:
                                                            4px; padding: 12px 23px; font-family: Source Sans Pro, Arial,
                                                            Verdana, Tahoma, Geneva, sans-serif; color: #ffffff; font-size:
                                                            20px; line-height: 30px; text-decoration: none; white-space:
                                                            nowrap; font-weight: 600;">
                                                            <font face="Source Sans Pro, sans-serif" color="#ffffff"
                                                                style="font-size: 20px; line-height: 30px; text-decoration: none; white-space: nowrap; font-weight: 600;">
                                                                <span
                                                                    style="font-family: Source Sans Pro, Arial, Verdana, Tahoma, Geneva, sans-serif; color: #ffffff; font-size: 20px; line-height: 30px; text-decoration: none; white-space: nowrap; font-weight: 600;">Visit
                                                                    QuizzApp</span>
                                                            </font>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div style="height: 75px; line-height: 75px; font-size: 73px;">&nbsp;</div>
                                        </td>
                                    </tr>
                                </table>

                                <table cellpadding="0" cellspacing="0" border="0" width="90%"
                                    style="width: 90% !important; min-width: 90%; max-width: 90%; border-width: 1px; border-style: solid; border-color: #e8e8e8; border-bottom: none; border-left: none; border-right: none;">
                                    <tr>
                                        <td align="left" valign="top">
                                            <div style="height: 15px; line-height: 15px; font-size: 13px;">&nbsp;</div>
                                        </td>
                                    </tr>
                                </table>



                                <table cellpadding="0" cellspacing="0" border="0" width="100%"
                                    style="width: 100% !important; min-width: 100%; max-width: 100%; background: #191D21;">
                                    <tr>
                                        <td align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" border="0" width="88%"
                                                style="width: 88% !important; min-width: 88%; max-width: 88%;">
                                                <tr>
                                                    <td align="center" valign="top">
                                                        <font face="Source Sans Pro, sans-serif" color="#868686"
                                                            style="font-size: 17px; line-height: 20px;">
                                                            <span
                                                                style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #868686; font-size: 17px; line-height: 20px;">Copyright
                                                                &copy; 2020 QuizApp. | Designed & Developed by Akash
                                                                Mole</span>
                                                        </font>
                                                        <div style="height: 35px; line-height: 35px; font-size: 33px;">
                                                            &nbsp;</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top">
                                                        <font face="Source Sans Pro, sans-serif" color="#868686"
                                                            style="font-size: 17px; line-height: 20px;">
                                                            <span
                                                                style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #868686; font-size: 17px; line-height: 20px;">' . $date . '</span>
                                                        </font>
                                                        <div style="height: 35px; line-height: 35px; font-size: 33px;">
                                                            &nbsp;</div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                            <td class="mob_pad" width="25" style="width: 25px; max-width: 25px; min-width: 25px;">&nbsp;
                            </td>
                        </tr>
                    </table>
                    <!--[if (gte mso 9)|(IE)]>
            </td></tr>
            </table><![endif]-->
                </td>
            </tr>
        </table>
    </body>

    </html>


	';

    $mail->Body = $mailContent;
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent to '. $student_name .' @' . $date;
    }
}

function newLogin($greetings, $student_first_name, $student_email, $browser, $date, $sender_email, $sender_password    ){

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.stackmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $sender_email;
    $mail->Password = $sender_password;
    $mail->SMTPSecure = 'STARTTLS';
    $mail->Port = 587;
    $mail->setFrom($sender_email, "QuizzApp Notifications");
    $mail->addReplyTo($sender_email, "CRM @ QuizzApp");
    $mail->addAddress($student_email, $student_first_name . ' | QuizzApp Student');
    $mail->Subject = "New Login - QuizzApp | ".$date;
    $mail->isHTML(true);

    $mailContent = '
		

    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>QuizzApp</title>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
        <style type="text/css">
            html {
                -webkit-text-size-adjust: none;
                -ms-text-size-adjust: none;
            }

            @media only screen and (min-device-width: 750px) {
                .table750 {
                    width: 750px !important;
                }
            }

            @media only screen and (max-device-width: 750px),
            only screen and (max-width: 750px) {
                table[class="table750"] {
                    width: 100% !important;
                }

                .mob_b {
                    width: 93% !important;
                    max-width: 93% !important;
                    min-width: 93% !important;
                }

                .mob_b1 {
                    width: 100% !important;
                    max-width: 100% !important;
                    min-width: 100% !important;
                }

                .mob_left {
                    text-align: left !important;
                }

                .mob_soc {
                    width: 50% !important;
                    max-width: 50% !important;
                    min-width: 50% !important;
                }

                .mob_menu {
                    width: 50% !important;
                    max-width: 50% !important;
                    min-width: 50% !important;
                    box-shadow: inset -1px -1px 0 0 rgba(255, 255, 255, 0.2);
                }

                .mob_center {
                    text-align: center !important;
                }

                .top_pad {
                    height: 15px !important;
                    max-height: 15px !important;
                    min-height: 15px !important;
                }

                .mob_pad {
                    width: 15px !important;
                    max-width: 15px !important;
                    min-width: 15px !important;
                }

                .mob_div {
                    display: block !important;
                }
            }

            @media only screen and (max-device-width: 550px),
            only screen and (max-width: 550px) {
                .mod_div {
                    display: block !important;
                }
            }

            .table750 {
                width: 750px;
            }
        </style>
    </head>

    <body style="margin: 0; padding: 0;">

        <table cellpadding="0" cellspacing="0" border="0" width="100%"
            style="background: #191D21; min-width: 350px; font-size: 1px; line-height: normal;">
            <tr>
                <td align="center" valign="top">
                    <!--[if (gte mso 9)|(IE)]>
            <table border="0" cellspacing="0" cellpadding="0">
            <tr><td align="center" valign="top" width="750"><![endif]-->
                    <table cellpadding="0" cellspacing="0" border="0" width="750" class="table750"
                        style="width: 100%; max-width: 750px; min-width: 350px; background: #191D21;">
                        <tr>
                            <td class="mob_pad" width="25" style="width: 25px; max-width: 25px; min-width: 25px;">&nbsp;
                            </td>
                            <td align="center" valign="top" style="background: #191D21;">

                                <table cellpadding="0" cellspacing="0" border="0" width="100%"
                                    style="width: 100% !important; min-width: 100%; max-width: 100%; background: #191D21;">
                                    <tr>
                                        <td align="right" valign="top">
                                            <div class="top_pad" style="height: 25px; line-height: 25px; font-size: 23px;">
                                                &nbsp;</div>
                                        </td>
                                    </tr>
                                </table>

                                <table cellpadding="0" cellspacing="0" border="0" width="88%"
                                    style="width: 88% !important; min-width: 88%; max-width: 88%;">
                                    <tr>
                                        <td align="left" valign="top">
                                            <div style="height: 39px; line-height: 39px; font-size: 37px;">&nbsp;</div>
                                            <span href="#" target="_blank" style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif;
                                                color: #4458EB; display: block; font-size: 52px;">
                                                QuizzApp
                                            </span>
                                            <div style="height: 10px; line-height: 39px; font-size: 37px;">&nbsp;</div>
                                            <span href="#" target="_blank" style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif;
                                                color: rgb(207, 207, 207); display: block; font-size: 18px;">
                                                A Product of MicroVersion Technologies
                                            </span>
                                            <div style="height: 15px; line-height: 73px; font-size: 71px;">&nbsp;</div>
                                            <hr>
                                            <div style="height: 30px; line-height: 73px; font-size: 71px;">&nbsp;</div>

                                        </td>
                                    </tr>
                                </table>

                                <table cellpadding="0" cellspacing="0" border="0" width="88%"
                                    style="width: 88% !important; min-width: 88%; max-width: 88%;">
                                    <tr>
                                        <td align="left" valign="top">
                                            <font face="Source Sans Pro, sans-serif" color="#1a1a1a"
                                                style="font-size: 52px; line-height: 60px; font-weight: 300; ">
                                                <span
                                                    style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #FFFFFF; font-size: 36px; line-height: 60px; font-weight: 500; ">'.$greetings.'
                                                    '.$student_first_name.',</span>
                                            </font>
                                            <div style="height: 33px; line-height: 33px; font-size: 31px;">&nbsp;</div>
                                            <font face="Source Sans Pro, sans-serif" color="#585858"
                                                style="font-size: 22px; line-height: 32px;">
                                                <span
                                                    style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #FFFFFF; font-size: 22px; line-height: 32px; font-weight: 300; ">New
                                                    Successful Login has been detected using your <span
                                                        style="color:#4458EB; font-weight: 1000; font-size: 28px;">QuizzApp</span>
                                                    credentials. Following are the details of the login.</span>
                                            </font>
                                            <div style="height: 20px; line-height: 20px; font-size: 18px;">&nbsp;</div>
                                            <font face="Source Sans Pro, sans-serif" color="#585858"
                                                style="font-size: 22px; line-height: 32px;">
                                                <span style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #FFFFFF; font-size: 20px; line-height: 32px;">Browser:- '.$browser.'</span>
                                            </font>
                                            <div style="height: 20px; line-height: 20px; font-size: 18px;">&nbsp;</div>
                                            <font face="Source Sans Pro, sans-serif" color="#585858"
                                                style="font-size: 22px; line-height: 32px;">
                                                <span style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #FFFFFF; font-size: 20px; line-height: 32px;">Date:- '.$date.'</span>
                                            </font>                                        
                                            <div style="height: 75px; line-height: 75px; font-size: 73px;">&nbsp;</div>
                                        </td>
                                    </tr>
                                </table>

                                <table cellpadding="0" cellspacing="0" border="0" width="90%"
                                    style="width: 90% !important; min-width: 90%; max-width: 90%; border-width: 1px; border-style: solid; border-color: #e8e8e8; border-bottom: none; border-left: none; border-right: none;">
                                    <tr>
                                        <td align="left" valign="top">
                                            <div style="height: 15px; line-height: 15px; font-size: 13px;">&nbsp;</div>
                                        </td>
                                    </tr>
                                </table>



                                <table cellpadding="0" cellspacing="0" border="0" width="100%"
                                    style="width: 100% !important; min-width: 100%; max-width: 100%; background: #191D21;">
                                    <tr>
                                        <td align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" border="0" width="88%"
                                                style="width: 88% !important; min-width: 88%; max-width: 88%;">
                                                <tr>
                                                    <td align="center" valign="top">
                                                        <font face="Source Sans Pro, sans-serif" color="#868686"
                                                            style="font-size: 17px; line-height: 20px;">
                                                            <span
                                                                style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #868686; font-size: 17px; line-height: 20px;">Copyright
                                                                &copy; 2020 QuizApp. | Designed & Developed by Akash
                                                                Mole</span>
                                                        </font>
                                                        <div style="height: 35px; line-height: 35px; font-size: 33px;">
                                                            &nbsp;</div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                            <td class="mob_pad" width="25" style="width: 25px; max-width: 25px; min-width: 25px;">&nbsp;
                            </td>
                        </tr>
                    </table>
                    <!--[if (gte mso 9)|(IE)]>
            </td></tr>
            </table><![endif]-->
                </td>
            </tr>
        </table>
    </body>

    </html>


	';

    $mail->Body = $mailContent;
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {

    }


}


function newAccount($greetings, $fname, $email, $username, $password, $sender_email, $sender_password){

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.stackmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $sender_email;
    $mail->Password = $sender_password;
    $mail->SMTPSecure = 'STARTTLS';
    $mail->Port = 587;
    $mail->setFrom($sender_email, "QuizzApp Registration");
    $mail->addReplyTo($sender_email, "CRM @ QuizzApp");
    $mail->addAddress($email, $fname . ' | QuizzApp Registration');
    $mail->Subject = "Welcome to QuizzApp by Microversion Technologies";
    $mail->isHTML(true);

    $mailContent = '
		

    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>QuizzApp</title>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
        <style type="text/css">
            html {
                -webkit-text-size-adjust: none;
                -ms-text-size-adjust: none;
            }

            @media only screen and (min-device-width: 750px) {
                .table750 {
                    width: 750px !important;
                }
            }

            @media only screen and (max-device-width: 750px),
            only screen and (max-width: 750px) {
                table[class="table750"] {
                    width: 100% !important;
                }

                .mob_b {
                    width: 93% !important;
                    max-width: 93% !important;
                    min-width: 93% !important;
                }

                .mob_b1 {
                    width: 100% !important;
                    max-width: 100% !important;
                    min-width: 100% !important;
                }

                .mob_left {
                    text-align: left !important;
                }

                .mob_soc {
                    width: 50% !important;
                    max-width: 50% !important;
                    min-width: 50% !important;
                }

                .mob_menu {
                    width: 50% !important;
                    max-width: 50% !important;
                    min-width: 50% !important;
                    box-shadow: inset -1px -1px 0 0 rgba(255, 255, 255, 0.2);
                }

                .mob_center {
                    text-align: center !important;
                }

                .top_pad {
                    height: 15px !important;
                    max-height: 15px !important;
                    min-height: 15px !important;
                }

                .mob_pad {
                    width: 15px !important;
                    max-width: 15px !important;
                    min-width: 15px !important;
                }

                .mob_div {
                    display: block !important;
                }
            }

            @media only screen and (max-device-width: 550px),
            only screen and (max-width: 550px) {
                .mod_div {
                    display: block !important;
                }
            }

            .table750 {
                width: 750px;
            }
        </style>
    </head>

    <body style="margin: 0; padding: 0;">

        <table cellpadding="0" cellspacing="0" border="0" width="100%"
            style="background: #191D21; min-width: 350px; font-size: 1px; line-height: normal;">
            <tr>
                <td align="center" valign="top">
                    <!--[if (gte mso 9)|(IE)]>
            <table border="0" cellspacing="0" cellpadding="0">
            <tr><td align="center" valign="top" width="750"><![endif]-->
                    <table cellpadding="0" cellspacing="0" border="0" width="750" class="table750"
                        style="width: 100%; max-width: 750px; min-width: 350px; background: #191D21;">
                        <tr>
                            <td class="mob_pad" width="25" style="width: 25px; max-width: 25px; min-width: 25px;">&nbsp;
                            </td>
                            <td align="center" valign="top" style="background: #191D21;">

                                <table cellpadding="0" cellspacing="0" border="0" width="100%"
                                    style="width: 100% !important; min-width: 100%; max-width: 100%; background: #191D21;">
                                    <tr>
                                        <td align="right" valign="top">
                                            <div class="top_pad" style="height: 25px; line-height: 25px; font-size: 23px;">
                                                &nbsp;</div>
                                        </td>
                                    </tr>
                                </table>

                                <table cellpadding="0" cellspacing="0" border="0" width="88%"
                                    style="width: 88% !important; min-width: 88%; max-width: 88%;">
                                    <tr>
                                        <td align="left" valign="top">
                                            <div style="height: 39px; line-height: 39px; font-size: 37px;">&nbsp;</div>
                                            <span href="#" target="_blank" style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif;
                                                color: #4458EB; display: block; font-size: 52px;">
                                                QuizzApp
                                            </span>
                                            <div style="height: 10px; line-height: 39px; font-size: 37px;">&nbsp;</div>
                                            <span href="#" target="_blank" style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif;
                                                color: rgb(207, 207, 207); display: block; font-size: 18px;">
                                                A Product of MicroVersion Technologies
                                            </span>
                                            <div style="height: 15px; line-height: 73px; font-size: 71px;">&nbsp;</div>
                                            <hr>
                                            <div style="height: 30px; line-height: 73px; font-size: 71px;">&nbsp;</div>

                                        </td>
                                    </tr>
                                </table>

                                <table cellpadding="0" cellspacing="0" border="0" width="88%"
                                    style="width: 88% !important; min-width: 88%; max-width: 88%;">
                                    <tr>
                                        <td align="left" valign="top">
                                            <font face="Source Sans Pro, sans-serif" color="#1a1a1a"
                                                style="font-size: 52px; line-height: 60px; font-weight: 300; ">
                                                <span
                                                    style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #FFFFFF; font-size: 36px; line-height: 60px; font-weight: 500; ">'.$greetings.'
                                                    '.$fname.',</span>
                                            </font>
                                            <div style="height: 33px; line-height: 33px; font-size: 31px;">&nbsp;</div>
                                            <font face="Source Sans Pro, sans-serif" color="#585858"
                                                style="font-size: 22px; line-height: 32px;">
                                                <span
                                                    style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #FFFFFF; font-size: 22px; line-height: 32px; font-weight: 300; ">New
                                                    Account Successfully created using your credentials. Following are the details of the Registration.</span>
                                            </font>
                                            <div style="height: 20px; line-height: 20px; font-size: 18px;">&nbsp;</div>
                                            <font face="Source Sans Pro, sans-serif" color="#585858"
                                                style="font-size: 22px; line-height: 32px;">
                                                <span style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #FFFFFF; font-size: 20px; line-height: 32px;">Username:- '.$username.'</span>
                                            </font>
                                            <div style="height: 20px; line-height: 20px; font-size: 18px;">&nbsp;</div>
                                            <font face="Source Sans Pro, sans-serif" color="#585858"
                                                style="font-size: 22px; line-height: 32px;">
                                                <span style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #FFFFFF; font-size: 20px; line-height: 32px;">Password:- '.$password.'</span>
                                            </font>                                        
                                            <div style="height: 75px; line-height: 75px; font-size: 73px;">&nbsp;</div>
                                        </td>
                                    </tr>
                                </table>

                                <table cellpadding="0" cellspacing="0" border="0" width="90%"
                                    style="width: 90% !important; min-width: 90%; max-width: 90%; border-width: 1px; border-style: solid; border-color: #e8e8e8; border-bottom: none; border-left: none; border-right: none;">
                                    <tr>
                                        <td align="left" valign="top">
                                            <div style="height: 15px; line-height: 15px; font-size: 13px;">&nbsp;</div>
                                        </td>
                                    </tr>
                                </table>



                                <table cellpadding="0" cellspacing="0" border="0" width="100%"
                                    style="width: 100% !important; min-width: 100%; max-width: 100%; background: #191D21;">
                                    <tr>
                                        <td align="center" valign="top">
                                            <table cellpadding="0" cellspacing="0" border="0" width="88%"
                                                style="width: 88% !important; min-width: 88%; max-width: 88%;">
                                                <tr>
                                                    <td align="center" valign="top">
                                                        <font face="Source Sans Pro, sans-serif" color="#868686"
                                                            style="font-size: 17px; line-height: 20px;">
                                                            <span
                                                                style="font-family: Source Sans Pro, Arial, Tahoma, Geneva, sans-serif; color: #868686; font-size: 17px; line-height: 20px;">Copyright
                                                                &copy; 2020 QuizApp. | Designed & Developed by Akash
                                                                Mole</span>
                                                        </font>
                                                        <div style="height: 35px; line-height: 35px; font-size: 33px;">
                                                            &nbsp;</div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                            <td class="mob_pad" width="25" style="width: 25px; max-width: 25px; min-width: 25px;">&nbsp;
                            </td>
                        </tr>
                    </table>
                    <!--[if (gte mso 9)|(IE)]>
            </td></tr>
            </table><![endif]-->
                </td>
            </tr>
        </table>
    </body>

    </html>


	';

    $mail->Body = $mailContent;
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        
    }


}
