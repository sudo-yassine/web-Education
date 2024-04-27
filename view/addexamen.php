<?php
include_once '../Controller/examenC.php';
$examenC = new examenC();
$error = "";
//$examen = null;
if (
    isset($_POST["id_ressources"]) &&
     isset($_POST["titre"]) &&
     isset($_POST["description"]) &&
     isset($_POST['duree'])
) {
    if (
        !empty($_POST['id_ressources']) &&
         !empty($_POST["titre"]) &&
         !empty($_POST["description"]) &&
         !empty($_POST["duree"]) 
    ) {
        $examen = new examen(
            null,
            $_POST['id_ressources'],
            $_POST['titre'],
            $_POST['description'],
            $_POST['duree']      
        );
        $examenC->addexamen($examen);
        header('Location:listexamen.php');
    } else
        $error = "Missing information";
}


?>