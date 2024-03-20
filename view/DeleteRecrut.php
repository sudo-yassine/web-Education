<?php
include '../Controller/RecrutC.php';
$RecrutC = new RecrutC();
$RecrutC->deleteRecrut($_GET['id_recrutement']);
header('Location:ListRecrut.php');
