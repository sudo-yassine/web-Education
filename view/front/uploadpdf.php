<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générer PDF</title>
</head>
<body>
    <h1>Générer un PDF</h1>

    <div>
        <h2>commande</h2>
        <?php
        // Inclure les classes et fichiers nécessaires
        require_once 'C:/xampp/htdocs/projets/controllers/commandeC.php';
        require_once 'C:/xampp/htdocs/projets/controllers/panierC.php'; 
        require_once 'C:/xampp/htdocs/projets/config.php';
        require_once 'C:/xampp/htdocs/projets/views/front/dompdf/autoload.inc.php';

        // Récupérer l'ID de commande spécifique depuis les paramètres GET
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
        } else {
            echo("ID de commande non reçu.");
            exit;
        }
        echo($id);

        // Créer une instance de la classe Exam
        $examManager = new Exam();

        // Récupérer les détails de commande
        $examen = $examManager->getExamenById($pdo, $id);

        // Vérifier si commande existe
        if (!$examen) {
            echo "commande avec l'ID $id n'existe pas.";
            exit;
        }

        // Récupérer l'ID de la formation associée à cet examen
        $formationId = $examen->getFormationId();

        // Créer une instance de la classe Form
        $formManager = new Form();

        // Récupérer les détails de la formation associée à cet examen
        $formation = $formManager->getFormationById($pdo, $formationId);

        // Vérifier si la formation existe
        if (!$formation) {
            echo "commande avec l'ID $id n'existe pas.";
            exit;
        }
        ?>
        <p>ID  : <?php echo $examen->getId(); ?></p>
        <p>Nom  : <?php echo $examen->getNom(); ?></p>
        <p>prix : <?php echo $examen->getprix(); ?></p>
    </div>

    <div>
        <?php
        // Instancier Dompdf avec l'option 'enable_remote' activée
        $options = new Dompdf/Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf/Dompdf($options);

        // Charger le contenu HTML avec les détails de commande et de la formation
        $html = '<!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Formation et examen</title>
                <style>
                    body {
                        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 20px;
                    }
                    h1 {
                        font-size: 24px;
                        color: #a8324e;
                        margin-bottom: 20px;
                    }
                    h2 {
                        font-size: 20px;
                        margin-bottom: 10px;
                    }
                    p {
                        font-size: 16px;
                        margin-bottom: 5px;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 20px;
                    }
                    th, td {
                        border: 1px solid #000;
                        padding: 8px;
                        text-align: left;
                    }
                    th {
                        background-color: #3232a8;
                        color: #fff;
                    }
                </style>
            </head>
            <body>
                <div>
                    <h1>Foramtion et examen</h1>
                    <div>
                        <table>
                            <tr>
                                <th>'id_c de lexamen'</th>
                                <td>' . $examen->getid_C() . '</td>
                            </tr>
                            <tr>
                                <th>'Nom de lexamen'</th>
                                <td>' . $examen->getproduit() . '</td>
                            </tr>
                            <tr>
                                <th>'prix de l examen'</th>
                                <td>' . $examen->getPrice() . '</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </body>
            </html>';

        // Charger le HTML dans Dompdf et rendre le PDF
        $dompdf->loadHtml($html);

        // Rendre le PDF
        $dompdf->render();

        // Afficher le PDF dans le navigateur
        $dompdf->stream("commande_$id.pdf");
        ?>
    </div>
</body>
</html>
