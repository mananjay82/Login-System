<?php
  
    $loggedin = false;
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true){
        $loggedin = true;
    }


 echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <a class="navbar-brand" href="welcome.php">MEkart</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>

 <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <ul class="navbar-nav mr-auto">
     <li class="nav-item ">
       <a class="nav-link" href="welcome.php">Home <span class="sr-only">(current)</span></a>
     </li>';
     if(!$loggedin){
    echo'<li class="nav-item">
           <a class="nav-link" href="login.php">Login</a>
           </li>
           <li class="nav-item">
           <a class="nav-link" href="signup.php">Sign up</a>
        </li>';
     }

     else{
    echo ' <li class="nav-item">
         <a class="nav-link" href="logout.php">Log Out</a>
           </li>';
     }
     echo '<li class="nav-item ">
     <a class="nav-link" href="contact.php">Contact <span class="sr-only">(current)</span></a>
   </li>
   <li class="nav-item ">
     <a class="nav-link" href="portfolio.php">Portfolio <span class="sr-only">(current)</span></a>
   </li>
    </ul>
    </div>
   </nav>';

?>
