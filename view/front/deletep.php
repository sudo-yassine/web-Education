<?php 
include "C:/xampp/htdocs/projets/controllers/panierC.php";
$panierC = new panierC();
$panierC->deletepaniercop($_GET["id"]);
header('Location:addcommande.php');
?>