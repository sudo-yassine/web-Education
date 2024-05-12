<?php
include '../Controller/eleveC.php';
$eleve = new eleveC();
$eleve->deleteeleve($_GET['Id_eleve']);
header('Location:elevedash.php');
?>