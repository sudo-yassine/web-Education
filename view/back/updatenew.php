<?php
include "C:/xampp/htdocs/projets/controllers/commandeC.php";
$c = new commandeC();
$tab = $c->listcommande();
include 'C:/xampp/htdocs/projets/models/commande.php';

$commande = null;
$commandeC = new commandeC();

if (
    $_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST["firstname"]) &&
    isset($_POST["lastname"]) &&
    isset($_POST["email"]) &&
    isset($_POST["codep"]) &&
    isset($_POST["ville"]) &&
    isset($_POST["id_C"])
) {
    if (
        !empty($_POST["firstname"]) &&
        !empty($_POST["lastname"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["codep"]) &&
        !empty($_POST["ville"]) &&
        !empty($_POST["id_C"])
    ) {
        $id_C = htmlspecialchars($_POST["id_C"]);
        $firstname = htmlspecialchars($_POST["firstname"]);
        $lastname = htmlspecialchars($_POST["lastname"]);
        $email = htmlspecialchars($_POST["email"]);
        $codep = htmlspecialchars($_POST["codep"]);
        $ville = htmlspecialchars($_POST["ville"]);
        $num = htmlspecialchars($_POST["num"]);

        $commande = new Commande($firstname, $lastname, $email, $codep, $ville, $num);

        $commandeC->updatecommande($commande, $id_C);
        // Redirect to the list page after updating
        header('Location: back.php');
        exit();
    }
}

?>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <!-- <link rel="stylesheet" href="style.css" /> -->

    <!----===== Boxicons CSS ===== -->
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="resources/css/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!--<title>Dashboard Sidebar Menu</title>-->
  </head>
  <body>
    <nav class="sidebar close">
      <header>
        <div class="image-text">
          <span class="image">
            <img src="resources/img/wisdomwave.png" alt="">
          </span>

          <div class="text logo-text">
            <span class="name">wisdom Wave</span>
            <span class="profession">Dashboard</span>
          </div>
        </div>

        <i class="bx bx-chevron-right toggle"></i>
      </header>

      <div class="menu-bar">
        <div class="menu">
          <li class="search-box">
            <i class="bx bx-search icon"></i>
            <input type="text" placeholder="Search...">
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
      <div class="text">Dashboard home page</div>
      <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              
             
                <!-- /.d-flex -->

  
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Products</h3>
                <div class="card-tools">
                <a href="coirs.php" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="quant.php" class="btn btn-tool btn-sm">
                  <i >quantity</i>
                  </a>
                  <a href="lastC.php" class="btn btn-tool btn-sm">
                <i>last commande</i>    
                </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                  <th>id</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email </th>
                    <th>Code postal </th>
                    <th>ville </th>
                    <th>number </th>
                    <th>update</th>

                    <th>delete</th>
               


                  </tr>
                  </thead>
                  
              
                  <tbody>
                  
  <?php foreach($tab as $commande) { ?>
    <tr>
      <td><?=$commande['id_C'];?></td>
      <td><?=$commande['firstname'];?></td>
      <td><?=$commande['lastname'];?></td>
      <td><?=$commande['email'];?></td>
      <td><?=$commande['codep'];?></td>
      <td><?=$commande['ville'];?></td>
      <td><?=$commande['num'];?></td>
      <td><a href="updatenew.php?id_C=<?php echo $commande['id_C']; ?>">Update</a></td>    
      <td><a href="deletefn.php?id_C=<?php echo $commande['id_C']; ?>">Delete</a> </td>
    </tr>
  <?php } ?>

 
                  </tbody>
                </table>
              </div>
            </div>
            
            <!-- /.card -->
          </div>
          
          <!-- /.col-md-6 -->
  
          </div>
          <div class="col-md-4">
  <div class="card">
              <div class="card-header">
                <h3 class="card-title">update your commande</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" >
        
                    <a href="back.php"><i class="fas fa-times"></i></a>
                  </button>
                </div>
              </div>
              <?php
    if (isset($_GET['id_C'])) {
        $oldCommande = $commandeC->showcommande($_GET['id_C']);
    ?>
              <!-- /.card-header -->
              <form action="" method="POST">
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <li class="item">
                    <div class="product-info">
                      <a  class="product-title">id</a>
                      <input type="text" id="id_C" name="id_C" value="<?php echo $_GET['id_C'] ?>" readonly />
                      
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    
                    <div class="product-info">
                      <a  class="product-title">firstame</a>
    
                        <input type="text" id="firstname" name="firstname" value="<?php echo $oldCommande['firstname'] ?>" />
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    
                    <div class="product-info">
                      <a class="product-title">
                     Lastname 
                      </a>
                      <input type="text" id="lastname" name="lastname" value="<?php echo $oldCommande['lastname'] ?>" />
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    
                    <div class="product-info">
                      <a class="product-title">
                     email
                      </a>
                      <input type="text" id="email" name="email" value="<?php echo $oldCommande['email'] ?>" />
                    </div>
                  </li>
                  <li class="item">
                    
                    <div class="product-info">
                      <a class="product-title">CODE POSTAL
                       </a>
                       <input type="number" id="codep" name="codep" value="<?php echo $oldCommande['codep'] ?>" />
               
                    </div>
                  </li>
                  <li class="item">
                    
                    <div class="product-info">
                      <a class="product-title">VILLE
                       </a>
                       <input type="text" id="ville" name="ville" value="<?php echo $oldCommande['ville'] ?>" />
                    </div>
                  </li>
                 
                <li class="item">
                    
                    <div class="product-info">
                      <a class="product-title">
                     number
                      </a>
                      <input type="number" id="num" name="num" value="<?php echo $oldCommande['num'] ?>" />
                    </div>
                  </li>
                  <li class="item">
                  <div class="badge badge-warning float-right">
                    <input type="submit" value="Save" >
    </div>
                </li>
                  <!-- /.item -->
                </ul>
              </div>
    </form>
    <?php
    }
    ?>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
</div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>




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
  

</body></html>