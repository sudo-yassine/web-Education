<?php
require_once "../controller/genreC.php";

$genreC = new genreC();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["genre"]) && isset($_POST["search"])) {
        $idGenre = $_POST["genre"];
        $list = $genreC->afficherAlbums($idGenre); 
    }
}
$genres = $genreC->afficherGenres();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recherche d'albums</title>
</head>
<body>
   <h1>Recherche d'albums par genre</h1> 
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="genre">Sélectionnez un genre :</label>
    <select name="genre" id="genre">
        <?php
        foreach ($genres as $genre) {
            echo '<option value="' . $genre['idGenre']. '">'. $genre['nom'] . '</option>';
        }
       ?>
    </select>
    <input type="submit" name="search" id="search">
   </form>

   <?php if (isset($list)) {?>
  <br>
  <h2>Albums correspondants au genre sélectionné</h2> 
    <ul>
        <?php
        foreach ($list as $album) { ?>
        <li><?= $album['titre'] ?> - <?= $album['prix'] ?> dt</li>
        <?php }?>
    </ul>
   <?php } ?>
</body>
</html>
