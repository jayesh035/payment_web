<?php
// session_start();
if(isset($_SESSION['username']) && $_SESSION['logedin']==true )
{
  $logedin=true;
}
else{
  $logedin=false;
}

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/LOGIN_SYS">iSecure</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/payment_web/welcome.php">Home</a>
        </li>';
        if(!$logedin)
        {
          echo '<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/payment_web/login.php">Log_in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/payment_web/sign_up.php">Sign_up</a>
        </li>';
        }
        else if($logedin)
        {
         echo '<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/payment_web/log_out.php">Log_out</a>
        </li>';
        }
        
        
     echo '</ul>

      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
        ';
      if($logedin)
      {

      
      echo ' <div class="profile">   
 <a href="/payment_web/profile.php"><img src="photos/dp2.jpg" id="dp" alt="" height="30" width="35"></a> 
</div>    

    </div>
  </div>';
      }
echo '</nav>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>

    <style>
    .profile {
        margin-left: 15px;
    }

    #dp {
        border-radius: 25px;
    }
    </style>
</head>

<body>

</body>

</html>