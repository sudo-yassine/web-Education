<?php



// Importations bécessaires
include '../Controller/achatC.php';
include '../Model/achat.php';

$error = "";

// create achat
$achat = null;

// create an instance of the controller
$achatC = new achatC();

if (
    isset($_POST["nb_cours"]) &&
    isset($_POST["prix"]) ) {
    if (
 
        !empty($_POST["nb_cours"]) &&
        !empty($_POST["prix"]) 
    ) {
        $achat = new achat(
            null,
            $_POST['nb_cours'],
            $_POST['prix']
            
        );

        $achatC->add_achat($achat);
        header('Location:listAchat.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> add achat </title>
    <style>
        header {
    opacity: 4;
    background-color: #e26e0e;
padding: 15px; 
}
body {
    opacity: 0.5px;
    background-image: linear-gradient(to right,hsl(215, 92%, 15% ,0.8), hsl(215, 92%, 15% ,0.7)),url(4.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color:black;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        nav div {
        display: flex; /* Permet d'aligner les éléments horizontalement */
        justify-content: space-around; /* Espacement égal entre les éléments */
        }
nav a {
            text-decoration: none;
            color: #dfd6d6 ; /* Couleur du texte */
            }
            
            nav a:hover {
            color: white; /* Couleur du texte en passant le curseur */
            border-bottom: 2px solid #fb470d; /* Ajoute une bordure au bas du mot */
            }
            .container form{
                width: 280px;
                position: absolute;
                top: 100px;
                left: 40px;
            
            }
        form button{
                width: 110px;
                height: 35px;
                margin: 0 10px;
                background: #03224c;
                border-radius: 30px;
                border: 0;
                outline: none;
                color: rgb(11, 12, 12);
                cursor: pointer;
                color: aliceblue;
            }
        

        button[type="submit"]:hover,
        button[type="reset"]:hover {
            background-color: #fb470d ;
        }
        .container {
                width: 360px;
                height: 400px;
                margin: 8% auto;
                background: #f0f0f2;
                border-radius: 5px;
                position: relative;
                overflow: hidden;
            
            }
        #error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
<header>
    <nav >
        <div>
        <h1><a href="listAchat.php">Back to list achat </a></h1>
          
        </div>
      </nav>
    </header>
 
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
    <div class="container">
    <form action="" method="POST" >
        <table>
            <tr>
                <td><label for="nb_cours">nb_cours:</label></td>
                <td>
                    <input type="nb_cours" id="nb_cours" name="nb_cours" />
                    <span id="erreurnb_cours" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="prix">prix :</label></td>
                <td>
                    <input type="text" id="prix" name="prix" />
                    <span id="erreurprix" style="color: red"></span>
                </td>
            </tr>
            <td>
                    <button type="submit" value="Save"> <strong>  SAVE </strong></button>
                </td>
                <td>
                <button type="reset" value="Save"> <strong>  RESET </strong></button>
                </td>
        </table>

    </form>
    </div>
</body>

</html>