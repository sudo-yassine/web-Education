<?php
include '../controller/coursC.php';
$coursC = new coursC();
$coursC->deletecours($_GET['id_cours']);
header('Location:coursdash.php');