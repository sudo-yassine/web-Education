<?php
include '../controller/coursC.php';
$coursC = new coursC();
$list = $coursC->listcours();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/style.css">
    </head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3 mt-5" >
            <div class="text-body-secondary">
                <span class="h5">tous les cours</span>
                <br>
               crud cours 
            </div>
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#addcoursModal">
                ajouter un cours
            </button>
        </div>
        <div class="modal fade"  id="addcoursModal" tabindex="-1" aria-labelledby="addcoursModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="addcoursModalLabel">ajouter un cours</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="insertForm" action="addcours.php" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">nom cours</label>
                                    <input type="text"class="form-control"  name="nom_cours" placeholder="nom du cours">
                                </div>
                                <div class="col">
                                    <label class="form-label" >heures</label>
                                    <input type="text" class="form-control" name="heures" placeholder="nombre heures">
                                </div>
                                <div>
                                    <label >niveau</label>
                                    <input type="text" class="form-control" name="niveau" placeholder="niveau">
                                </div>
                                <div class="form-label">
                                    <label >contenu</label>
                                    <input type="text"class="form-control"  name="contenu" placeholder="contenu">
                                </div>
                            </div>
                            <div>
                                <button type="submit"  class="btn btn-primary me-1" id="insertBtn">Submit</button>
                                <button type="button"  class="btn btn-primary me-1" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover align-middle" id="myTable" style="width:100%;">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>nom cours</th>
                    <th>heures</th>
                    <th>niveau</th>
                    <th>contenu</th>
                    <th>update</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $cours) {
                ?>
                    <tr>
                        <td><?= $cours['id_cours']; ?></td>
                        <td><?= $cours['nom_cours']; ?></td>
                        <td><?= $cours['heures']; ?></td>
                        <td><?= $cours['niveau']; ?></td>
                        <td><?= $cours['contenu']; ?></td>
                        <td>
                            <a href="updatecours.php?id_cours=<?php echo $cours['id_cours']; ?>" class="btn"><i class="fa-solid fa-pen-to-square fa-xl"></i>update</a>
                        </td>
                        <td>
                            <a href="deletecours.php?id_cours=<?php echo $cours['id_cours']; ?>"class="btn"><i class="fa-solid fa-trash fa-xl"></i>Delete</a>
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
</body>

</html>