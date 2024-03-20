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
    <title>cours</title>
    </head>
<body>
    <?php
    // Include the header content
    // include 'Header.php';
    ?>

    <div class="container">
        <div >
            <div >
                <span >tous les cours</span>
                <br>
               crud cours 
            </div>
            <!-- Button to trigger Add student offcanvas -->
            <button type="button" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                ajouter un cours
            </button>
        </div>

        <!-- Modal -->
        <div  id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="addStudentModalLabel">ajouter un cours</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div 
                        <div id="error">
                            <?php echo $error; ?>
                        </div>
                        <form method="POST" id="insertForm" action="addcours.php" enctype="multipart/form-data">
                            <div >
                                <div>
                                    <label >nom cours</label>
                                    <input type="text"  name="nom_cours" placeholder="nom du cours">
                                </div>
                                <div>
                                    <label >heures</label>
                                    <input type="text"  name="heurs" placeholder="nombre heures">
                                </div>
                                <div>
                                    <label >niveau</label>
                                    <input type="text" name="niveau" placeholder="niveau">
                                </div>
                                <div>
                                    <label >contenu</label>
                                    <input type="text"  name="contenu" placeholder="contenu">
                                </div>
                            </div>
                            <div>
                                <button type="submit"  id="insertBtn">Submit</button>
                                <button type="button"  data-bs-dismiss="modal">Cancel</button>
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
                    <th>nom cours</th>
                    <th>heures</th>
                    <th>niveau</th>
                    <th>contenu</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $cours) {
                ?>
                    <tr>
                        <td><?= $cours['id_cours']; ?></td>
                        <td><?= $cours['nom_cours']; ?></td>
                        <td><?= $cours['heures']; ?></td>
                        <td><?= $cours['niveau']; ?></td>
                        <td><?= $cours['contenu']; ?></td>
                        
                        <td align="center">

                            <a href="updatecours.php?id=<?php echo $student['id_cours']; ?>"><i></i>Update</a>
                            <a href="deletecours.php?id=<?php echo $cours['id_cours']; ?>"><i ></i>Delete</a>

                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>



</body>

</html>