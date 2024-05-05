<?php
include_once '../controller/examenC.php';

if (isset($_GET['titre'])) {
    $titre = $_GET['titre'];
    $examenC = new examenC();
    $result = $examenC->searchExamenByTitre($titre);

    if ($result) {
        foreach ($result as $examen) {
            ?>
            <tr>
                <td><?= $examen['id_examen']; ?></td>
                <td><?= $examen['titre']; ?></td>
                <td><?= $examen['description']; ?></td>
                <td><?= $examen['duree']; ?></td>
                <td><?= $examen['difficulte']; ?></td>
                <td><?= $examen['date_heure']; ?></td>
                <td>
                    <a href="updateexamen.php?id_examen=<?= $examen['id_examen']; ?>" class="btn  btn-success"><i class="fa-solid fa-pen-to-square fa-xl"></i>Modifier</a>
                </td>
                <td>
                    <a href="deleteexamen.php?id_examen=<?= $examen['id_examen']; ?>" class="btn  btn-danger"><i class="fa-solid fa-trash fa-xl"></i>Supprimer</a>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='8'>Aucun résultat trouvé.</td></tr>";
    }
}
?>
