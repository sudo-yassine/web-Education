<?php
require_once 'C:\xampp\htdocs\admin\web-Education\View\PHPMailer\src\SMTP.php';
require_once 'C:\xampp\htdocs\admin\web-Education\View\PHPMailer\src\PHPMailer.php';
require_once 'C:\xampp\htdocs\admin\web-Education\View\PHPMailer\src\Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'], $_POST['name'], $_POST['password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Hash du mot de passe

    // Enregistrer ces données dans une base de données (non inclus ici)

    // Envoi d'un email de confirmation
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nadahsayri99@gmail.com';  // Votre adresse Gmail
        $mail->Password = 'dsei xpan kuhy iigh';    // Votre mot de passe Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('nadahsayri99@gmail.com', 'WisdomWave');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Bienvenue sur notre site !';
        $mail->Body = '<h1>Bienvenue ' . $name . ' !</h1><p>Merci de vous être inscrit.</p>';

        $mail->send();
        echo 'Inscription réussie, email de confirmation envoyé.';
    } catch (Exception $e) {
        echo 'Erreur lors de l\'envoi de l\'email: ' . $mail->ErrorInfo;
    }
} else {
    echo 'Données du formulaire manquantes.';
}
?>
