<?php
require_once "../controller/ExamenC.php";

$ExamenC = new ExamenC();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id_examen"]) && isset($_POST["search"])) {
        $id_examen = $_POST["id_examen"];
        $list = $ExamenC->afficherressources($id_examen); 
    }
}
$examen = $ExamenC->afficherexamens();
?>

<!DOCTYPE html>     
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recherche d'ressources</title>
</head>
<body>
   <h1>Recherche d'ressourcess par examen</h1> 
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="examen">Sélectionnez un examen :</label>
    <select name="examen" id="examen">
        <?php
        foreach ($examens as $examen) {
            echo '<option value="' . $examen['id_examen']. '">'. $examen['titre'] . '</option>';
        }
       ?>
    </select>
    <input type="submit" name="search" id="search">
   </form>

   <?php if (isset($list)) {?>
  <br>
  <h2>ressourcess correspondants au examen sélectionné</h2> 
    <ul>
        <?php
        foreach ($list as $ressources) { ?>
        <li><?= $ressources['description_examen'] ?> - <?= $ressources['livre'] ?> dt</li>
        <?php }?>
    </ul>
   <?php } ?>
</body>
</html>