<?php
include '../controller/coursC.php';
$coursC = new coursC();
$list = $coursC->listcours();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/dashboard.css">
</head>
<body>
<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="resources/img/wisdomwave.png" alt="">
            </span>
            <div class="text logo-text">
                <span class="name">Wisdom Wave</span>
                <span class="profession">Dashboard</span>
            </div>
        </div>
        <i class="bx bx-chevron-right toggle"></i>
    </header>
    <div class="menu-bar">
        <div class="menu">
            <li class="search-box">
                <i class="bx bx-search icon"></i>
                <input type="text" placeholder="Search...">
            </li>
            <ul class="menu-links">
                <li class="nav-link">
                    <a href="dashboard.html">
                        <i class="bx bx-home-alt icon"></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="listUtilisateurs.php">
                        <i class="bx bx-bar-chart-alt-2 icon"></i>
                        <span class="text nav-text">Gestion Utilisateur</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="listcours.php">
                        <i class="bx bx-bell icon"></i>
                        <span class="text nav-text">Gestion Cours</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="listexamen.php">
                        <i class="bx bx-pie-chart-alt icon"></i>
                        <span class="text nav-text">Gestion Examen</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="ListRecrut.php">
                        <i class="bx bx-heart icon"></i>
                        <span class="text nav-text">Gestion Recrut</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class="bx bx-wallet icon"></i>
                        <span class="text nav-text">Gestion Achats</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="bottom-content">
            <li class="">
                <a href="#">
                    <i class="bx bx-log-out icon"></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>
            <li class="mode">
                <div class="sun-moon">
                    <i class="bx bx-moon icon moon"></i>
                    <i class="bx bx-sun icon sun"></i>
                </div>
                <span class="mode-text text">Dark mode</span>
                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>
        </div>
    </div>
</nav>
<section class="home">
    <div class="text">Gestion des Cours</div>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
            <div class="text-body-secondary">
                <span class="h5">Tous les cours</span>
                <br>
                CRUD cours
            </div>
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#addcoursModal">
                Ajouter un cours
            </button>
        </div>
        <div class="modal fade" id="addcoursModal" tabindex="-1" aria-labelledby="addcoursModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addcoursModalLabel">Ajouter un cours</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="insertForm" action="addcours.php">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Nom cours</label>
                                    <input type="text" class="form-control" name="nom_cours" placeholder="Nom du cours">
                                </div>
                                <div class="col">
                                    <label class="form-label">Heures</label>
                                    <input type="text" class="form-control" name="heures" placeholder="Nombre heures">
                                </div>
                                <div class="col">
                                    <label class="form-label">Niveau</label>
                                    <input type="text" class="form-control" name="niveau" placeholder="Niveau">
                                </div>
                                <div class="col">
                                    <label class="form-label">Contenu</label>
                                    <input type="text" class="form-control" name="contenu" placeholder="Contenu">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover align-middle" id="myTable" style="width:100%;">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom cours</th>
                    <th>Heures</th>
                    <th>Niveau</th>
                    <th>Contenu</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $cours) { ?>
                    <tr>
                        <td><?= $cours['id_cours']; ?></td>
                        <td><?= $cours['nom_cours']; ?></td>
                        <td><?= $cours['heures']; ?></td>
                        <td><?= $cours['niveau']; ?></td>
                        <td><?= $cours['contenu']; ?></td>
                        <td>
                            <a href="updatecours.php?id_cours=<?= $cours['id_cours']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Update</a>
                        </td>
                        <td>
                            <a href="deletecours.php?id_cours=<?= $cours['id_cours']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha3/js/bootstrap.bundle.min.js" integrity="sha384-2xz8+GMOkG+RVwNv5a3wuO/k9V70S6f4BPgF4EExe7HZb57FDq7IPISnBgLX1BTH" crossorigin="anonymous"></script>
<script>
    const toggle = document.querySelector(".toggle");
    const sidebar = document.querySelector(".sidebar");

    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });
</script>
</body>
</html>
