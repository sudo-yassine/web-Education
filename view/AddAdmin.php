<?php
include '../Controller/adminC.php';

// Créer une instance de la classe adminC
$adminC = new adminC();

// Vérifier si les données POST sont présentes
if(isset($_POST['niveau'], $_POST['nom'], $_POST['prenom'], $_POST['pass'])) {
    // Créer une nouvelle instance de la classe admin avec les données POST
    $admin = new admin(
        null,
        $_POST['niveau'],
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['pass']
    );
    

    
    // Ajouter l'administrateur
    $success = $adminC->addAdmin($admin);
    
    if($success) {
        // Rediriger vers la liste des administrateurs si l'ajout est réussi
        header('Location: listAdmins.php');
        exit(); // Assure que le script s'arrête ici pour éviter toute exécution supplémentaire
    } else {
        // Afficher un message d'erreur si l'ajout a échoué
        echo "Une erreur s'est produite lors de l'ajout de l'administrateur. Veuillez réessayer.";
    }
} else {
    // Gérer le cas où des données POST sont manquantes
    echo "Données POST manquantes.";
}
?>
