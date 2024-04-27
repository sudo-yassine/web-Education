<?php
require_once "../controller/RessourcesC.php";
$ressourcesC = new RessourcesC();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_ressources']) && isset($_POST['rechercher'])) {
        $id_ressources = $_POST['id_ressources'];
        $list= $ressourcesC->listexamen($id_ressources);
    }
}
$ressources =$ressourcesC->listressources();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche des ressources</title>
</head>
<body>
    <h1> Recherche ressources</h1>

    <form action="" method="POST" >
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="ressource"class="form-label">selectionner Ressources</label>
                                   <select name="ressources" id="ressources">
                                   <?php
                                   foreach ($ressources as $ressource){
                                     echo '<option value="'.$ressource['id_ressources'].'">'.$ressource['description_ressources'].'</option>';
                                   }

                                   ?>
                                </select>
                                   <input type="submit" name="rechercher" value="rechercher" class="btn btn-primary me-1" id="insertBtn">
                            </div>
                        </form>
    
</body>
</html>