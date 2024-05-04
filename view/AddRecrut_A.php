<?php
include '../controller/RecrutC_A.php';
$RecrutC = new RecrutC();

$error = "";

//$recrut = null;


$Recrut = new Recrut(
    $_POST['id_recrutement'],
    $_POST['date_entretien'],
    $_POST['statu'],
    $_POST['cv'],
    NULL,
    $_POST['reponse'],
    $_POST['id_enseignant']
    
);
$RecrutC->AddRecrut($Recrut);
header('Location:ListRecrut.php');
    