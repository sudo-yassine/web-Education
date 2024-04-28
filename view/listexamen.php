<?php
include_once '../controller/examenC.php';
include_once '../view/searchexamen.php';
$examenC = new examenC();
$list = $examenC->listexamen();
// Vérifier si un tri est demandé
$order = isset($_GET['order']) && in_array($_GET['order'], ['ASC', 'DESC']) ? $_GET['order'] : 'ASC';

// Récupérer les examens triés par difficulté
$examens = $examenC->listexamenByDifficulty($order);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>examen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/style.css">
    </head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3 mt-5" >
            <div class="text-body-secondary">
                <span class="h5"></span>
                <br>
                
            </div>
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#addexamenModal">
                ajouter un examen
            </button>
        </div>
        <a href="listexamen.php?order=ASC" class="btn btn-primary">Trier par difficulté croissante</a>
        <a href="listexamen.php?order=DESC" class="btn btn-primary">Trier par difficulté décroissante</a>
        <div class="mb-3">
    <label for="searchInput" class="form-label">Rechercher par titre :</label>
    <input type="text" class="form-control" id="searchInput" placeholder="Entrez un titre">
</div>
        <div class="modal fade"  id="addexamenModal" tabindex="-1" aria-labelledby="addexamenModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="addexamenModalLabel">ajouter un examen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="insertForm" action="addexamen.php" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">ID ressources</label>
                                    <input type="number"class="form-control"  name="id_ressources" placeholder="id_ressources">
                                </div>
                                <div class="col">
                                    <label class="form-label" >titre</label>
                                    <input type="text" class="form-control" name="titre" placeholder=" titre" 
                                    onblur="validateTitre(this)" value="<?php echo htmlspecialchars($admin['titre'] ?? ''); ?>">
                                    <div id="error_nom" class="text-danger"></div>
                                </div>
                                <div>
                                    <label >description</label>
                                    <input type="text" class="form-control" name="description" placeholder="description"
                                    onblur="validateDescription(this)" value="<?php echo htmlspecialchars($admin['description'] ?? ''); ?>">
                                    <div id="error" class="text-danger"></div>
                                </div>
                                <div class="form-label">
                                    <label >duree</label>
                                    <input type="Text"class="form-control"  name="duree" placeholder="duree">
                                </div>
                                <div class="form-label">
                                    <label>Difficulté</label>
                                        <select class="form-select" id="difficulte" name="difficulte">
                                            <option value="facile">Facile</option>
                                            <option value="moyen">Moyen</option>
                                            <option value="difficile">Difficile</option>
                                        </select>
                                </div>
                            </div>
                            <div>
                                <button type="submit"  class="btn btn-primary me-1" id="insertBtn">Submit</button>
                                <button type="button"  class="btn btn-primary me-1" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                        <script>
                        function validateTitre(input) {
                            var titre = input.value.trim();
                            var errorDiv = input.nextElementSibling;
                            var regex =/^[A-Z][a-zA-Z]*$/;

                            if (!regex.test(titre)) {
                                errorDiv.textContent = "Veuillez entrer un titre valide ";
                                return false;
                            } else {
                                errorDiv.textContent = "";
                                return true;
                            }
                        }
                        
                        function validateDescription(input) {
                            var descrip = input.value.trim();
                            var errorDiv = input.nextElementSibling;
                            var regex =/^[a-zA-Z0-9]+ [a-zA-Z0-9]+$/;

                            if (!regex.test(descrip)) {
                                errorDiv.textContent = "Veuillez entrer un descrip valide ";
                                return false;
                            } else {
                                errorDiv.textContent = "";
                                return true;
                            }
                        }
                        
                    </script>

                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover align-middle" id="myTable" style="width:100%;">
            <thead class="table-dark">
                <tr>
                    <th>ID examen</th>
                    <th>ID ressources</th>
                    <th>titre</th>
                    <th>description</th>
                    <th>duree</th>
                    <th>difficulte</th>
                    <th>update</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($examens as $examen) {
                ?>
                    <tr>
                        <td><?= $examen['id_examen']; ?></td>
                        <td><?= $examen['id_ressources']; ?></td>
                        <td><?= $examen['titre']; ?></td>
                        <td><?= $examen['description']; ?></td>
                        <td><?= $examen['duree']; ?></td>
                        <td><?= $examen['difficulte']; ?></td>
                        <td class="text-center">
                            <a href="updateexamen.php?id_examen=<?php echo $examen['id_examen']; ?>" class="btn  btn-success"><i class="fa-solid fa-pen-to-square fa-xl"></i>update</a>
                        </td>
                        <td class="text-center">
                            <a href="deleteexamen.php?id_examen=<?php echo $examen['id_examen']; ?>"class="btn  btn-danger"><i class="fa-solid fa-trash fa-xl"></i>Delete</a>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var titre = $(this).val();
                $.ajax({
                    url: 'searchexamen.php',
                    method: 'GET',
                    data: { titre: titre },
                    success: function(response) {
                        $('#myTable tbody').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
    
</body>

</html>