<?php
include '../Controller/examenC.php';
$examenC = new examenC();
$error = "";
$examen = null;
if (
    isset($_POST["id_cours"]) 
    // &&
    // isset($_POST["titre"]) &&
    // isset($_POST["description"]) &&
    // isset($_POST['date_limite'])
) {
    if (
        !empty($_POST['id_cours']) 
        // &&
        // !empty($_POST["titre"]) &&
        // !empty($_POST["description"]) &&
        // !empty($_POST["date_limite"]) 
    ) {
        $examen = new examen(
            null,
            $_POST['id_cours'],
            null,
            null
            // $_POST['titre'],
            // $_POST['description'],
            // $_POST['date_limite']      
        );
        $examenC->addexamen($examen);
        header('Location:listexamen.php');
    } else
        $error = "Missing information";
}


?>