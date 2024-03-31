<?php
include '../Controller/RecrutC.php';
$RecrutC = new RecrutC();
$list = $RecrutC->listrecrut();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recrutement</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Datatables CSS  -->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <!-- CSS  -->
    <link rel="stylesheet" href="./resources/css/style.css">

</head>

<body>
    <?php
    // Include the header content
    // include 'Header.php';

    ?>
    <nav class="sidebar close">
      <header>
        <div class="image-text">
          <span class="image">
            <!--<img src="logo.png" alt="">-->
          </span>

          <div class="text logo-text">
            <span class="name">Wisdom Wave</span>
            <span class="profession">Dashboard</span>
          </div>
        </div>

        <i class="bx bx-chevron-right toggle"></i>
      </header>

      <div class="menu-bar">
        <div class="menu">
          <li class="search-box">
            <i class="bx bx-search icon"></i>
            <input type="text" placeholder="Search..." />
          </li>

          <ul class="menu-links">
            <li class="nav-link">
              <a href="#">
                <i class="bx bx-home-alt icon"></i>
                <span class="text nav-text">Dashboard</span>
              </a>
            </li>

            <li class="nav-link">
              <a href="listUtilisateurs.php">
                <i class="bx bx-bar-chart-alt-2 icon"></i>
                <span class="text nav-text">Gestion Utilisateur</span>
              </a>
            </li>

            <li class="nav-link">
              <a href="listcours.php">
                <i class="bx bx-bell icon"></i>
                <span class="text nav-text">Gestion Cours</span>
              </a>
            </li>

            <li class="nav-link">
              <a href="listexamen.php">
                <i class="bx bx-pie-chart-alt icon"></i>
                <span class="text nav-text">Gestion Examen</span>
              </a>
            </li>

            <li class="nav-link">
              <a href="ListRecrut.php">
                <i class="bx bx-heart icon"></i>
                <span class="text nav-text">Gestion Recrut</span>
              </a>
            </li>

            <li class="nav-link">
              <a href="#">
                <i class="bx bx-wallet icon"></i>
                <span class="text nav-text">Gestion Achats</span>
              </a>
            </li>
          </ul>
        </div>

        <div class="bottom-content">
          <li class="">
            <a href="#">
              <i class="bx bx-log-out icon"></i>
              <span class="text nav-text">Logout</span>
            </a>
          </li>

          <li class="mode">
            <div class="sun-moon">
              <i class="bx bx-moon icon moon"></i>
              <i class="bx bx-sun icon sun"></i>
            </div>
            <span class="mode-text text">Dark mode</span>

            <div class="toggle-switch">
              <span class="switch"></span>
            </div>
          </li>
        </div>
      </div>
    </nav>

    <section class="home">
      <div class="text">Dashboard Sidebar</div>
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
                        <h5 class="modal-title" id_recrutement="addRecrutModalLabel">Ajout recrut</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       
                        <!-- upload à changer-->
                        <form method="POST" id="insertForm" action="AddRecrut.php" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">date entretien</label>
                                    <input type="date" class="form-control" name="date_entretien" placeholder="AAAA-MM-JJ">
                                </div>

                                <div class="col">
                                    <label class="form-label">cv</label>
                                    <input type="text" class="form-control" name="cv" placeholder="UPLOAD HERE">
                                </div>

                                <div class="col">
                                    <label class="form-label">reponse</label>                               
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
                    <th>cv</th>
                    <th>reponse</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $Recrut) {
                ?>
                    <tr>
                        <td><?= $Recrut['date_entretien']; ?></td>
                        <td><?= $Recrut['cv']; ?></td>
                        <td><?= $Recrut['reponse']; ?></td>
                        <td align="center">
                        <!--  
                            <a href="UpdateRecrut.php?id_recurtement=<?php echo $Recrut['id_recurtement']; ?>" class="btn"><i class="fa-solid fa-pen-to-square fa-xl"></i>Update</a>
                            <a href="DeleteRecrut.php?id_recurtement=<?php echo $Recrut['id_recurtement']; ?>" class="btn"><i class="fa-solid fa-trash fa-xl"></i>Delete</a>
                        -->
                        
                        <a href="UpdateRecrut.php?id_recrutement=<?php echo $Recrut['id_recrutement']; ?>"><i ></i>Update</a> 
                        <a href="DeleteRecrut.php?id_recrutement=<?php echo $Recrut['id_recrutement']; ?>"><i ></i>Delete</a>                        </td>
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
 
    <!----======== CSS ======== -->
    <!-- <link rel="stylesheet" href="style.css" /> -->

    <!----===== Boxicons CSS ===== -->
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="resources/css/dashboard.css" />

    </section>

    <script>
      const body = document.querySelector("body"),
        sidebar = body.querySelector("nav"),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");

      toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
      });

      searchBtn.addEventListener("click", () => {
        sidebar.classList.remove("close");
      });

      modeSwitch.addEventListener("click", () => {
        body.classList.toggle("dark");

        if (body.classList.contains("dark")) {
          modeText.innerText = "Light mode";
        } else {
          modeText.innerText = "Dark mode";
        }
      });
    </script>




    


    
</body>

</html>