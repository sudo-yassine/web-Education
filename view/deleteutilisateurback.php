<?php
include '../Controller/utilisateurC.php';
$Utilisateur = new utilisateurC();
$Utilisateur->deleteutilisateur($_GET['Id_utilisateur']);
header('Location:utilisateurdash.php');
?>