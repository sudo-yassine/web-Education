<?php
require_once('../Controller/coursC.php');

$reclamationC = new coursC();
$pourcentages = $reclamationC->functionstat();

// Convertir les données PHP en format JavaScript pour l'utilisation avec Chart.js
$labels = json_encode(array_keys($pourcentages));
$data = json_encode(array_values($pourcentages));
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recherche de cours par matiere</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="./resources/css/recherche.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        canvas {
            max-width: 100%;
            height: auto;
            margin: 0 auto;
            display: block;
        }


        .card1{
                --bs-card-spacer-y: 1rem;
    --bs-card-spacer-x: 1rem;
    --bs-card-title-spacer-y: 0.5rem;
    --bs-card-title-color: ;
    --bs-card-subtitle-color: ;
    --bs-card-border-width: var(--bs-border-width);
    --bs-card-border-color: var(--bs-border-color-translucent);
    --bs-card-border-radius: var(--bs-border-radius);
    --bs-card-box-shadow: ;
    --bs-card-inner-border-radius: calc(var(--bs-border-radius) - (var(--bs-border-width)));
    --bs-card-cap-padding-y: 0.5rem;
    --bs-card-cap-padding-x: 1rem;
    --bs-card-cap-bg: rgba(var(--bs-body-color-rgb), 0.03);
    --bs-card-cap-color: ;
    --bs-card-height: ;
    --bs-card-color: ;
    --bs-card-bg: var(--bs-body-bg);
    --bs-card-img-overlay-padding: 1rem;
    --bs-card-group-margin: 0.75rem;
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    height: 33pc;
    width: 55pc;
    word-wrap: break-word;
    background-color: var(--bs-card-bg);
    background-clip: border-box;
    border: var(--bs-card-border-width) solid var(--bs-card-border-color);
    border-radius: var(--bs-card-border-radius);
        }
    </style>
</head>

<body>
    <header class="header-outer">
        <div class="header-inner responsive-wrapper">
            <div class="header-logo">
                <img src="resources/img/wisdomwave.png" />
            </div>
            <nav class="header-navigation">
                <a href="#">Browse</a>
                <a href="#">Exam</a>
                <a href="#">Courses</a>
            </nav>
            <a href="index.html">
                <button class="button_join">Log Out</button>
            </a>
        </div>
    </header>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">Statistiques par heure de cours</h1>
            </div>
            <div class="col-lg-8 offset-lg-2">
                <div class="card1">
                    <div class="card-body">
                        <canvas id="graphiqueReclamations"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4 text-center">
                <a href="recherchecours.php" class="btn btn-primary">Retour</a>
            </div>
        </div>
    </div>

    <script>
        // Récupérer les données PHP converties en JavaScript
        var labels = <?php echo $labels; ?>;
        var data = <?php echo $data; ?>;

        // Créer un nouveau graphique avec Chart.js (Pie Chart)
        var ctx = document.getElementById('graphiqueReclamations').getContext('2d');
        var graphiqueReclamations = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pourcentage des heures par cours',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Pourcentage des heures par cours'
                    }
                }
            }
        });
    </script>
</body>

</html>
