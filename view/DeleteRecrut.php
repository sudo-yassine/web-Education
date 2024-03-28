<?php
include '../Controller/RecrutC.php';
$RecrutC = new RecrutC();
$RecrutC->DeleteRecrut($_GET['id_recrutement']);
header('Location:ListRecrut.php');
