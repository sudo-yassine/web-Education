<?php
include '../controller/enseignantC.php';
$enseignant = new enseignantC();
$enseignant->Deleteenseignant($_GET['Id_enseignant']);
header('Location: listEnseignants.php');

?>