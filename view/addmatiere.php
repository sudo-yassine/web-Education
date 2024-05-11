<?php
include '../Controller/matiereC.php'; // Include the controller for matiere
$matiereC = new matiereC(); // Create an instance of the matiere controller
$error = "";
$matiere = null;

if (
    isset($_POST["nom_matiere"]) &&
    isset($_POST["description"]) &&
    isset($_POST["resources"])
) {
    if (
        !empty($_POST['nom_matiere']) &&
        !empty($_POST["description"]) &&
        !empty($_POST["resources"])
    ) {
        $matiere = new matiere(
            null,
            $_POST['nom_matiere'],
            $_POST['description'],
            $_POST['resources']
        );
        $matiereC->addMatiere($matiere); // Call the method to add matiere from your controller
        header('Location: listmatiere.php'); // Redirect to the matiere list page
    }
}
?>