<?php
include '../controller/examenC.php';
$examenC = new examenC();
$examenC->deleteexamen($_GET['id_examen']);
header('Location:listexamen.php');