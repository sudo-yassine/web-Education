<?php
include '../Controller/examenfinalC.php';
$examenfinal = new examenfinalC();
$examenfinal->deleteexamenfinal($_GET['id_examenfinal']);
header('Location: listexamenfinal.php');

?>