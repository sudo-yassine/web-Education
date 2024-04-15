
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>List of achat</title>
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
<?php
include "../Controller/achatC.php";

$achat = new achatC();
$tab = $achat->list_achat();

?>

<center>
<header>
    <nav >
        <div>
        <h1>List of achat</h1>
          
        </div>
      </nav>
    </header>
    <h2>
        <a href="Addachat.php">Add achat</a>
    </h2>
</center>
<table border="1.5" align="center" width="70% ">
    <tr>
        <th>Id achat</th>
       <!-- <th>id claim</th>-->
        <th>nb_cours</th>
        <th>prix</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php
    foreach ($tab as $achat) {
    ?>

        <tr>
            <td><?= $achat['id_achat']; ?></td>
            <td><?= $achat['nb_cours']; ?></td>
            <td><?= $achat['prix']; ?></td>
            <td align="center">
                <form method="POST" action="updateachat.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $achat['id_achat']; ?> name="id_achat">
                </form>
            </td>
            <td>
            <form method="POST" action="deleteachat.php">
                    <input type="submit" name="delete" value="Delete">
                    <input type="hidden" value=<?PHP echo $achat['id_achat']; ?> name="id_achat">
                </form>
               
            </td>
        </tr>
    <?php
    }
    ?>
</table>
</body>