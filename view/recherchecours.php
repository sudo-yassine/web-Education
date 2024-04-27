<?php
require_once "../Controller/coursC.php";

$coursC = new coursC();

// Handling the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["matiere"])) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de cours par matiere</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .header {
            background-color: #6a0dad;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .footer {
            background-color: #6a0dad;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .subject-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 10px;
            cursor: pointer;
            transition: box-shadow 0.3s;
        }
        .subject-card:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        .subject-logo {
            width: 100px;
            height: 100px;
            margin: 20px auto;
        }
        .course-card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 10px;
            transition: box-shadow 0.3s;
        }
        .course-card:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Recherche de cours par matière</h1>
    </div>
    <div class="container mt-4">
        <div class="row">
            <?php 
            // Associative array mapping subject IDs to logo file names
            $subjectLogos = array(
                2 => 'https://img.freepik.com/premium-vector/calculator-icon-vector-design-templates_1172029-3367.jpg',
                3 => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4FRrhI0Cg69MEC53yw1Q7X5oEyqR8apZY1Pf-r4AVZA&s',
                4 => 'https://media.istockphoto.com/id/1225713087/vector/computer-monitor-with-keyboard-and-mouse-line-icon-smart-home-symbol-technology-vector-sign.jpg?s=612x612&w=0&k=20&c=VhIyfzh9PRk-La9NaeejH1IN2TqQKMDr3wuj0pG8e2U=',
                5=> 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuMX_c2_VtGwbvewFuyH66HiPqlncKyU59xtKtR3FLPA&s'
                // Add more entries for other subjects as needed
            );

            foreach ($matieres as $matiere) { ?>
            <div class="col-md-3">
                <div class="card subject-card" onclick="submitForm(<?= $matiere['id_matiere'] ?>)">
                    <img src="<?= $subjectLogos[$matiere['id_matiere']] ?>" class="card-img-top subject-logo" alt="Subject Logo">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $matiere['nom_matiere'] ?></h5>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <form id="submitForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="matiere" id="matiere">
        </form>

        <?php if (isset($list)) {?>
        <div class="mt-4">
            <h2 class="text-center">Cours correspondants à la matière sélectionnée</h2>
            <div class="row">
                <?php foreach ($list as $cours) { ?>
                <div class="col-md-4">
                    <div class="card course-card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $cours['nom_cours'] ?></h5>
                            <p class="card-text"><?= $cours['heures'] ?> heures</p>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="footer">
        <p>&copy; 2024 Educational Website. All Rights Reserved.</p>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function submitForm(matiereId) {
            document.getElementById("matiere").value = matiereId;
            document.getElementById("submitForm").submit();
        }
    </script>
</body>
</html>
