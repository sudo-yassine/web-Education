<?php
include '../Controller/ratingC.php';
$ratingC = new ratingC();
$ratingC->Deleterating($_GET['id_rating']);
header('Location:Listrating.php');
