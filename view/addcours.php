<?php
include '../Controller/coursC.php';
$coursC = new coursC();
$error = "";
$cours = null;

if (
    isset($_POST["nom_cours"]) &&
    isset($_POST["heures"]) &&
    isset($_POST["niveau"]) &&
    isset($_POST["contenu"]) &&
    isset($_POST["matiere"]) 
) {
    if (
        !empty($_POST['nom_cours']) &&
        !empty($_POST["heures"]) &&
        !empty($_POST["niveau"]) &&
        !empty($_POST["contenu"]) &&
        !empty($_POST["matiere"]) 
    ) {
        
            $cours = new cours(
                null,
                $_POST['nom_cours'],
                $_POST['heures'],
                $_POST['niveau'],
                $_POST['contenu'],
                $_POST['matiere'] 
            );
            $coursC->addcours($cours);
            header('Location:listcours.php');
    }
}
?>
