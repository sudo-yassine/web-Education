<?php
include_once '../Controller/ressourcesC.php';
$ressourcesC = new ressourcesC();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['description_ressources'], $_FILES['livre'], $_POST['playlist_ytb'], $_POST['id_examen'])) {
        // Vérifier si aucun fichier n'a été téléchargé
        if ($_FILES['livre']['error'] === UPLOAD_ERR_OK) {
            // Générer un nom de fichier unique pour l'image
            $extension = pathinfo($_FILES['livre']['name'], PATHINFO_EXTENSION);
            $newFileName = uniqid() . '.' . $extension;
            
            // Chemin où l'image sera enregistrée dans le même répertoire que le script PHP
            $uploadDirectory = dirname(__FILE__) . '/uploads/';
            $targetFilePath = $uploadDirectory . $newFileName;
            
            // Déplacer l'image téléchargée vers le dossier spécifié avec le nouveau nom de fichier
            if (move_uploaded_file($_FILES['livre']['tmp_name'], $targetFilePath)) {
                $ressources = new ressources(
                    null,
                    $_POST['description_ressources'],
                    $newFileName, // Enregistrer le nouveau nom de fichier dans la base de données
                    $_POST['playlist_ytb'],
                    $_POST['id_examen']
                );

                $ressourcesC->addressources($ressources);
                header('Location:ressourcesdash.php');
                exit();
            } else {
                $error = "Une erreur s'est produite lors du téléchargement de l'image.";
            }
        } else {
            $error = "Veuillez sélectionner une image.";
        }
    } else {
        $error = "Tous les champs requis ne sont pas remplis.";
    }
}






?>
