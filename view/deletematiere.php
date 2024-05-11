<?php
include '../controller/matiereC.php';
$matiereC = new matiereC();
$matiereC->deletematiere($_GET['id_matiere']);
header('Location: listmatiere.php');
?>
