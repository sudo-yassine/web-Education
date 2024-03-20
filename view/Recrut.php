<?php
include '../Controller/RecrutC.php';
$RecrutC = new RecrutC();
$list = $RecrutC->listRecrut();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recrutement</title>
</head>

<body>
    <?php
    // Include the header content
    include 'Header.php';
    ?>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
            <div class="text-body-secondary">
                <span class="h5">All Recruts</span>
                <br>
                Manage all your existing Recrutements or add a new one
            </div>
            <!-- Button to trigger Add student offcanvas -->
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#addRecrutModal">
                Add new Recrutement
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addRecrutModal" tabindex="-1" aria-labelledby="addRecrutModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id_recrutement="addRecrutModalLabel">Ajout Recrut</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="error">
                            <?php echo $error; ?>
                        </div>
                        <!-- upload à changer-->
                        <form method="POST" id="insertForm" action="upload.php" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">date entretien/label>
                                    <input type="date" class="form-control" name="date_entretien" placeholder="JJ-MM-AAAA">
                                </div>
                                <div class="col">
                                    <label class="form-label">statu</label>
                                    <input type="text" class="form-control" name="statu" placeholder="">
                                </div>
                                <label class="form-label">cv/label>
                                    <input type="link" class="form-control" name="cv" placeholder="UPLOAD HERE">
                                </div>
                                <div class="col">
                                    <!-- question -->
                                </div>
                                <label class="form-label">reponse/label>
                                    <input type="text" class="form-control" name="reponse" placeholder="repondre ici">
                                </div>
                                <div class="col">
                                </div>          
                                <button type="submit" class="btn btn-primary me-1" id="insertBtn">Submit</button>
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
                    <th>#</th>
                    <th>date_entretien</th>
                    <th>statu</th>
                    <th>cv</th>
                    <th>reponse</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $Recrut) {
                ?>
                    <tr>
                        <td><?= $student['id_recurtement']; ?></td>
                        <td><?= $student['date_entretien']; ?></td>
                        <td><?= $student['statu']; ?></td>
                        <td><?= $student['cv']; ?></td>
                        <td><?= $student['reponse']; ?></td>
                        <td align="center">

                            <a href="UpdateRecrut.php?id=<?php echo $Recrut['id_recurtement']; ?>" class="btn"><i class="fa-solid fa-pen-to-square fa-xl"></i>Update</a>
                            <a href="DeleteRecrut.php?id=<?php echo $Recrut['id_recurtement']; ?>" class="btn"><i class="fa-solid fa-trash fa-xl"></i>Delete</a>

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