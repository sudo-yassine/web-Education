<?php
// Inclure le contrôleur qui gère les utilisateurs
include_once '../Controller/utilisateurC.php';
$utilisateurC = new utilisateurC();
$utilisateurs = $utilisateurC->listUtilisateurs(); // Cette fonction doit retourner tous les utilisateurs
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Élève</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="container">
    <h2>Ajouter un élève à partir d'un utilisateur existant</h2>
    <div class="modal-body">
        <form method="POST" id="insertForm" action="AddEleve.php" enctype="multipart/form-data">
            <!-- Sélecteur d'utilisateur existant -->
            <div class="mb-3">
                <label for="userId" class="form-label">Sélectionner un utilisateur :</label>
                <select class="form-control" name="userId" id="userId">
                    <?php
                    foreach ($utilisateurs as $utilisateur) {
                        echo "<option value='" . $utilisateur['Id_utilisateur'] . "'>" . $utilisateur['Nom'] . " " . $utilisateur['Prenom'] . " - " . $utilisateur['Role'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="niveau" class="form-label">Niveau :</label>
                <input type="text" class="form-control" name="niveau" id="niveau" placeholder="Niveau de l'élève">
                <select class="form-select" name="niveau" id="niveau"  onclick="return validateNiveauSelection()">
                                    <?php
                                    // Tableau des options de niveau
                                    $niveaux = array("moyen(ne)", "passable", "Avancé","Tres bien");
                                    // Parcours des options et affichage dans la liste déroulante
                                    foreach ($niveaux as $niveau) {
                                        echo "<option value='" . $niveau . "'>" . $niveau . "</option>";
                                    }
                                    ?>
                                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>
</html>
