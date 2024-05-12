<?php
include '../controller/reclamationC.php';

$reclamationC = new reclamationC(); // Créer une instance de la classe reclamationC

// Vérifier si le paramètre d'ordre est défini dans l'URL et le valider
$order = isset($_GET['order']) && in_array($_GET['order'], ['ASC', 'DESC']) ? $_GET['order'] : 'ASC';

// Appeler la fonction listName avec le paramètre d'ordre
$reclamations = $reclamationC->listName($order);

// HTML pour afficher le tableau
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des réclamations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Liste des réclamations</h2>
        <div class="mt-3">
            <a href="TriD.php?order=ASC" class="btn btn-primary">Trier par nom croissant</a>
            <a href="TriC.php?order=DESC" class="btn btn-primary">Trier par nom décroissant</a>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reclamations as $reclamation) : ?>
                <tr>
                    <th scope="row"><?php echo $reclamation['id_reclamation']; ?></th>
                    <td><?php echo $reclamation['nom']; ?></td>
                    <td><?php echo $reclamation['prenom']; ?></td>
                    <td><?php echo $reclamation['email']; ?></td>
                    <td><?php echo $reclamation['telephone']; ?></td>
                    <td><?php echo $reclamation['typee']; ?></td>
                    <td><?php echo $reclamation['descp']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
