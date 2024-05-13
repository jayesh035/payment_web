<?php
    $login=false;
    $showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    require 'partials/_db_conn.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
    

    
        
        $sql="select * from users where username='$username' ";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num==1)
        {
          while($raw=mysqli_fetch_assoc($result))
          {
            if(password_verify($password,$raw['password']))
            {
              $login=true;
              session_start();
              $_SESSION['logedin']=true;
              $_SESSION['username']=$username;
              header("location: welcome.php");
            }
            else
            {
              $showError="Invalid username or password";        
            }
           

          }
        }
    else{
      $showError="Invalid username or password";
    }
}



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="st3.css">
    <title>login</title>
    <style>
  body
  {
    

    background-image:url("photos/bg1.jpg");
    background-size: 100% 100%;
    background-repeat: no-repeat;
  }
  .box
  {
    color:white;
    height: 555px;
  }
</style>
  </head>
  <body>
    <?php

    require 'partials/_nav_bar.php';
    ?>
    <?php
    if($login)
    {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>success!</strong> you have successfully login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if($showError)
    {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Oops!</strong> '.$showError. '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }

?>
<div class="con">
  <div class="box">
    <h1 class="text-center">login to our website</h1>
    <form action="/payment_web/login.php" method="POST" >
  <div class="mb-3">
    <label for="user_name" class="form-label ">username</label>
    <input type="text" class="form-control" id="user_name" name="username" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>  
  <button type="submit" class="btn btn-primary">login</button>
</form>

</div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>