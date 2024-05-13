<?php
include_once '../Controller/examenC.php';
$examenC = new examenC();
$error = "";

if (
    isset($_POST["titre"]) &&
    isset($_POST["description"]) &&
    isset($_POST['duree']) &&
    isset($_POST['difficulte'])
) {
    if (
        !empty($_POST["titre"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["duree"]) &&
        !empty($_POST["difficulte"])
    ) {
        // Obtention de la date et de l'heure actuelles
        $date_heure = date('Y-m-d H:i:s');
        
        $examen = new examen(
            null,
            $_POST['titre'],
            $_POST['description'],
            $_POST['duree'],
            $_POST['difficulte'],
            $date_heure // Utilisation de la date et de l'heure actuelles
        );
        $examenC->addexamen($examen);
        header('Location:examendash.php');
    } else {
        $error = "Missing information";
    }
}
?>
