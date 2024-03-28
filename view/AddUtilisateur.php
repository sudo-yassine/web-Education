<?php
include '../Controller/utilisateurC.php';
$utilisateurC = new utilisateurC();

$error = "";

// create student

     $Utilisateur = new Utilisateur(
     null,
     $_POST['Nom'],
     $_POST['Prenom'],
     $_POST['Adresse'],
     $_POST['Tel'],
     $_POST['Password']
     );
    $utilisateurC->addUtilisateur($Utilisateur);
    header('Location:ListUtilisateurs.php');