<?php
include '../Controller/matiereC.php';

$matiereC = new MatiereC();
$error = "";
$matiere = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["nom_matiere"]) &&
        isset($_POST["description"]) &&
        isset($_POST["ressources"]) &&
        isset($_POST["id_matiere"]) // Ensure id_matiere is set
    ) {
        if (
            !empty($_POST["nom_matiere"]) &&
            !empty($_POST["description"]) &&
            !empty($_POST["ressources"]) &&
            !empty($_POST["id_matiere"]) // Ensure id_matiere is not empty
        ) {
            $matiere = new Matiere(
                $_POST["id_matiere"],
                $_POST["nom_matiere"],
                $_POST["description"],
                $_POST["ressources"] // Include ressources in the constructor
            );
            $matiereC->updateMatiere($matiere, $_GET['id_matiere']); // Pass the Matiere object to the updateMatiere method
           // header("Location: listmatiere.php");
            exit();
        } else {
            $error = "Missing information";
        }
    }
}

if (isset($_GET['id_matiere'])) {
    $matiere = $matiereC->showMatiere($_GET['id_matiere']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Matiere</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <div class="modal-header">
            <h5 class="modal-title" id="updateMatiereModalLabel">Update Matiere</h5>
        </div>
        <div class="modal-body">
            <div id="error">
                <?php echo $error; ?>
            </div>
            <form method="POST" id="updateForm" action="" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nom Matiere</label>
                        <input type="text" class="form-control" name="nom_matiere" placeholder="Nom Matiere" value="<?php echo $matiere['nom_matiere']; ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Description" value="<?php echo $matiere['description']; ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Ressources</label>
                        <input type="text" class="form-control" name="ressources" placeholder="Ressources" value="<?php echo $matiere['ressources']; ?>">
                    </div>
                    <input type="hidden" name="id_matiere" value="<?php echo $matiere['id_matiere']; ?>">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary me-1" id="updateBtn">Update</button>
                    <a href="listmatiere.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
</body>
</html>
