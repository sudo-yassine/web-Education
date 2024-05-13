<?php
include_once '../controller/ressourcesC.php';
$ressourcesC = new ressourcesC();
$ressourcesC->deleteressources($_GET['id_ressources']);
header('Location:ressourcesdash.php');