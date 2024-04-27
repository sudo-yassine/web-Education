<?php
include '../Controller/coursC.php';
$coursC = new coursC();
$error = "";
$cours = null;

if (
    isset($_POST["nom_cours"]) &&
    isset($_POST["heures"]) &&
    isset($_POST["niveau"]) &&
    isset($_POST['contenu']) &&
    isset($_POST['matiere']) // Ensure matiere is set
) {
    if (
        !empty($_POST['nom_cours']) &&
        !empty($_POST["heures"]) &&
        !empty($_POST["niveau"]) &&
        !empty($_POST["contenu"]) &&
        !empty($_POST['matiere']) // Ensure matiere is not empty
    ) {
        $cours = new cours(
            null,
            $_POST['nom_cours'],
            $_POST['heures'],
            $_POST['niveau'],
            $_POST['contenu'],
            $_POST['matiere'] // Include matiere in the constructor
        );
        $coursC->updatecours($cours, $_GET['id_cours']); // Pass matiere along with other parameters
        header('Location:listcours.php');
    } else {
        $error = "Missing information";
    }
}

if (isset($_GET['id_cours'])) {
    $cours = $coursC->showcours($_GET['id_cours']);
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
        <div class="modal-header">
            <h5 class="modal-title" id="addcoursModalLabel">Update cours</h5>
        </div>
        <div class="modal-body">
            <div id="error">
                <?php echo $error; ?>
            </div>
            <form method="POST" id="insertForm" action="" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">nom cours</label>
                        <input type="text" class="form-control" name="nom_cours" placeholder="nom cours" value="<?php echo $cours['nom_cours']; ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">heures</label>
                        <input type="text" class="form-control" name="heures" placeholder="heures" value="<?php echo $cours['heures']; ?>">
                    </div>
                     <div class="col">
                        <label class="form-label">niveau</label>
                        <input type="text" class="form-control" name="niveau" placeholder="niveau" value="<?php echo $cours['niveau']; ?>">
                    </div>
                     <div class="col">
                        <label class="form-label">contenu</label>
                        <input type="text" class="form-control" name="contenu" placeholder="contenu" value="<?php echo $cours['contenu']; ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Matière</label>
                        <input type="text" class="form-control" name="matiere" placeholder="matiere" value="<?php echo $cours['matiere']; ?>">
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary me-1" id="insertBtn">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
</body>
</html>
