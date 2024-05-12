<?php
include '../Controller/adminC.php';
//include '../config.php'; // Assurez-vous que ceci inclut les configurations pour PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$adminC = new adminC();

if(isset($_POST['niveau']) && (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pass']) && isset($_POST['email'])) || isset($_POST['facebookData'])) {
    if(isset($_POST['facebookData'])) {
        // Traiter les données venant de Facebook
        $data = json_decode($_POST['facebookData']);
        $admin = new admin(null, $date->niveau, $data->nom, $data->prenom, 'mot_de_passe_par_defaut', $data->Email);
    } else {
        // Créer une nouvelle instance de la classe admin avec les données POST classiques
        $admin = new admin(null, $_POST['niveau'], $_POST['nom'], $_POST['prenom'], $_POST['pass'], $_POST['email']);
    }
    
    $success = $adminC->addAdmin($admin);

    if($success) {
        // Envoyer l'email de confirmation
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'nadahsayri99@gmail.com';
            $mail->Password = 'ekbp ynqu ehor gkfn';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            $mail->setFrom('nadahsayri99@gmail.com', 'Wisdom Wave');
            $mail->addAddress($_POST['email']);  // Utiliser l'adresse e-mail de l'admin ajouté

            $mail->isHTML(true);
            $mail->Subject = 'Confirmation de creation de compte';
            $mail->Body = "Bonjour {$_POST['prenom']},<br><br>Votre compte administrateur a ete cree avec succes.<br>Cordialement,<br>L'equipe de Wisdom Wave";

            $mail->send();
        } catch (Exception $e) {
            echo "Erreur d'envoi de l'e-mail : {$mail->ErrorInfo}";
        }
        
        header('Location: listAdmins.php');
        exit();
    } else {
        echo "Une erreur s'est produite lors de l'ajout de l'administrateur. Veuillez réessayer.";
    }
} else {
    echo "Données POST manquantes.";
}
?>