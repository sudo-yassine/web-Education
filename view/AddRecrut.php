<?php
include '../controller/RecrutC.php';
$RecrutC = new RecrutC();

$error = "";

//$recrut = null;


$Recrut = new Recrut(
    null,
    $_POST['date_entretien'],
    null,
    $_POST['cv'],
    null,
    $_POST['reponse'],
    null
);
$RecrutC->AddRecrut($Recrut);
header('Location:ListRecrut.php');
    