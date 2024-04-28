<?php
include '../Controller/utilisateurC.php';
$Utilisateur = new utilisateurC();
$Utilisateur->deleteUtilisateur($_GET['Id_utilisateur']);
header('Location:listUtilisateurs.php');

?>