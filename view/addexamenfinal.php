<?php
include '../Controller/examenfinalC.php';
$examenfinalC = new examenfinalC();
$error = "";
//$examenfinal = null;
if (
    isset($_POST["id_cours"]) &&
     isset($_POST["titre"]) &&
     isset($_POST["description"]) &&
     isset($_POST['duree']) &&
     isset($_POST['difficulte'])
) {
    if (
        !empty($_POST['id_cours']) &&
         !empty($_POST["titre"]) &&
         !empty($_POST["description"]) &&
         !empty($_POST["duree"])&&
         !empty($_POST["difficulte"]) 
    ) {
        $examenfinal = new examenfinal(
            null,
            $_POST['id_cours'],
            $_POST['titre'],
            $_POST['description'],
            $_POST['duree'],
            null,
            $_POST['difficulte']

        );
        $examenfinalC->addexamenfinal($examenfinal);
        header('Location:listexamenfinal.php');
    } else
        $error = "Missing information";
}


?>