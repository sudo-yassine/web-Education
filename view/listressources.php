<?php
include_once '../controller/ressourcesC.php';
$ressourcesC = new ressourcesC();
$list = $ressourcesC->listressources();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ressources</title>
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
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#addressourcesModal">
                ajouter un ressources
            </button>
        </div>
        <div class="modal fade"  id="addressourcesModal" tabindex="-1" aria-labelledby="addressourcesModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="addressourcesModalLabel">ajouter un ressources</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="insertForm" action="addressources.php" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Description</label>
                                    <input type="text"class="form-control"  name="description_ressources" placeholder="description_ressources">
                                </div>
                                <div class="col">
                                <label class="form-label">Livre (Image)</label>
<input type="file" class="form-control" name="livre" accept="image/*">

                                </div>
                                <div class="col">
                                    <label >playlist_ytb</label>
                                    <input type="text" class="form-control" name="playlist_ytb" placeholder="playlist_ytb"
                                    onblur="validateplaylist_ytb(this)" value="<?php echo htmlspecialchars($admin['playlist_ytb'] ?? ''); ?>">
                                    <div id="error" class="text-danger"></div>
                                </div>
                                <div class="col">
                                    <label class="form-label">id_examen</label>
                                    <input type="text"class="form-control"  name="id_examen" placeholder="id_examen">
                                </div>
                                
                            </div>
                            <div>
                                <button type="submit"  class="btn btn-primary me-1" id="insertBtn">Submit</button>
                                <button type="button"  class="btn btn-primary me-1" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                        <script>
                        function validatelivre(input) {
                            var livre = input.value.trim();
                            var errorDiv = input.nextElementSibling;
                            var regex =/^[A-Z][a-zA-Z]*$/;

                            if (!regex.test(livre)) {
                                errorDiv.textContent = "Veuillez entrer un livre valide ";
                                return false;
                            } else {
                                errorDiv.textContent = "";
                                return true;
                            }
                        }
                        
                        function validateplaylist_ytb(input) {
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
                    <th>ID ressources</th>
                    <th>ID ressources</th>
                    <th>livre</th>
                    <th>playlist_ytb</th>
                    <th>id_examen</th>
                    <th  class="text-center">update</th>
                    <th  class="text-center">delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $ressources) {
                ?>
                    <tr>
                        <td><?= $ressources['id_ressources']; ?></td>
                        <td><?= $ressources['description_ressources']; ?></td>
                        <td><a href="https://www.alkitab.tn/livre/9782100821594-analyse-loic-teyssier-jean-romain-heu/"> <img src="uploads/<?= $ressources['livre']; ?>" alt="Image" width=300> </a></td>
                        <td><?= $ressources['playlist_ytb']; ?></td>
                        <td><?= $ressources['id_examen']; ?></td>
                        <td  class="text-center">
                            <a href="updateressources.php?id_ressources=<?php echo $ressources['id_ressources']; ?>" class="btn  btn-success"><i class="fa-solid fa-pen-to-square fa-xl"></i>update</a>
                        </td>
                        <td class="text-center">
                            <a href="deleteressources.php?id_ressources=<?php echo $ressources['id_ressources']; ?>"class="btn  btn-danger "><i class="fa-solid fa-trash fa-xl" ></i>Delete</a>
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