
<?php
include '../Controller/reclamationC.php';
include '../view/index.php';

include '../config1.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\htdocs\PROJET WEB\web-Education\view\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\PROJET WEB\web-Education\view\PHPMailer\src\SMTP.php';
require 'C:\xampp\htdocs\PROJET WEB\web-Education\view\PHPMailer\src\Exception.php';

if (isset($_POST["mail"])) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ahmed.bouhlel.2003@gmail.com';
    $mail->Password = 'ezen tdzh wdao sivz';
    //$mail->SMTPSecure = 'tls';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
    $mail->setFrom('ahmed.bouhlel.2003@gmail.com');
  //$mail->addAddress('');
  $email_p = ($_POST['mail']);
  $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "Conditature";
    $mail->Body = 'Bonjour Mr/Mme,<br><br>' . $_POST["nom"] .'<br>Cordialement,<br>L\'équipe de WisdomWave';
    
    // Send the email
    $mail->send();
}
?>