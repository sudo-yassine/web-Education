<?php
require_once  "C:/xampp/htdocs/projets/controllers/panierC.php";
require_once  "C:/xampp/htdocs/projets/models/panierM.php";
require_once  "C:/xampp/htdocs/projets/models/paniercop.php";
require_once  "C:xampp/htdocs/projets/config.php";
require_once  "C:/xampp/htdocs/projets/controllers/commandeC.php";

$panierC = new panierC();
$c = new commandeC();


if (isset($_POST["produit"], $_POST["price"])) {
    if (!empty($_POST["produit"]) && !empty($_POST["price"])) {
        // Sanitize user input
        $produit = htmlspecialchars($_POST['produit']);
        $price = floatval($_POST['price']); // Assuming it's a numeric value
        
        // Create a panier object with the incremented id_C
        $panier = new paniercop($produit, $price,null);

        // Add the panier to the database
        $panierC->addpaniercop($panier);

        // Uncomment the line below if you want to redirect to addcommande.php
        // header('Location:addcommande.php');
    }
}
?>

<!doctype html>
<html lang="en">

  <head>
    <title>shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   

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




      
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('images/Design.png')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h1 class="mb-3">Shop</h1>
              <p>it s all about coding </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
                <form action="addcommande.php" class="d-flex" class="subscribe">
                  <input type="submit" value="panier" class="btn btn-primary">
                </form>
              </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h3 class="scissors text-center">Store</h3>
          </div>
        </div>
       
        <div class="row hair-style">
       
           <div class="col-lg-4 col-md-4 col-sm-6 col-12">
        
            <a class="place">
            <form action="" method="POST">
            <img src="images/img1.png" alt="Image placeholder">
    <h2>JS</h2>
    <span>50 DT</span>

    <input type="hidden" name="produit" value="JS">
    <input type="hidden" name="price" value="50"> 
    <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="add panier">
            </form>
            </a>
           </div>

 
          <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <a class="place">
            <form action="" method="POST">
              <img src="images/img2.png" alt="Image placeholder" >
              <h2>HTML5</h2>
              <span>40 DT</span>
            
              <input type="hidden" id ="produit" name="produit" value="html5">
              <input type="hidden" id ="price" name="price" value="40">
            <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="add panier" >
            </form>
            </a>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <a class="place">
            <form action="" method="POST">
              <img src="images/img3.png" alt="Image placeholder" >
              <h2>CSS3</h2>
              <span>60 DT</span>
              <input type="hidden" id ="produit" name="produit" value="css3 ">
              <input type="hidden" id ="price" name="price" value="40">
            <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="add panier" >
           </form>
            </a>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <a class="place">
            <form action="" method="POST">
              <img src="images/2560px-Node.js_logo.svg.png" alt="Image placeholder" >
              <h2>node JS</h2>
              <span>80 DT</span>
            
              <input type="hidden" id ="produit" name="produit" value="node JS">
              <input type="hidden" id ="price" name="price" value="80">
            <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="add panier" >
            </form>
            </a>
          </div>
        </div>
        </form>
      </div>
 
    </div>
    <!-- END section -->


    



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

