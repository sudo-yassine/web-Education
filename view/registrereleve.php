<?php
include_once 'config.php';
include_once 'eleve.php';
include_once 'eleveC.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $password = $_POST['password']; // Vous devriez envisager de hacher le mot de passe avant de le stocker
    $niveau = $_POST['niveau'];

    // Créer une instance d'élève
    $eleve = new Eleve(null, $nom, $prenom, $email, $tel, $password, 1, $niveau); // Ici, '1' pourrait représenter le rôle d'un élève

    // Créer une instance du contrôleur d'élève
    $eleveC = new eleveC();
    $eleveC->addeleve($eleve);

    // Rediriger l'utilisateur vers une page appropriée
    header("Location: index.html"); // Assurez-vous que cette page existe
    exit();
}
?>
