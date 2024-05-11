<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier</title>
    <!-- Ajouter Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
    background-image: url('resources/img/back.jpg');
    background-size: cover; /* Pour couvrir tout l'arrière-plan */
    background-position: center; /* Pour centrer l'image */
}
#exam-modal .modal-content {
    background-image: url('resources/img/back.jpg');
    background-size: cover; /* Pour couvrir tout l'arrière-plan */
    background-position: center; /* Pour centrer l'image */
}
    

    .month-column {
        float: left;
        width: 23%; /* Réduire légèrement la largeur pour compenser l'espace ajouté */
        margin-right: 2%;
    }
    .month-column h2 {
        font-size: 25px; /* Taille de police réduite */
        font-weight: bold; /* Gras */
        font-style: italic; /* Italique */
    }
    .month-column table {
        font-size: 12px; /* Taille de police réduite */
    }
    .month-column th, .month-column td {
        padding: 3px; /* Ajustement de la marge interne */
        text-align: center; /* Centrer le texte */
    }
    .row {
        clear: both; /* Pour forcer une nouvelle ligne après chaque groupe de colonnes */
    }
    .empty-cell {
        background-color: #ccc; /* Définissez la couleur de fond grise */
    }

    #calendarContainer {
        background: linear-gradient(90deg, rgb(234, 126, 145) 0%, rgb(139, 102, 241) 100%);
    }
    .has-exams {
    background-color: #76c7ed; /* Couleur de fond pour les cellules avec des examens */
    border-radius: 50%;
    width: 8px;
    height: 8px;
    display: inline-block;
    cursor: pointer;
    position: relative; /* Position relative pour les tooltips */
}
</style>

</head>
<body>
    <br>
    <br>
    <br>
    <br>

<div class="container-fluid mt-4">
    

    <!-- Boutons pour passer à l'année précédente et à l'année suivante -->
    
    <!-- Début du rectangle pour le calendrier -->
    <div class="border border-dark rounded p-4" id="calendarContainer">
        <?php
        // Inclure le fichier contenant la classe ExamenC
        require_once('../Controller/ExamenC.php');
        

        // Créer une instance de la classe ExamenC
        $examenC = new ExamenC();

        // Fonction pour obtenir les examens d'une date spécifique
        function getExamsByDate($date)
        {
            global $examenC;
            // Convertir la date au format MySQL (si nécessaire)
            $date = date('Y-m-d', strtotime($date));
            // Récupérer les examens de cette date
            $exams = $examenC->getExamsByDate($date);
            return $exams;
        }

        // Fonction pour générer le calendrier annuel
        function generateAnnualCalendar($year)
        {
            // Divisez les mois en groupes de quatre
            $months = array_chunk(range(1, 12), 3); // Modifier le nombre de mois par ligne ici
        
            // Boucle à travers chaque groupe de quatre mois
            foreach ($months as $monthGroup) {
                echo "<div class='month-column'>";
                foreach ($monthGroup as $month) {
                    // Afficher le mois et l'année actuels
                    echo "<h2 class='text-center " . strtolower(date('F', mktime(0, 0, 0, $month, 1, $year))) . "'>" . date('F', mktime(0, 0, 0, $month, 1, $year)) . " " . $year . "</h2>";
                    // Créer un tableau pour afficher le calendrier
                    echo "<table class='table table-bordered'>";
                    echo "<tr><th>Lun</th><th>Mar</th><th>Mer</th><th>Jeu</th><th>Ven</th><th>Sam</th><th>Dim</th></tr>";

                    // Nombre de jours dans le mois
                    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                    $firstDay = date('N', strtotime("$year-$month-01")); // Jour de la semaine du premier jour du mois
        
                    // Commencer la première ligne du calendrier
                    echo "<tr>";
                    // Remplir les cases vides jusqu'au premier jour du mois
                    for ($i = 1; $i < $firstDay; $i++) {
                        echo "<td class='empty-cell'></td>"; // Ajoutez la classe empty-cell ici pour les cases vides
                    }

                    // Boucle à travers les jours du mois
                    for ($day = 1; $day <= $daysInMonth; $day++) {
                        $date = "$year-$month-$day";
                        $exams = getExamsByDate($date); // Récupérer les examens pour cette date
        
                        // Ajouter une classe CSS si des examens sont présents ce jour
                        $class = !empty($exams) ? 'has-exams' : '';
                        $examTitles = implode(", ", array_column($exams, 'titre')); // Obtenez les titres des examens
        
                        // Afficher le jour dans une cellule de tableau avec la classe CSS appropriée
                        echo "<td class='$class' data-exams='" . htmlspecialchars(json_encode($exams)) . "'>";
                        echo "$day";
                        echo "</td>";

                        // Passer à la prochaine ligne chaque fois que nous atteignons la fin de la semaine
                        if (($day + $firstDay - 1) % 7 == 0) {
                            echo "</tr>";
                            if ($day < $daysInMonth) {
                                echo "<tr>";
                            }
                        }
                    }

                    // Remplir les cases vides jusqu'à la fin de la semaine
                    while (($day + $firstDay - 1) % 7 != 0) {
                        echo "<td class='empty-cell'></td>"; // Ajoutez la classe empty-cell ici pour les cases vides
                        $day++;
                    }

                    echo "</tr>";
                    echo "</table>";
                }
                echo "</div>";
            }
            echo "<div class='row'></div>"; // Créez une nouvelle ligne après chaque groupe de colonnes
        }
        ?>

        <!-- Appeler la fonction pour générer le calendrier annuel pour l'année actuelle -->
        <?php generateAnnualCalendar(date('Y')); ?>
    </div>
    <!-- Fin du rectangle pour le calendrier -->
</div>

<!-- Ajouter Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Ajoutez ce script JavaScript à la fin de votre page juste avant la balise de fermeture du corps -->
<script>
    

    // Fonction pour générer le calendrier annuel
    function generateAnnualCalendar(year) {
        // Mettre à jour l'attribut data-year
        document.getElementById('calendarContainer').setAttribute('data-year', year);
        // Contenu de la fonction generateAnnualCalendar()...
        // Placez le contenu de cette fonction ici ou incluez-le directement dans cette fonction
    }

    // Script pour afficher les détails de l'examen dans un modal
    document.addEventListener("DOMContentLoaded", function () {
        const cells = document.querySelectorAll('td.has-exams');
        cells.forEach(cell => {
            cell.addEventListener('click', function () {
                const exams = JSON.parse(this.getAttribute('data-exams'));
                if (exams && exams.length > 0) {
                    // Effacer le contenu précédent du modal
                    document.getElementById('exam-modal-body').innerHTML = '';
                    // Parcourir tous les examens et les afficher dans le modal
                    exams.forEach(exam => {
                        const examDetails = `
                        <div class="exam-details">
                            <p><strong>Titre:</strong> ${exam.titre}</p>
                            <p><strong>Type:</strong> ${exam.description}</p>
                            <p><strong>Heure:</strong> ${exam.duree}</p>
                            <p><strong>Date:</strong> ${exam.date_heure}</p>
                            <hr>
                        </div>`;
                        document.getElementById('exam-modal-body').innerHTML += examDetails;
                    });
                    // Afficher le modal
                    const modal = new bootstrap.Modal(document.getElementById('exam-modal'));
                    modal.show();
                }
            });
        });
    });
</script>

<!-- Modal pour afficher les détails de l'examen -->
<div class="modal fade" id="exam-modal" tabindex="-1" aria-labelledby="exam-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exam-modal-label">Détails de l'examen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="exam-modal-body">
                <!-- Les détails de l'examen seront affichés ici -->
            </div>
        </div>
    </div>
</div>

</body>
</html>
