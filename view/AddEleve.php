<?php
include '../Controller/eleveC.php';
$eleveC = new eleveC();

$error = "";

// Vérifiez d'abord si les clés existent dans $_POST avant de les utiliser
if (
    isset($_POST['Nom']) && 
    isset($_POST['Prenom']) && 
    isset($_POST['Adresse']) && 
    isset($_POST['Tel']) && 
    isset($_POST['Password']) && 
    isset($_POST['niveau'])
) {
    // Créer un objet eleve uniquement si toutes les clés sont définies
    $eleve = new eleve(
        null,
        $_POST['Nom'],
        $_POST['Prenom'],
        $_POST['Adresse'],
        $_POST['Tel'],
        $_POST['Password'],
        null, // Id_eleve est NULL car c'est une nouvelle insertion
        $_POST['niveau']
    );
    
    $eleveC->addeleve($eleve);
    
    // Redirigez après l'ajout de l'élève
    header('Location: listEleves.php');
} else {
    // Gérer le cas où les clés ne sont pas définies dans $_POST
    $error = "Tous les champs du formulaire doivent être remplis.";
}
?>
