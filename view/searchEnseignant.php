<?php
require_once "../Controller/enseignantC.php";

$enseignantC = new enseignantC();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["enseignant"]) && isset($_POST["search"])) {
        $Id_enseignant = $_POST["enseignant"];
        $list = $enseignantC->afficherenseignant($Id_enseignant); 
    }
}
$enseignants = $enseignantC->afficherutilisateur();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recherche d'enseignants</title>
</head>
<body>
   <h1>Recherche d'enseignant par utilisateur</h1> 
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="enseignant">Sélectionnez un enseignant :</label>
    <select name="enseignant" id="enseignant">
        <?php
        foreach ($enseignants as $enseignant) {
            echo '<option value="' . $enseignant['Id_enseignant']. '">'. $enseignant['Nom'] . '</option>';
        }
       ?>
    </select>
    <input type="submit" name="search" id="search">
   </form>

   <?php if (isset($list)) {?>
  <br>
  <h2>enseignants correspondants au utilisateur sélectionné</h2> 
    <ul>
        <?php
        foreach ($list as $enseignant) { ?>
        <li><?= $enseignant['Nom'] ?> - <?= $enseignant['Prenom'] ?> </li>
        <?php }?>
    </ul>
   <?php } ?>
</body>
</html>