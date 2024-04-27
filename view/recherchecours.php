<?php
require_once "../Controller/coursC.php";

$coursC = new coursC();

// Handling the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["matiere"]) && isset($_POST["search"])) {
        $matiereId = $_POST["matiere"];
        $list = $coursC->affichercours($matiereId); 
    }
}
$matieres = $coursC->affichermatiere();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recherche de cours par matiere</title>
</head>
<body>
   <h1>Recherche de cours par matière</h1> 
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="matiere">Sélectionnez une matière :</label>
    <select name="matiere" id="matiere">
        <?php
        foreach ($matieres as $matiere) {
            echo '<option value="' . $matiere['id_matiere']. '">'. $matiere['nom_matiere'] . '</option>';
        }
       ?>
    </select>
    <input type="submit" name="search" id="search" value="Rechercher">
   </form>

   <?php if (isset($list)) {?>
  <br>
  <h2>Cours correspondants à la matière sélectionnée</h2> 
    <ul>
        <?php
        foreach ($list as $cours) { ?>
        <li><?= $cours['nom_cours'] ?> - <?= $cours['heures'] ?> heures</li>
        <?php }?>
    </ul>
   <?php } ?>
</body>
</html>
