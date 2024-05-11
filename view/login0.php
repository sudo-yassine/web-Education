<?php
// Activation de l'affichage des erreurs pour le développement (à enlever en production)
ini_set('display_errors', 1);
error_reporting(E_ALL);
ob_start();

include_once '../config.php'; // Assurez-vous que le chemin est correct
include_once '../controller/eleveC.php';

session_start();

// Vérification si les données POST sont présentes
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['pswd']) ? $_POST['pswd'] : '';

    // Création de l'objet eleveC
    $eleveC = new eleveC();
    $login = $eleveC->checkLogin($email, $password);

    // Vérification des identifiants et redirection si valide
    if ($login) {
        $_SESSION['user_id'] = $login['Id_utilisateur'];
        echo "Authentification réussie, redirection en cours...";
        header("Location: espace_eleve.php");
        exit;
    } else {
        echo "Identifiants incorrects";
    }
     
} else {
    // Pas de données POST, retourner à la page de connexion ou afficher un message
    echo "Aucune donnée reçue";
}

// Fonction pour nettoyer les entrées utilisateur
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
ob_end_flush();

?>
