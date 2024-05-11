<?php
include '../controller/matiereC.php';
$matiereC = new matiereC();
$list = $matiereC->listMatieres();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des matières</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <!-- Add any additional CSS or styling here -->
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3 mt-5" >
            <div class="text-body-secondary">
                <span class="h5">Toutes les matières</span>
            </div>
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#addMatiereModal">
                Ajouter une matière
            </button>
        </div>
        <div class="modal fade"  id="addMatiereModal" tabindex="-1" aria-labelledby="addMatiereModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="addMatiereModalLabel">Ajouter une matière</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="insertForm" action="addmatiere.php">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Nom</label>
                                    <input type="text" class="form-control" name="nom_matiere" placeholder="Nom de la matière">
                                </div>
                                <div class="col">
                                    <label class="form-label">Description</label>
                                    <input type="text" class="form-control" name="description" placeholder="Description de la matière">
                                </div>
                                <div class="col">
                                    <label class="form-label">Ressources</label>
                                    <input type="text" class="form-control" name="resources" placeholder="Ressources de la matière">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover align-middle" id="myTable" style="width:100%;">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Ressources</th>
                    <th>update</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
               <?php foreach ($list as $matiere): ?>
    <tr>
        <td><?= $matiere['id_matiere']; ?></td>
        <td><?= $matiere['nom_matiere']; ?></td>
        <td><?= $matiere['description']; ?></td>
        <td><?= isset($matiere['resources']) ? $matiere['resources'] : 'N/A'; ?></td>
        <td>
            <a href="updatematiere.php?id_matiere=<?= $matiere['id_matiere']; ?>" class="btn btn-primary">Update</a>
        </td>
        <td>
            <a href="deletematiere.php?id_matiere=<?= $matiere['id_matiere']; ?>" class="btn btn-danger">Delete</a>
        </td>
    </tr>
<?php endforeach; ?>
 

            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
    <!-- Add any additional JavaScript here -->
</body>
</html>
