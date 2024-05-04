<?php
include '../Controller/adminC.php';

$adminC = new adminC();

// Vérifier si les données POST sont présentes ou si elles viennent de Facebook (AJAX)
if(isset($_POST['niveau']) && (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pass']) && isset($_POST['Email'])) || isset($_POST['facebookData'])) {
    if(isset($_POST['facebookData'])) {
        // Traiter les données venant de Facebook
        $data = json_decode($_POST['facebookData']);
        $admin = new admin(null, 'niveau_par_defaut', $data->nom, $data->prenom, 'mot_de_passe_par_defaut', $data->Email);
    } else {
        // Créer une nouvelle instance de la classe admin avec les données POST classiques
        $admin = new admin(null, $_POST['niveau'], $_POST['nom'], $_POST['prenom'], $_POST['pass'], $_POST['Email']);
    }
    
    $success = $adminC->addAdmin($admin);

    if($success) {
        header('Location: listAdmins.php');
        exit();
    } else {
        echo "Une erreur s'est produite lors de l'ajout de l'administrateur. Veuillez réessayer.";
    }
} else {
    echo "Données POST manquantes.";
}
?>
