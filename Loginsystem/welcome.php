<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
    header("location: login.php");
    exit;
}

?>
<!doctype html>
<html lang="en">
  <head>
  <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
  <style>
    body,h1,nav,li,form,h4,p{
        font-family: 'Sriracha', cursive;
    }
  </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title> Welcome - <?php echo $_SESSION['email'] ?></title>
  </head>
  <body>
  <?php
 include "partials\_nav.php";
 ?>
 <div class="container my-3">
 <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done! <?php echo $_SESSION['email']?></h4>
  <p>Welcome to <strong>MEkart</strong> a new Startup for your ease, you are <strong>Succesfully</strong> Logged in to our Website, Stay connected....</p>
  <hr>
</div>
</div>
  
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>