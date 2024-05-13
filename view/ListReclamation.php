<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="resources/css/main.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Anton&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />

    <title>reclamation</title>
  </head>
  <body>
    <!-- Sticky header -->
    <header class="header-outer">
      <div class="header-inner responsive-wrapper">
        <div class="header-logo">
          <img src="resources/img/wisdomwave.png" />
        </div>
        <nav class="header-navigation">
          
    
      </div>
    </header>

    <main class="main">
<?php
include '../Controller/reclamationC.php';
$reclamationC = new reclamationC();
$list = $reclamationC->ListReclamtion();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reclamation</title>
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
    <?php
    // Include the header content
    // include 'Header.php';

    ?>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
            <div class="text-body-secondary">
                <span class="h5">All Reclamationsss</span>
                <br>
                Manage all your existing reclamations or add a new one
            </div>
            <!-- Button to trigger Add student offcanvas -->
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#addreclamationModal">
                Add new reclamation
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addreclamationModal" tabindex="-1" aria-labelledby="addreclamationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id_reclamation="addreclamationModalLabel">Ajout reclamation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       
                        <form method="POST" id="insertForm" action="Addreclamation.php" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">nom </label>
                                    <input type="text" class="form-control" name="nom" placeholder="Nom">
                                </div>

                                <div class="col">
                                    <label class="form-label">prenom</label>
                                    <input type="text" class="form-control" name="prenom" placeholder="prenom">
                                </div>

                                <div class="col">
                                    <label class="form-label">email</label>
                                    <input type="text" class="form-control" name="email" placeholder="username@server.domain">
                                </div>

                                <div class="col">
                                    <label class="form-label">telephone</label>
                                    <input type="text" class="form-control" name="telephone" placeholder="** *** ***">
                                </div>
<!--
                                <div class="col">
                                    <label class="form-label">typee</label>
                                    <input type="text" class="form-control" name="telephone" placeholder="** *** ***">
                                </div>
          -->                      
                                <div class="col">
                                    <label class="form-label">typee</label>
                                    <select name="typee" id="typee">
                                    <option value="site">site</option>
                                    <option value="cours">cours</option>
                                    <option value="bug">bug</option>
                                    <option value="others">others</option>
                                    </select>
                                </div>
                                
                                <div class="col">
                                    <label class="form-label">descp</label>
                                    <input type="text" class="form-control" name="descp" placeholder="Write here" id="input">
                                    <div id="errorDiv" class="text-danger"></div>
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
        
        <a href="TriC.php?order=ASC" class="btn btn-primary">Trier par ordre croissante</a>
        <a href="TriD.php?order=DESC" class="btn btn-primary">Trier par ordre décroissante</a>
    <!-- Bouton avec une icône pour ouvrir les statistiques -->
        <a href="stat.php" class="btn btn-primary"
            style="background-color:rgb(226, 112, 255); border-color: transparent; text-decoration: none;">
            <i class="bi bi-bar-chart-line"></i>

        </a>
        <script>
    function validateReponse(input) {
        var response = input.value.trim();
        var errorDiv = input.nextElementSibling;
        var regex = /^[\s\S]{1,330}$/;
        if (!regex.test(response)) {
            errorDiv.textContent = "Enter a valid text, do not exceed 300 characters.";
            return false;
        } else {
            errorDiv.textContent = "";
            return true;
        }
    }
</script>


        <table class="table table-bordered table-striped table-hover align-middle" id="myTable" style="width:100%;">
        <a href="pdf.php" target="_blank">Generate PDF</a>   
        <thead class="table-dark">
                <tr>
                    <th>nom</th>
                    
                    <th>prenom</th>               
                    <th>email</th>
                    <th>telephone</th>
                    <th>type</th>
                    <th>description</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $reclamation) {
                ?>
                    <tr>
                        <td><?= $reclamation['nom']; ?></td>
                        <td><?= $reclamation['prenom']; ?></td>
                        <td><?= $reclamation['email']; ?></td>
                        <td><?= $reclamation['telephone']; ?></td>
                        <td><?= $reclamation['typee']; ?></td>
                        <td><?= $reclamation['descp']; ?></td>

                        <td align="center">
                        <!--  
                            <a href="Updatereclamation.php?id_recurtement=<?php echo $reclamation['id_reclamation']; ?>" class="btn"><i class="fa-solid fa-pen-to-square fa-xl"></i>Update</a>
                            <a href="Deletereclamation.php?id_recurtement=<?php echo $reclamation['id_reclamation']; ?>" class="btn"><i class="fa-solid fa-trash fa-xl"></i>Delete</a>
                        -->
                        
                        <a href="Updatereclamation.php?id_reclamation=<?php echo $reclamation['id_reclamation']; ?>"><i ></i>Update</a> 
                        <a href="Deletereclamation.php?id_reclamation=<?php echo $reclamation['id_reclamation']; ?>"><i ></i>Delete</a>                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
 <!-- Bootstrap  -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Datatables  -->
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
    <!-- JS  -->
 

 