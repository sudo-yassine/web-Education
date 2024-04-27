<?php
include_once '../controller/examenfinalC.php';
$examenC = new examenC();
$examenfinalC = new examenfinalC();
$list = $examenfinalC->listexamenfinal();
$list1 = $examenC->listexamen();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>examenfinal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/style.css">
    </head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3 mt-5" >
            <div class="text-body-secondary">
                <span class="h5">Tous les examenfinal</span>
                <br>
               crud examenfinal 
            </div>
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#adduserModal">
                ajouter un examenfinal
            </button>
        </div>
        <div class="modal fade"  id="adduserModal" tabindex="-1" aria-labelledby="adduserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="addcoursModalLabel">ajouter un examenfinal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="insertForm" action="Addexamenfinal.php" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Nom</label>
                                    <input type="text"class="form-control"  name="Nom" placeholder="nom de l'examenfinal">
                                </div>
                                <div class="col">
                                    <label class="form-label" >titre</label>
                                    <input type="text" class="form-control" name="titre" placeholder="titre de l'examenfinal">
                                </div>
                                <div>
                                    <label >description</label>
                                    <input type="text" class="form-control" name="description" placeholder="description">
                                </div>
                                <div class="form-label">
                                    <label >duree</label>
                                    <input type="number"class="form-control"  name="duree" placeholder="duree">
                                </div>
                                <div class="form-label">
                                    <label >difficulte</label>
                                    <input type="text"class="form-control"  name="difficulte" placeholder="difficulte">
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
                    <th>id_examen</th>
                    <th>id_cours</th>
                    <th>titre</th>
                    <th>description</th>
                    <th>duree</th>
                    <th>Password</th>
                    <th>difficulte</th>
                    <th>Modifier</th>
                    <th>supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $examenfinal) { ?>
            <tr>
                <td><?= $examenfinal['id_examen']; ?></td>
                <td><?= $examenfinal['id_cours']; ?></td>
                <td><?= $examenfinal['titre']; ?></td>
                <td><?= $examenfinal['description']; ?></td>
                <td><?= $examenfinal['duree']; ?></td>
                <td><?= $examenfinal['difficulte']; ?></td>
                <td>
                    <a href="updateexamenfinal.php?id_examenfinal=<?= $examenfinal['id_examenfinal']; ?>" class="btn"><i class="fa-solid fa-pen-to-square fa-xl"></i>Modifier</a>
                </td>
                <td>
                    <a href="Deleteexamenfinal.php?id_examenfinal=<?= $examenfinal['id_examenfinal']; ?>" class="btn"><i class="fa-solid fa-trash fa-xl"></i>supprimer</a>
                </td>
            </tr>
            <?php } ?>
                
                
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
</body>

</html>