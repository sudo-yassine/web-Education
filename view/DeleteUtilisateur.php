<?php
include '../Controller/utilisateurC.php';
$Utilisateur = new utilisateurC();
$Utilisateur->deleteutilisateur($_GET['Id_utilisateur']);
header('Location:listUtilisateurs.php');
?>