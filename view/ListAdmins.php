<?php
include '../Controller/adminC.php';
$adminC = new adminC();
$list = $adminC->listAdmins();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/style.css">
    <!--<script src="java.js"></script>-->
    </head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3 mt-5" >
            <div class="text-body-secondary">
                <span class="h5">tous les Admins</span>
                <br>
               crud Admin 
            </div>
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#adduserModal">
                ajouter un admin
            </button>
        </div>
        <div class="modal fade"  id="adduserModal" tabindex="-1" aria-labelledby="adduserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="addcoursModalLabel">ajouter un admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="POST" id="insertForm" action="AddAdmin.php" enctype="multipart/form-data" onsubmit="return validateForm();">
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Niveau</label>
                                <select class="form-select" name="niveau" id="niveau">
                                    <?php
                                    // Tableau des options de niveau
                                    $niveaux = array("super", "controle", "Avancé");
                                    // Parcours des options et affichage dans la liste déroulante
                                    foreach ($niveaux as $niveau) {
                                        echo "<option value='" . $niveau . "'>" . $niveau . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" placeholder="Nom" onblur="validateName(this)" value="<?php echo htmlspecialchars($admin['nom'] ?? ''); ?>">
                                <div id="error_nom" class="text-danger"></div>
                            </div>
                            <div class="col">
                                <label class="form-label">Prénom</label>
                                <input type="text" class="form-control" name="prenom" placeholder="Prénom" onblur="validateName(this)" value="<?php echo htmlspecialchars($admin['prenom'] ?? ''); ?>">
                                <div id="error_prenom" class="text-danger"></div>
                            </div>
                            <div class="col">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="pass" placeholder="Mot de passe" onblur="validatepass(this)" value="<?php echo htmlspecialchars($admin['pass'] ?? ''); ?>">
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary me-1" id="insertBtn" onclick="return validateNiveauSelection()">Enregistrer</button>
                            <button type="reset" class="btn btn-secondary">Annuler</button>
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
                            
                            //var errorDiv = input;
                            var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

                            if (!regex.test(pass)) {
                                //errorDiv.textContent = "test";
                                alert("password invalide");
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
                    <th>Id_admin</th>
                    <th>Niveau</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Password</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $admin) {
                ?>
                    <tr>
                        <td><?= $admin['Id_admin']; ?></td>
                        <td><?= $admin['niveau']; ?></td>
                        <td><?= $admin['nom']; ?></td>
                        <td><?= $admin['prenom']; ?></td>
                        <td><?= $admin['pass']; ?></td>
                        <td>
                            <a href="UpdateAdmin.php?Id_admin=<?php echo $admin['Id_admin']; ?>" class="btn"><i class="fa-solid fa-pen-to-square fa-xl"></i>Modifier</a>
                        </td>
                        <td>
                            <a href="DeleteAdmin.php?Id_admin=<?php echo $admin['Id_admin']; ?>"class="btn"><i class="fa-solid fa-trash fa-xl"></i>supprimer</a>
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