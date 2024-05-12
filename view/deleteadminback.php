<?php
include '../Controller/adminC.php';

// Vérifier si l'ID est passé en paramètre GET
if(isset($_GET['Id_admin'])) {
    // Créer une instance de la classe adminC
    $admin = new adminC();
    
    // Supprimer l'administrateur avec l'ID spécifié
    $admin->deleteAdmin($_GET['Id_admin']);
    
    // Redirection vers la page de liste des administrateurs
    header('Location: admindash.php');
} else {
    // Gérer le cas où l'ID n'est pas spécifié
    echo "ID d'administrateur non spécifié.";
}
?>
