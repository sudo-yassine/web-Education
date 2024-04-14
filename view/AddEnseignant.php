<?php
include '../controller/enseignantC.php';
$enseignantC = new enseignantC();

$error = "";
if (
    isset($_POST['Nom']) && 
    isset($_POST['Prenom']) && 
    isset($_POST['Adresse']) && 
    isset($_POST['Tel']) && 
    isset($_POST['Password']) && 
    isset($_POST['specialite'])
) {
    $enseignant = new enseignant(
        null,
        $_POST['Nom'],
        $_POST['Prenom'],
        $_POST['Adresse'],
        $_POST['Tel'],
        $_POST['Password'],
        null, 
        $_POST['specialite']
    );
    
    $enseignantC->addEnseignant($enseignant);
    header('Location: listEnseignants.php');
} else {
    $error = "Tous les champs du formulaire doivent être remplis.";
}
?>
