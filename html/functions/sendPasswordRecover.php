<?php

require 'functions.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$userMail = $_POST['email'];
$errors = [];

$pdo = connectDB();
$queryPrepared = $pdo->prepare("SELECT id from utrackpa_users WHERE email=:email");
    
$queryPrepared->execute(["email"=>$userMail]);
        
if(empty($queryPrepared->fetch())){
    $errors[] = "There is no account signed up with this email";
}

if (count($errors) != 0) {

    unset($_POST['email']);

    $_SESSION['errors'] = $errors;
    header("Location: ../LR_SESSIONS/forgetpassword.php");

} else {

function sendPasswordRecover($to, &$errors)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp-mail.outlook.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'utrackoff@outlook.fr';
            $mail->Password = "Lamartine0";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('utrackoff@outlook.fr', 'Utrack');
            $mail->addAddress($to);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Recover';
            $mail->Body = 'Here is the link to recover your password.<br>
            <a href="http://utrack.website/functions/passwordRecover.php?mail=' . $_POST['email'] . '">
                Utrack password recover
            </a>';

            $mail->send();
        } catch (Exception $e) {
            $errors[] = 'Failed to send email, please try again.';
            header("Location: ../LR_SESSIONS/forgetpassword.php");
            $_SESSION['errors'] = $errors;
        }
    }

    /*============================================================*/

    sendPasswordRecover($userMail, $errors);
    $confirm = [];
    $confirm[] = "Recover mail has been sent successfully !";
    $_SESSION['confirm'] = $confirm;
    header("Location: ../LR_SESSIONS/forgetpassword.php");

    }

?>