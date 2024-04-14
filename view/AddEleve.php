<?php
include '../Controller/utilisateurC.php';
include '../Controller/eleveC.php';
$utilisateurC = new utilisateurC();
$eleveC = new eleveC();
$error = "";

// create student

    /*$Utilisateur = new Utilisateur(
     null,
     $_POST['Nom'],
     $_POST['Prenom'],
     $_POST['Adresse'],
     $_POST['Tel'],
     $_POST['Password']
     );
    $utilisateurC->addUtilisateur($Utilisateur);*/
    $eleve = new eleve(
        null,
        $_POST['Nom'],
        $_POST['Prenom'],
        $_POST['Adresse'],
        $_POST['Tel'],
        $_POST['Password'],
        NULL,
        $_POST['niveau']
    );
    $eleveC->addeleve($eleve);
    header('Location:listEleves.php');