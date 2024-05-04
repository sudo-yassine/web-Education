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
        !empty($_POST["matiere"]) // Check if matiere is not empty
    ) {
        // Verify if the matiere exists in the matiere table
        $matiereId = $_POST['matiere'];
        $matiereExists = $coursC->verifyMatiereExists($matiereId);
        
        if ($matiereExists) {
            // Create a new cours object with matiere attribute
            $cours = new cours(
                null,
                $_POST['nom_cours'],
                $_POST['heures'],
                $_POST['niveau'],
                $_POST['contenu'],
                $_POST['matiere'] // Add matiere to the constructor
            );
            $coursC->addcours($cours);
            header('Location:listcours.php');
        } else {
            $error = "Matiere does not exist";
        }
    } else {
        $error = "Missing information";
    }
}
?>
