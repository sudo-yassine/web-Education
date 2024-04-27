<?php
include '../Controller/adminC.php';
$adminC = new adminC();
$error = "";
$admin = null;
if (
    isset($_POST["niveau"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["pass"])&&
    isset($_POST["Email"])
) {
    if (
        !empty($_POST["niveau"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["pass"])&&
        !empty($_POST["Email"])
    
    ) {
       
        $admin = new admin(
            null,
            $_POST['niveau'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['pass'] ,  
            $_POST['Email']   
        );
        $adminC->updateAdmin($admin, $_GET['Id_admin']);
        header('Location:listAdmins.php');
    } else
        $error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Formation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
     <div class="container">
        <?php
        if (isset($_GET['Id_admin'])) {
            $admin = $adminC->showAdmin($_GET['Id_admin']);
        ?>
            <div class="modal-header">
                <h5 class="modal-title" id="addcoursModalLabel">Modifier admin</h5>
            </div>
            <div class="modal-body">
                <div id="error">
                    <?php echo $error; ?>
                </div>
            <form method="POST" id="insertForm" action="" enctype="multipart/form-data">
                <div class="row mb-3">
                         <div class="col">
                           <label class="form-label">niveau</label>
                           <input type="text" class="form-control" name="niveau" placeholder="Niveau" value="<?php echo htmlspecialchars($admin['niveau'] ?? ''); ?>">
                         </div>
                    <div class="col">
                         <label class="form-label">nom</label>
                         <input type="text" class="form-control" name="nom" placeholder="Nom" value="<?php echo htmlspecialchars($admin['nom'] ?? ''); ?>">
                    </div>
                    <div class="col">
                         <label class="form-label">prenom</label>
                         <input type="text" class="form-control" name="prenom" placeholder="Prénom" value="<?php echo htmlspecialchars($admin['prenom'] ?? ''); ?>">
                     </div>
                    <div class="col">
                        <label class="form-label">pass</label>
                        <input type="pass" class="form-control" name="pass" placeholder="pass" value="<?php echo htmlspecialchars($admin['pass'] ?? ''); ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Email</label>
                        <input type="Email" class="form-control" name="Email" placeholder="Email" value="<?php echo htmlspecialchars($admin['Email'] ?? ''); ?>">
                    </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary me-1" id="insertBtn">Enregistrer</button>
                <button type="reset" class="btn btn-secondary">Annuler</button>
            </div>
        </form>

            </div>
        <?php
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
</body>
</html>