<?php
include '../Controller/adminC.php';
$adminC = new adminC();

$error = "";

// create student

     $admin = new admin(
     null,
     $_POST['niveau'],
     $_POST['nom'],
     $_POST['prenom'],
     $_POST['pass'],
     $_POST['email'],

     );
    $adminC->addAdmin($admin);
    header('Location:admindash.php');
   ?>