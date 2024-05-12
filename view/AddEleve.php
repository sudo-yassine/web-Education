<?php
include_once '../Controller/eleveC.php';
$eleveC = new eleveC();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userId'], $_POST['niveau'])) {
    $userId = $_POST['userId'];
    $niveau = $_POST['niveau'];

    try {
        $eleveC->addEleveDetails($userId, $niveau); // Assurez-vous que cette méthode est bien définie pour ajouter les détails d'un élève
        header('Location:elevedash.php');
        exit();
    } catch (Exception $e) {
        echo "Erreur: " . $e->getMessage();
    }
} else {
    echo "Invalid Request";
}
?>
