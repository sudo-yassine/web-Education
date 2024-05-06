<?php
include '../Controller/ratingC.php';
$ratingC = new ratingC();
$list = $ratingC->ListRating();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RATING</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Datatables CSS  -->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <!-- CSS  -->
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
            <div class="text-body-secondary">
                <span class="h5">ADMIN Ratings</span>
                <br>
                Manage all your existing ratings or add a new one
            </div>
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#addRatingModal">
                Add new rating
            </button>
        </div>

        <div class="modal fade" id="addRatingModal" tabindex="-1" aria-labelledby="addRatingModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addRatingModalLabel">Add Rating</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="insertForm" action="AddRating.php" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">ID Rating</label>
                                    <input type="number" class="form-control" name="id_rating" placeholder="ID Rating">
                                </div>

                                <div class="col">
                                    <label class="form-label">Stars</label>
                                    <input type="number" class="form-control" name="star" placeholder="Stars">
                                </div>

                                <div class="col">
                                    <label class="form-label">Comment</label>
                                    <input type="text" class="form-control" name="comment" placeholder="Comment">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-1" id="insertBtn">Submit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped table-hover align-middle" id="myTable" style="width:100%;">
            <thead class="table-dark">
                <tr>
                    <th>ID Rating</th>
                    <th>Stars</th>
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $Rating) { ?>
                    <tr>
                        <td><?= $Rating['id_rating']; ?></td>
                        <td><?= $Rating['star']; ?></td>
                        <td><?= $Rating['comment']; ?></td>
                        <td align="center">
                            <a href="UpdateRating.php?id_rating=<?= $Rating['id_rating']; ?>">Update</a>
                            <a href="DeleteRating.php?id_rating=<?= $Rating['id_rating']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Datatables  -->
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
</body>

</html>
