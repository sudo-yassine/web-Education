<?php
include_once '../Controller/ressourcesC.php';
$ressourcesC = new ressourcesC();
$error = "";
$ressources = null;
if (
    isset($_POST["description_ressources"]) &&
    isset($_POST["livre"]) &&
    isset($_POST["playlist_ytb"]) 
) {
    if (
        !empty($_POST['description_ressources']) &&
        !empty($_POST["livre"]) &&
        !empty($_POST["playlist_ytb"])&&
        !empty($_POST["id_examen"])
        
    ) {
       
        $ressources = new ressources(
            null,
            $_POST['description_ressources'],
            $_POST['livre'],
            $_POST['playlist_ytb'],
            $_POST['id_examen']
        );
        $ressourcesC->updateressources($ressources, $_GET['id_ressources']);
        header('Location:ressourcesdash.php');
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
        if (isset($_GET['id_ressources'])) {
            $ressources = $ressourcesC->showressources($_GET['id_ressources']);
        ?>
            <div class="modal-header">
                <h5 class="modal-title" id="addressourcesModalLabel">Update ressources</h5>
            </div>
            <div class="modal-body">
                <div id="error">
                    <?php echo $error; ?>
                </div>
                <form method="POST" id="insertForm" action="" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">ID ressources</label>
                            <input type="text" class="form-control" name="description_ressources" placeholder="ID ressources" value="<?php echo $ressources['description_ressources']; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">livre</label>
                            <input type="text" class="form-control" name="livre" placeholder="livre" value="<?php echo $ressources['livre']; ?>">
                        </div>
                         <div class="col">
                            <label class="form-label">playlist_ytb</label>
                            <input type="text" class="form-control" name="playlist_ytb" placeholder="playlist_ytb" value="<?php echo $ressources['playlist_ytb']; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">id examen</label>
                            <input type="text" class="form-control" name="playlist_ytb" placeholder="id_examen" value="<?php echo $ressources['id_examen']; ?>">
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