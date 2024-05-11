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
    <title>Ajouter Enseignant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="container">
    <h2>Ajouter un enseignant à partir d'un utilisateur existant</h2>
    <div class="modal-body">
        <form method="POST" id="insertForm" action="AddEnseignant.php" enctype="multipart/form-data">
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
                <label for="specialite" class="form-label">specialite :</label>
                <input type="text" class="form-control" name="specialite" id="specialite" placeholder="specialite de l'enseignant">
                <select class="form-select" name="specialite" id="niveau"  onclick="return validateSpecSelection()">
                                    <?php
                                    // Tableau des options de niveau
                                    $spec = array("Math", "Physique", "Français");
                                    // Parcours des options et affichage dans la liste déroulante
                                    foreach ($spec as $spec) {
                                        echo "<option value='" . $spec . "'>" . $spec . "</option>";
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
<script src="java.js"></script>
</body>
</html>
