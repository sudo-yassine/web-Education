<?php
require_once "../controller/ExamenC.php";

$ExamenC = new ExamenC();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id_examen"]) && isset($_POST["search"])) {
        $id_examen = $_POST["id_examen"];
        $list = $ExamenC->afficherressources($id_examen); 
    }
}
$examen = $ExamenC->afficherexamens();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de ressources</title>
    <!-- Inclusion de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Recherche de ressources par examen</h1> 
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="mb-3">
            <div class="row g-3">
                <div class="col-auto">
                    <label for="id_examen" class="form-label">Sélectionnez un examen :</label>
                </div>
                <div class="col-auto">
                    <select name="id_examen" id="id_examen" class="form-select">
                        <?php foreach ($examen as $exam): ?>
                            <option value="<?= $exam['id_examen']; ?>"><?= $exam['titre']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" name="search" id="search" class="btn btn-primary me-2">Rechercher</button>
                    <button type="button" id="cancelBtn" class="btn btn-secondary">Annuler</button>
                </div>
            </div>
        </form>

        <?php if (isset($list)): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Description des ressources</th>
                            <th scope="col">Livre</th>
                            <th scope="col">Playlist YouTube</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $ressources): ?>
                            <tr>
                                <td><?= $ressources['description_ressources']; ?></td>
                                <td><img src="uploads/<?= $ressources['livre']; ?>" alt="Image" width=300 ></td>
                                <td><?= $ressources['playlist_ytb']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <script>
       // Fonction pour effacer le tableau lorsque le bouton "Annuler" est cliqué
       document.getElementById('cancelBtn').addEventListener('click', function() {
           var table = document.querySelector('.table'); // Sélectionne le tableau
           if (table) { // Vérifie si le tableau existe
               table.innerHTML = ''; // Efface le contenu du tableau
           }
       });
   </script>

   <!-- Inclusion de Bootstrap JavaScript (optionnel si vous n'utilisez pas de composants JavaScript de Bootstrap) -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
