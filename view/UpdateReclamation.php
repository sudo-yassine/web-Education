<?php
include '../controller/reclamationC.php';
$reclamation = new reclamationC();
$error = "";
//$reclamation = null;
if (
    isset($_POST['nom']) &&
    isset($_POST['prenom']) &&
    isset($_POST['email']) &&
    isset($_POST['telephone']) &&
    isset($_POST['typee']) &&
    isset($_POST['descp'])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["telephone"]) &&
        !empty($_POST["typee"]) &&
        !empty($_POST["descp"]) 
    ) {
       
        $reclamation = new reclamation(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['telephone'],
            $_POST['typee'],
            $_POST['descp']
        );
        $reclamation->Updatereclamation($reclamation, $_GET['id_reclamation']);
        header('Location:Listreclamation.php');
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
        if (isset($_GET['id_reclamation'])) {
            $reclamation = $reclamation->Showreclamation($_GET['id_reclamation']);
        ?>
            <div class="modal-header">
                <h5 class="modal-title" id="addreclamationModalLabel">Update reclamation</h5>
            </div>
            <div class="modal-body">
                <div id="error">
                    <?php echo $error; ?>
                </div>
                <form method="POST" id="insertForm" action="Addreclamation.php" enctypee="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">nom </label>
                                    <input typee="text" class="form-control" name="nom" placeholder="Nom">
                                </div>

                                <div class="col">
                                    <label class="form-label">prenom</label>
                                    <input typee="text" class="form-control" name="prenom" placeholder="prenom">
                                </div>

                                <div class="col">
                                    <label class="form-label">email</label>
                                    <input typee="text" class="form-control" name="email" placeholder="username@server.domain">
                                </div>

                                <div class="col">
                                    <label class="form-label">telephone</label>
                                    <input typee="text" class="form-control" name="telephone" placeholder="** *** ***">
                                </div>

                                <div class="col">
                                    <label class="form-label">typee</label>
                                    <select name="typee" id="typee">
                                    <option value="site">site</option>
                                    <option value="cours">cours</option>
                                    <option value="bug">bug</option>
                                    <option value="others">others</option>
                                    </select>
                                </div>
                                
                                <div class="col">
                                    <label class="form-label">descp</label>
                                    <input typee="text" class="form-control" name="descp" placeholder="Write here" id="input">
                                    <div id="errorDiv" class="text-danger"></div>
                                </div>
                                                      
                                <div class="col">
                                </div>          
                                <button typee="submit" class="btn btn-primary me-1" id="insertBtn">Submit</button>
                                <button typee="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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

