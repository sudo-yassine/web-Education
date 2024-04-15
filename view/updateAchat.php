<?php

include '../Controller/achatC.php';
include '../Model/achat.php';
$error = "";


$achat = null;

$achatC = new achatC();


if (
    isset($_POST["nb_cours"]) &&
    isset($_POST["prix"]) 
) {
    if (
        !empty($_POST["nb_cours"]) &&
        !empty($_POST["prix"]) 
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $achat = new achat(
            null,
            $_POST['nb_cours'],
            $_POST['prix']
        );
        
        
        $achatC->update_achat($achat, $_POST['id_achat']);

        header('Location:listAchat.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    <style>
        /* styles.css */

        header {
    opacity: 4;
    background-color: #df3afb;
padding: 15px; 
}
body {
    opacity: 0.5px;
    background-image: linear-gradient(to right,hsl(215, 92%, 15% ,0.8), hsl(215, 92%, 15% ,0.7)),url(Design1.png);
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    }


        h1 {
            text-align: center;
            margin-top: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 70%;
            margin: 0 auto;
            color:#f2f2f2;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color:hsl(215, 92%, 15% );
            font-weight: bold;
        }

      

        tr:hover {
            background-color: #00FF00;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #03224c;
        }

        /* Additional styles */
        

        h1 {
            color: white;
        }
        h2 a{
            color: white;
        }

    </style>
</head>

<body>
    
<header>
    <nav >
        <div>
       <h1> <a href="listAchat.php">Back to list</a></h1>
          
        </div>
      </nav>
    </header>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_achat'])) {
        $achat = $achatC->show_achat($_POST['id_achat']);
        
    ?>
 <div class="container">
        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="id_achat">Id_achat :</label></td>
                    <td>
                        <input type="text" id="id_achat" name="id_achat" value="<?php echo $_POST['id_achat'] ?>" readonly />
                        <span id="erreurid_achat" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nb_cours">nb_cours:</label></td>
                    <td>
                        <input type="text" id="nb_cours" name="nb_cours" value="<?php echo $achat['nb_cours'] ?>" />
                        <span id="erreurnb_cours" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prix">prix :</label></td>
                    <td>
                        <input type="text" id="prix" name="prix" value="<?php echo $achat['prix'] ?>" />
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
    <?php
    }
    ?>
</body>

</html>