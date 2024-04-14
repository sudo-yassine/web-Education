<?php
include '../controller/eleveC.php';
$eleveC = new eleveC();
$error = "";
$eleve = null;
if (
    isset($_POST["Nom"]) &&
    isset($_POST["Prenom"]) &&
    isset($_POST["Adresse"]) &&
    isset($_POST['Tel'])&&
    isset($_POST["Password"])&&
    isset($_POST["niveau"])
) {
    if (
        !empty($_POST["Nom"]) &&
        !empty($_POST["Prenom"]) &&
        !empty($_POST["Adresse"]) &&
        !empty($_POST['Tel'])&&
        !empty($_POST["Password"])&&
        !empty($_POST["niveau"])
    
    ) {
       
        $eleve = new eleve(
            null,
            $_POST['Nom'],
            $_POST['Prenom'],
            $_POST['Adresse'],
            $_POST['Tel'],
            $_POST['Password'],
            $_POST['niveau']    
        );
        $eleveC->updateeleve($eleve, $_GET['Id_eleve']);
        header('Location:listEleves.php');
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
        if (isset($_GET['Id_eleve'])) {
            $eleve = $eleveC->showeleve($_GET['Id_eleve']);
        ?>
            <div class="modal-header">
                <h5 class="modal-title" id="addcoursModalLabel">Modifier eleve</h5>
            </div>
            <div class="modal-body">
                <div id="error">
                    <?php echo $error; ?>
                </div>
                <form method="POST" id="insertForm" action="updateEleve.php" enctype="multipart/form-data">
                    <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control" name="Nom" placeholder="Nom" value="<?php echo isset($eleve['Nom']) ? $eleve['Nom'] : ''; ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Prenom</label>
                        <input type="text" class="form-control" name="Prenom" placeholder="Prenom" value="<?php echo isset($eleve['Prenom']) ? $eleve['Prenom'] : ''; ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Adresse</label>
                        <input type="text" class="form-control" name="Adresse" placeholder="Adresse" value="<?php echo isset($eleve['Adresse']) ? $eleve['Adresse'] : ''; ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Password</label>
                        <input type="text" class="form-control" name="Password" placeholder="Password" value="<?php echo isset($eleve['Password']) ? $eleve['Password'] : ''; ?>">
                    </div>
                    <div class="col">
                            <label class="form-label">niveau</label>
                            <input type="text" class="form-control" name="niveau" placeholder="niveau" value="<?php echo $eleve['niveau']; ?>">
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