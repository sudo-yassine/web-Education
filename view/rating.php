<style> body {
  width: 100%;
  height: 100%;
  /* Add your background pattern here */
  background-color: #ffffff;
  background-image: radial-gradient(rgba(12, 12, 12, 0.171) 2px, transparent 0);
  background-size: 30px 30px;
  background-position: -5px -5px;
  
} </style>
</html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="resources/css/joinus.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Anton&display=swap"
      rel="stylesheet"
    />
    <title>home join us</title>
  </head>
  <body>
    <!-- Sticky header -->
    <header class="header-outer">
      <div class="header-inner responsive-wrapper">
        <div class="header-logo">
          <img src="resources/img/wisdomwave.png" />
        </div>
        <nav class="header-navigation">
          <a href="index.html">Home</a>
          <a href="#">About</a>
          <a href="#">Courses</a>
          <a href="#">Blog</a>
        </nav>
      </div>
    </header>

   
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Star Rating System</title>
<style>
    /* metier rating site */
    .rating {
        unicode-bidi: bidi-override;
        direction: rtl;
        text-align: center;
    }
    .rating input {
        display: none;
    }
    .rating label {
        display: inline-block;
        padding: 5px;
        font-size: 24px;
        color: #ccc;
        cursor: pointer;
    }
    .rating label:hover,
    .rating label:hover ~ label,
    .rating input:checked ~ label {
        color: #ffcc00;
    }
    
    /* Styles for comment section */
    #comment {
        margin-top: 20px;
    }
</style>
</head>
<body>
<center>

<h2>Star Rating System</h2>
<form id="ratingForm" method="post">
    <div class="rating">
        <input type="radio" id="star5" name="rating" value="5"><label for="star5">☆</label>
        <input type="radio" id="star4" name="rating" value="4"><label for="star4">☆</label>
        <input type="radio" id="star3" name="rating" value="3"><label for="star3">☆</label>
        <input type="radio" id="star2" name="rating" value="2"><label for="star2">☆</label>
        <input type="radio" id="star1" name="rating" value="1"><label for="star1">☆</label>
    </div>
    
    <div id="comment">
        <label for="commentText">Comment:</label><br>
        <textarea id="commentText" name="comment" rows="4" cols="50"></textarea>
    </div>
    
    <button type="submit" name="submit">Submit</button>
    <button type="button" onclick="cancel()">Cancel</button>
</form>

<?php
require_once('../Controller/reclamationC.php');


if(isset($_POST['submit'])) {
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $conn = config::getConnexion();

    $stmt = $conn->prepare("INSERT INTO rating (star, comment) VALUES (:star, :comment)");
    $stmt->bindParam(':star', $rating);
    $stmt->bindParam(':comment', $comment);
    
    if ($stmt->execute()) {
        echo "";
    } else {
        echo "Error: " . $stmt->error;
    }

}


?>

<script>
    function cancel() {
        document.getElementById("ratingForm").reset();
    }
</script>
</center>