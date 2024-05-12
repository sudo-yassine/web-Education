<?php
include '../controller/reclamationC.php';
$reclamationC = new reclamationC();

$error = "";

$reclamation = null;


$reclamation = new reclamation( 
    NULL,
    $_POST["nom"],
    $_POST["prenom"],
    $_POST["email"],
    $_POST["telephone"],
    $_POST["typee"],
    $_POST["descp"]
    );
$reclamationC->Addreclamation($reclamation);
header('Location:Listreclamations.php');
    