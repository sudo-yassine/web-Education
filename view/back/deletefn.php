<?php 
include "C:/xampp/htdocs/projets/controllers/commandeC.php";
$commandeC = new commandeC();
$commandeC->deletecommande($_GET["id_C"]);
header('Location:back.php');
