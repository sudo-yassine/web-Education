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
                <td class="align-middle">
                                            <a href="updateexamen.php?id_examen=<?= $examen['id_examen']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Update">
                                                Update
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <a href="deleteexamen.php?id_examen=<?= $examen['id_examen']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete">
                                                Delete
                                            </a>
                                        </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='8'>Aucun résultat trouvé.</td></tr>";
    }
}
?>
