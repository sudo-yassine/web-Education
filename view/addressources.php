<?php
include_once '../Controller/ressourcesC.php';
$ressourcesC = new ressourcesC();
$error = "";



  

        $ressources = new ressources(
            null,
            $_POST['description_ressources'],
            $_POST['livre'],
            $_POST['playlist_ytb']      
        );
        $ressourcesC->addressources($ressources);
        header('Location:listressources.php');
       
  


?>