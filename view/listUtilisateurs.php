<?php
include_once '../Controller/utilisateurC.php';
$utilisateurC = new utilisateurC();
$list = $utilisateurC->listUtilisateurs();
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
    <!--<link rel="stylesheet" href="./css/style.css">-->
    </head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3 mt-5" >
            <div class="text-body-secondary">
                <span class="h5">Tous les utilisateur</span>
                <br>
               Crud utilisateur 
            </div>
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#adduserModal">
                ajouter un utilisateur
            </button>
            <div class="modal-header d-flex justify-content-between align-items-center">
                <h5 id="addcoursModalLabel"></h5>
                <a href="AddEleveForm.php" class="btn btn-primary">Ajouter un élève</a>
            </div>
            <div class="modal-header d-flex justify-content-between align-items-center">
                <h5 id="addcoursModalLabel"></h5>
                <a href="AddEnseignantForm.php" class="btn btn-primary">Ajouter un enseignant</a>
            </div>
        </div>
        <div class="modal fade"  id="adduserModal" tabindex="-1" aria-labelledby="adduserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="addcoursModalLabel">ajouter un utilisateur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="insertForm" action="AddUtilisateur.php" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Nom</label>
                                    <input type="text" class="form-control" name="Nom" placeholder="Nom" onblur="validateName(this)" value="<?php echo htmlspecialchars($utilisateur['Nom'] ?? ''); ?>">
                                    <div id="error_nom" class="text-danger"></div>
                                </div>
                                <div class="col">
                                    <label class="form-label" >Prenom</label>
                                    <input type="text" class="form-control" name="Prenom" placeholder="Nom" onblur="validateName(this)" value="<?php echo htmlspecialchars($utilisateur['Prenom'] ?? ''); ?>">
                                    <div id="error_nom" class="text-danger"></div>
                                </div>
                                <div>
                                    <label >Email</label>
                                    <input type="text" class="form-control" name="Email" placeholder="Email">
                                </div>
                                <div class="form-label">
                                    <label >Tel</label>
                                    <input type="number"class="form-control"  name="Tel" placeholder="Tel">
                                </div>
                                <div class="form-label">
                                    <label >Password</label>
                                    <input type="Password" class="form-control" name="Password" placeholder="Password" onblur="validatepass(this)" value="<?php echo htmlspecialchars($utilisateur['Password'] ?? ''); ?>">
                                <div id="error_prenom" class="text-danger"></div>
                                </div>
                                <div class="form-label">
                                    <label >Role</label>
                                    <input type="number"class="form-control"  name="Role" placeholder="Eleve 1 sinon Enseigant 0">
                                </div>
                            </div>
                            <div>
                                <button type="submit"  class="btn btn-primary me-1" id="insertBtn">Submit</button>
                                <button type="button"  class="btn btn-primary me-1" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                        <script>
                        function validateName(input) {
                            var name = input.value.trim();
                            var errorDiv = input.nextElementSibling;
                            var regex = /^[A-Za-z]+$/;

                            if (!regex.test(name)) {
                                errorDiv.textContent = "Veuillez entrer un nom ou un prénom valide (lettres uniquement)";
                                return false;
                            } else {
                                errorDiv.textContent = "";
                                return true;
                            }
                        }
                        
                        function validatepass(input) {
                            var pass = input.value.trim();
                            
                            var errorDiv = input.nextElementSibling;
                            var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;


                            if (!regex.test(pass)) {
                                errorDiv.textContent = "password invalide";
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
                    <th>Id_utilisateur</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Tel</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Modifier</th>
                    <th>supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $utilisateur) {
                ?>
                    <tr>
                        <td><?= $utilisateur['Id_utilisateur']; ?></td>
                        <td><?= $utilisateur['Nom']; ?></td>
                        <td><?= $utilisateur['Prenom']; ?></td>
                        <td><?= $utilisateur['Email']; ?></td>
                        <td><?= $utilisateur['Tel']; ?></td>
                        <td><?= $utilisateur['Password']; ?></td>
                        <td><?= $utilisateur['Role']; ?></td>
                        <td>
                            <a href="updateUtilisateur.php?Id_utilisateur=<?php echo $utilisateur['Id_utilisateur']; ?>" class="btn"><i class="fa-solid fa-pen-to-square fa-xl"></i>Modifier</a>
                        </td>
                        <td>
                            <a href="DeleteUtilisateur.php?Id_utilisateur=<?php echo $utilisateur['Id_utilisateur']; ?>"class="btn"><i class="fa-solid fa-trash fa-xl"></i>supprimer</a>
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
    <!--<script src="java.js"></script>-->
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
</body>

</html>