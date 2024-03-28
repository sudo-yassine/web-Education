<?php
include '../Controller/utilisateurC.php';
$Utilisateur = new utilisateurC();
$Utilisateur->deleteUtilisateur($_GET['id']);
header('Location:listUtilisateurs.php');

?>