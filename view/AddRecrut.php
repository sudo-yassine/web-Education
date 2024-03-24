<?php
include '../controller/RecrutC.php';
$recrutC = new recrutC();

$error = "";

$recrut = null;


if (
    isset($_POST["a"]) &&
    isset($_POST["b"]) &&
    isset($_POST["c"]) &&
    isset($_POST["d"]) &&
    isset($_POST['e'])
    // isset($_POST['id_enseignant'])
) 
{
    if (
        !empty($_POST['date_entretien']) &&
        !empty($_POST["statu"]) &&
        !empty($_POST["cv"]) &&
        !empty($_POST["nb_question"]) &&
        !empty($_POST["reponse"]) 
        // !empty($_POST['id_enseignant']) 
    ) 
    {
        $recrut = new recrut(
            null,
            $_POST['a'],
            $_POST['b'],
            $_POST['c'],
            $_POST['d'],
            $_POST['e'] ,
            null
            // $_POST['id_enseignant']     
        );
        $recrutC->addrecrut($recrut);
        header('Location:ListRecrut.php');
    } else
        $error = "Missing information";
}