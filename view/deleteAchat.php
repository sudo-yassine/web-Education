
<?php
include '../Controller/achatC.php';
$achatC = new achatC();
$achatC->delete_achat($_POST["id_achat"]);
header('Location:listAchat.php');

?>