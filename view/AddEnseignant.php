<?php
include_once '../Controller/enseignantC.php';
$enseignantC = new enseignantC();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userId'], $_POST['specialite'])) {
    $userId = $_POST['userId'];
    $specialite = $_POST['specialite'];

    try {
        $enseignantC->addenseignantDetails($userId, $specialite); // Assurez-vous que cette méthode est bien définie pour ajouter les détails d'un élève
        header('Location:listenseignants.php');
        exit();
    } catch (Exception $e) {
        echo "Erreur: " . $e->getMessage();
    }
} else {
    echo "Invalid Request";
}
?>
