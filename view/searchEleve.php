<?php
require_once "../Controller/eleveC.php";

$eleveC = new eleveC();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["eleve"]) && isset($_POST["search"])) {
        $Id_eleve = $_POST["eleve"];
        $list = $eleveC->affichereleve($Id_eleve); 
    }
}
$eleves = $eleveC->afficherutilisateur();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recherche d'eleves</title>
</head>
<body>
   <h1>Recherche d'eleve par utilisateur</h1> 
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="eleve">Sélectionnez un eleve :</label>
    <select name="eleve" id="eleve">
        <?php
        foreach ($eleves as $eleve) {
            echo '<option value="' . $eleve['Id_eleve']. '">'. $eleve['Nom'] . '</option>';
        }
       ?>
    </select>
    <input type="submit" name="search" id="search">
   </form>

   <?php if (isset($list)) {?>
  <br>
  <h2>Eleves correspondants au utilisateur sélectionné</h2> 
    <ul>
        <?php
        foreach ($list as $eleve) { ?>
        <li><?= $eleve['Nom'] ?> - <?= $eleve['Prenom'] ?> </li>
        <?php }?>
    </ul>
   <?php } ?>
</body>
</html>