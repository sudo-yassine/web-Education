<?php
include '../Controller/RecrutC_A.php';
$RecrutC = new RecrutC();
$RecrutC->DeleteRecrut($_GET['id_recrutement']);
header('Location:ListRecrut.php');
