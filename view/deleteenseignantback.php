<?php
include '../Controller/enseignantC.php';
$enseignant = new enseignantC();
$enseignant->deleteenseignant($_GET['Id_enseignant']);
header('Location:enseignantdash.php');
?>