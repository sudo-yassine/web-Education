<?php
require_once('../Controller/reclamationC.php');

$reclamationC = new ReclamationC();
$pourcentages = $reclamationC->calculerPourcentageReclamationsParType();

// Convertir les données PHP en format JavaScript pour l'utilisation avec Chart.js
$labels = json_encode(array_keys($pourcentages));
$data = json_encode(array_values($pourcentages));
?>

<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphique des pourcentages de réclamations par type</title>
    <!-- Inclure la bibliothèque Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Style pour la div conteneur */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh; /* Ajustez la hauteur selon vos préférences */
        }

        /* Style pour la div contenant le graphique */
        .graph-container {
            width: 800px; /* Largeur souhaitée */
            height: 600px; /* Hauteur souhaitée */
        }

        /* Style pour le graphique */
        #graphiqueReclamations {
            width: 100%; /* Remplir la largeur de la div parent */
            height: 100%; /* Remplir la hauteur de la div parent */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Statistiques par Type de Réclamation</h1>
        <div class="graph-container">
            <canvas id="graphiqueReclamations"></canvas>
        </div>
    </div>
    <a href="ListReclamation.php"><button>Retour</button></a>


    <script>
        // Récupérer les données PHP converties en JavaScript
        var labels = <?php echo $labels; ?>;
        var data = <?php echo $data; ?>;

        // Créer un nouveau graphique avec Chart.js
        var ctx = document.getElementById('graphiqueReclamations').getContext('2d');
        var graphiqueReclamations = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pourcentage de réclamations par type',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Pourcentage (%)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Type de réclamation'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>

