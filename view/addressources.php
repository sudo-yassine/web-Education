<?php
include_once '../Controller/ressourcesC.php';
$ressourcesC = new ressourcesC();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['description_ressources'], $_POST['livre'], $_POST['playlist_ytb'], $_POST['id_examen'])) {
        $ressources = new ressources(
            null,
            $_POST['description_ressources'],
            $_POST['livre'],
            $_POST['playlist_ytb'],
            $_POST['id_examen']
        );

        $ressourcesC->addressources($ressources);
        header('Location:listressources.php');
        exit();
    } else {
        $error = "Tous les champs requis ne sont pas remplis.";
    }
}
?>
