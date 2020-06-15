<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "contact";

//Connecting to database
$conn = mysqli_connect($servername, $username, $password, $database);

//check if connected
if(!$conn){
    echo "Failed!";
}

          $showAlert = false;
          $showError = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // setting of variables
           $firstName = $_POST["fname"];
           $lastName = $_POST["lname"];
           $email = $_POST["email"];
           $mob = $_POST["phone"];

           $existSql = "SELECT * FROM user1 WHERE firstname = '$firstName' OR lastname = '$lastName' OR email = '$email' OR mobile = '$mob'";
           $result =  mysqli_query($conn, $existSql);
           $numExistRows = mysqli_num_rows($result);
              if($numExistRows > 0){
                 $showError = " Already Exists";
                 }
         else{
              //$sql = "INSERT INTO `user1` (`firstname`, `lastname`, `email`, `mobile`, `date') VALUES ('$firstname', '$lastname', '$email', '$mob', current_timestamp())";   
              $sql = "INSERT INTO `user1` (`firstname`, `lastname`, `email`, `mobile`, `date`) VALUES ( '$firstName', '$lastName', '$email', '$mob', current_timestamp())";
              $result = mysqli_query($conn, $sql);
           if($result){
            $showAlert = true; 
            }
            }
    }     

?>

<!doctype html>
<html lang="en">
  <head>
    
    <style>
    body,h1,nav,li,form{
        font-family: 'Sriracha', cursive;
    }
  </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/contactcss.css" rel="stylesheet" type="text/css">
    <title>
     Contact
    </title>
  </head>
  <body>
  <?php
 include "partials\_nav.php";
 ?>
 <div class="container">
<?php
if($showAlert){
 echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Success!</strong>Your details are Saved.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
        </button>
     </div>';
}
if($showError){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Error!</strong> '.$showError.'
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
 </button>
</div>';
}
?>
</div>
  <div class="container my-5">
 <div class="row ">
 <div class="col-md-6 ">
 <h1>Don't be a stranger</h1>
<h2>just say hello.</h2>
<i><p><sub>Feel free to get in touch with us. We are always open to<br> <br>discuss new projects,creative ideas or opportunities to<br><br> be a part of our visions.</sub></p></i>
<br><br><br>
<i><p><sub>Need help?</sub><br>
<strong>sinharishab100@gmail.com</strong></p>
<br><br><br>
<p><sub>Feel like talking</sub><br>
<strong>+91 8233101852<strong></p></i>
</div>
<div class="col-md-6 my-5" id="unique">
<section>
<form action="contact.php" method="POST">
<input type="text" name="fname"  placeholder="First Name" required></input><br><br>
<input type="text" name="lname" placeholder="Last Name" required></input><br><br>
<input type="email" name="email" placeholder="E-mail" required></input><br><br>
<input type="tel" name="phone" placeholder="Mobile No." required></input><br><br>
<button class="i1" type="submit">Send Over</button>
</form>
</section>
</div>
 </div>
 </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
