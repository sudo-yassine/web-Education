<?php
include_once '../Controller/enseignantC.php';
$enseignantC = new enseignantC();
$list = $enseignantC->listenseignants(); // Assurez-vous que cette fonction renvoie les données correctement

function escape($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Enseignants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Liste des Enseignant</h2>
        <table class="table table-bordered table-striped table-hover align-middle" id="myTable">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Tél</th>
                    <th>Mot de passe</th>
                    <th>specialite</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $enseignant) {
                    echo '<tr>';
                    echo '<td>' . escape($enseignant['Id_utilisateur'] ) . '</td>';
                    echo '<td>' . escape($enseignant['Nom'] ) . '</td>';
                    echo '<td>' . escape($enseignant['Prenom']  ) . '</td>';
                    echo '<td>' . escape($enseignant['Email'] ) . '</td>';
                    echo '<td>' . escape($enseignant['Tel'] ) . '</td>';
                    echo '<td>' . escape($enseignant['Password'] ) . '</td>';
                    echo '<td>' . escape($enseignant['specialite'] ) . '</td>';
                    echo '<td><a href="updateEnseignant.php?Id_enseignant=' . escape($enseignant['Id_enseignant']) . '" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i> Modifier</a></td>';
                    echo '<td><a href="Deleteenseignant.php?Id_enseignant=' . escape($enseignant['Id_enseignant']) . '" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Supprimer</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
    
</body>
</html>
