<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mekart";

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
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $cpassword = $_POST["cpass"];
  
    $existSql = "SELECT * FROM user WHERE email = '$email'";
    $result =  mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "Username Already Exists";
    }
    else{
    if($password == $cpassword){
       $hpass=password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `user` (`email`, `password`, `date`) VALUES ('$email', '$hpass', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        if($result){
            $showAlert = true; 
        }
      }
        else{
            $showError = "Password do not match";
        }
  }
}
?>


<!doctype html>
<html lang="en">
  <head>
  <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
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

    <title>Sign up,Here!</title>
  </head>
  <body>
 <?php
 include "partials\_nav.php";
 ?>
<div class="container">
<?php
if($showAlert){
 echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Success!</strong>Your details are Saved and you can continue with Login.
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

    <h1 class="text-center my-5" style="color : red;">Sign up, Here!</h1>
    <div class="container">
    <form action="signup.php" method="POST">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="Enter your email" name ="email" aria-describedby="emailHelp" REQUIRED>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="pass">Password</label>
    <input type="password" class="form-control" id="pass" placeholder="Enter Password" name="pass" REQUIRED>
  </div>
  <div class="form-group">
    <label for="cpass">Confirm Password</label>
    <input type="password" class="form-control" id="cpass" placeholder="Enter Same Password" name="cpass" REQUIRED>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>