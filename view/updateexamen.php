<?php
include_once '../Controller/examenC.php';
$examenC = new examenC();
$error = "";
$examen = null;
if (

    isset($_POST["titre"]) &&
    isset($_POST["description"]) &&
    isset($_POST['duree']) &&
    isset($_POST['difficulte'])
) {
    if (
        !empty($_POST["titre"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["duree"]) &&
        !empty($_POST["difficulte"])
    ) {
        $date_heure = date('Y-m-d H:i:s');
       
        $examen = new examen(
            null,
            $_POST['titre'],
            $_POST['description'],
            $_POST['duree'],
            $_POST['difficulte'], 
            $date_heure   
        );
        $examenC->updateexamen($examen, $_GET['id_examen']);
        header('Location:examendash.php');
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
        if (isset($_GET['id_examen'])) {
            $examen = $examenC->showexamen($_GET['id_examen']);
            
        ?>
            <div class="modal-header">
                <h5 class="modal-title" id="addexamenModalLabel">Update examen</h5>
            </div>
            <div class="modal-body">
                <div id="error">
                    <?php echo $error; ?>
                </div>
                <form method="POST" id="insertForm" action="" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">titre</label>
                            <input type="text" class="form-control" name="titre" placeholder="titre" value="<?php echo $examen['titre']; ?>">
                        </div>
                         <div class="col">
                            <label class="form-label">description</label>
                            <input type="text" class="form-control" name="description" placeholder="description" value="<?php echo $examen['description']; ?>">
                        </div>
                         <div class="col">
                            <label class="form-label">duree</label>
                            <input type="text" class="form-control" name="duree" placeholder="duree" value="<?php echo $examen['duree']; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">difficulte</label>
                            <select class="form-select" name="difficulte">
                                    <option value="facile" <?php if ($examen['difficulte'] === 'facile') echo 'selected'; ?>>Facile</option>
                                    <option value="moyen" <?php if ($examen['difficulte'] === 'moyen') echo 'selected'; ?>>Moyen</option>
                                    <option value="difficile" <?php if ($examen['difficulte'] === 'difficile') echo 'selected'; ?>>Difficile</option>
                            </select>
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