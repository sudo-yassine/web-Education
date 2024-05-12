<?php
include '../Controller/enseignantC.php';
$enseignantC = new enseignantC();
$error = "";
$enseignant = null;

// Récupération des données pour remplir le formulaire
if (isset($_GET['Id_enseignant'])) {
    $enseignant = $enseignantC->showuser($_GET['Id_enseignant']);
    if (!$enseignant) {
        $error = "Aucun élève trouvé avec l'ID spécifié.";
    }
}

// Traitement de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["Nom"]) && !empty($_POST["Prenom"]) && !empty($_POST["Email"]) && !empty($_POST["Tel"]) && !empty($_POST["Password"]) && !empty($_POST["specialite"])) {
        $enseignantToUpdate = new enseignant(
            $_GET['Id_enseignant'],  // Utilisez l'ID existant plutôt que `null`
            $_POST['Nom'],
            $_POST['Prenom'],
            $_POST['Email'],
            $_POST['Tel'],
            $_POST['Password'],
            0, // Supposons que le rôle est statique, à ajuster selon votre application
            $_POST['specialite']
        );
        $enseignantC->updateenseignant($enseignantToUpdate, $_GET['Id_enseignant']);
        header('Location:enseignantdash.php');
    } else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <!--<link rel="stylesheet" href="./css/style.css">-->
</head>
<body>
     <div class="container">
        <?php
        if (isset($_GET['Id_enseignant'])) {
            $enseignant = $enseignantC->showuser($_GET['Id_enseignant']);
        ?>
            <div class="modal-header">
                <h5 class="modal-title" id="addcoursModalLabel">Modifier enseignant</h5>
            </div>
            <div class="modal-body">
                <div id="error">
                    <?php echo $error; ?>
                </div>
                <form method="POST" id="insertForm" action="" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Nom</label>
                            <input type="text" class="form-control" name="Nom" placeholder="Nom" value="<?php echo $enseignant['Nom']; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">Prenom</label>
                            <input type="text" class="form-control" name="Prenom" placeholder="Prenom" value="<?php echo $enseignant['Prenom']; ?>">
                        </div>
                         <div class="col">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="Email" placeholder="Email" value="<?php echo $enseignant['Email']; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">Tel</label>
                            <input type="number" class="form-control" name="Tel" placeholder="Tel" value="<?php echo $enseignant['Tel']; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" name="Password" placeholder="Password" value="<?php echo $enseignant['Password']; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">specialite</label>
                            <input type="text" class="form-control" name="specialite" placeholder="specialite" value="<?php echo $enseignant['specialite']; ?>">
                        </div>
                    </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary me-1" id="insertBtn">Submit</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
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