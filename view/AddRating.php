<?php
include '../controller/ratingC.php';
$ratingC = new ratingC();

$error = "";

$rating = null;


$rating = new rating( 
    NULL,
    $_POST["star"],
    $_POST["comment"]
    );
$ratingC->Addrating($rating);
header('Location:Listrating.php');
    