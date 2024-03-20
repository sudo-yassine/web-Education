<?php
include '../Controller/RecrutC.php';
$RecrutC = new RecrutC();

$error = "";

$Recrut = null;
if (
    isset($_POST["date_entretien"]) &&
    isset($_POST["statu"]) &&
    isset($_POST["cv"]) &&
    isset($_POST['reponse'])
) {
    if (
        !empty($_POST['date_entretien']) &&
        !empty($_POST["statu"]) &&
        !empty($_POST["cv"]) &&
        !empty($_POST["reponse"]) 
    ) {
        $RecrutC = new Recrut(
            null,
            $_POST['date_entretien'],
            $_POST['statu'],
            $_POST['cv'],
            $_POST['reponse']      
        );
        $RecrutC->addRecrut($Recrut);
        header('Location:ListRecrut.php');
    } else
        $error = "Missing information";
}