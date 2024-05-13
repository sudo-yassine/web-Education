<?php
include_once '../controller/examenC.php';
$examenC = new examenC();
$examenC->deleteexamen($_GET['id_examen']);
header('Location:examendash.php');