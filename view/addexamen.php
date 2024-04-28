<?php
include_once '../Controller/examenC.php';
$examenC = new examenC();
$error = "";
//$examen = null;
if (
    isset($_POST["id_ressources"]) &&
     isset($_POST["titre"]) &&
     isset($_POST["description"]) &&
     isset($_POST['duree']) &&
     isset($_POST['difficulte'])
) {
    if (
        !empty($_POST['id_ressources']) &&
         !empty($_POST["titre"]) &&
         !empty($_POST["description"]) &&
         !empty($_POST["duree"]) &&
         !empty($_POST["difficulte"])
    ) {
        $examen = new examen(
            null,
            $_POST['id_ressources'],
            $_POST['titre'],
            $_POST['description'],
            $_POST['duree'],
            $_POST['difficulte']   

        );
        $examenC->addexamen($examen);
        header('Location:listexamen.php');
    } else
        $error = "Missing information";
}


?>