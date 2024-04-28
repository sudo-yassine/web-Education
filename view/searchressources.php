<?php
require_once "../controller/RessourcesC.php";
$ressourcesC = new RessourcesC();
// $list = [];


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['id_ressources']) && isset($_POST['search'])) {
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
    <title>Recherche d'examens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
   <h1>Recherche d'examens par ressources</h1> 
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="ressources">Sélectionnez un ressources :</label>
    <select name="ressources" id="ressources" class="form-select form-select-lg mb-3" aria-label="Large select example">
        <?php
        foreach ($ressources as $ressources) {
            echo '<option value="' . $ressources['id_ressources']. '">'. $ressources['description_ressources'] . '</option>';
        }
       ?>
    </select>
    <input type="submit" name="search" id="search">
   </form>

   <?php if (isset($list)) {?>
  <br>
  <h2>examens correspondants au ressources sélectionné</h2> 
    <ul>
        <?php
        foreach ($list as $examen) { ?>
        <li><?= $examen['titre'] ?> - <?= $examen['description'] ?> dt</li> 
        <?php }?>
    </ul>
   <?php } ?>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>         
</body>
</html>



