<?php
include '../Controller/reclamationC.php';
$reclamationC = new reclamationC();
$reclamationC->Deletereclamation($_GET['id_reclamation']);
header('Location:Listreclamation.php');
