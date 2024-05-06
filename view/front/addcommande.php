<?php
require_once "C:xampp/htdocs/projets/controllers/commandeC.php";
require_once "C:xampp/htdocs/projets/models/commande.php";
require_once "C:xampp/htdocs/projets/controllers/panierC.php";
require_once "C:xampp/htdocs/projets/models/panierM.php";
require_once "C:xampp/htdocs/projets/config.php";
require_once "C:xampp/htdocs/projets/models/paniercop.php";

$client=null;
$commande = null;
$commandeC = new commandeC();
$p = new panierC();
$c = new commandeC();
$o = new commandeC();
$commande = $o->afficherDerniereCommande();
$f=$p->countpriceco();


$y = $p->listpanierc();

if (
    isset($_POST["firstname"]) &&
    isset($_POST["lastname"]) &&
    isset($_POST["email"]) &&
    isset($_POST["codep"]) &&
    isset($_POST["ville"]) &&
    isset($_POST["num"])
) {
    if (
        !empty($_POST["firstname"]) &&
        !empty($_POST["lastname"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["codep"]) &&
        !empty($_POST["ville"]) &&
        !empty($_POST["num"])
    ) {
        $commande = new commande(
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['email'],
            $_POST['codep'],
            $_POST['ville'],
            $_POST['num'],
            null
        );
        $commandeC->addCommande($commande);
       

        // Get the y inserted ID from the commande table
       

        header('Location: uploadpdf.php');
        exit();
    }
   

}



?>


<!doctype html>
<html lang="en">
<script src="m.js"></script>
  <head>
    <title>education </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 innerpage overlay" style="background-image: url('images/Transport.png')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
                <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100"><span>Commande</span></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <img src="images/R (6).jpg" alt="Image" class="img-fluid mb-5">
           
          </div>
          <div class="row">
          <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                 
                    <th class="footer-heading mb-3">PRODUCTS</th>
                    <th  class="footer-heading mb-3"> PRICES</th>
                    <th  class="footer-heading mb-3"> You can delete a product</th>
                   
                   
               


                  </tr>
                  </thead>
                  
              
                  <tbody>
                  
                  <?php
if (!empty($y)) {
    foreach ($y as $row) {
?>
    <tr>
      <td> <p class="footer-heading mb-3"><?=$row['produit'];?></p></td>
      <td> <p class="footer-heading mb-3"><?=$row['price'];?> DT</p></td>
      <td><a href="deletep.php?id=<?php echo $row['id']; ?>">Delete</a> </td>
     
    </tr>
  <?php } 
  }?>
  <tr> 
   
  <td> <p class="footer-heading mb-3">Total price :  <?=$f;?> DT</p></td>
 
</tr>

 
                  </tbody>
                </table>
              </div>

        
 
                  </tbody>
                </table>
              </div>
             
              
           

</div>
      
        
              </div>

</div>

  
    <form action="" method="POST">
        <div class="form-group row">
            <div class="col-md-6 mb-4 mb-lg-0">
                <input type="text" class="form-control" placeholder="First name" name="firstname" id="firstname">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="last name" name="lastname" id="lastname">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Email adress" name="email" id="email">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 mb-4 mb-lg-0">
                <input type="text" class="form-control" placeholder="Code postal" name="codep" id="codep">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Ville" name="ville" id="ville">
            </div>
        </div>
        <div class="form-group row">
        <div class="col-md-12">
            <input type="text" class="form-control" placeholder="Your number" name="num" id="num">
        </div>
                  </div>
        <div class="form-group row">
            <div class="col-md-6 mr-auto">
                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Save"  onclick="validedatematch()">
            </div>
        </div>

    </form>
   
            

  
          </div>
          <!-- /.col-md-6 -->
        
              </div>
              
            </div>
          </div>
</div>


<!-- ... (remaining code) ... -->

       
        </div>
        </div>
     </div>
     
    </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>
