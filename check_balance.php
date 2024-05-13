<?php
    require 'partials/_db_conn.php';
?>

<?php
session_start();
    $showEror=False;
    $Enable=FALSE;
    $uname=$_SESSION['username'];
    $sql="SELECT * FROM `kyc_data` WHERE `username` LIKE '$uname'";
    $result=mysqli_query($conn,$sql);
    $numrows=mysqli_num_rows($result);
    $en=false;
    if($numrows==1)
    {
        while ($row=mysqli_fetch_assoc($result)) {
           $upass=$row['user_password'];
           $amt=$row['account_balance'];
        }
        $Enable=True;
    
    }
    else
    {
        $showEror=True;
    }
?>
    
     <?php
     $showEror1=FALSE;
     $password_enable=FALSE;
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $pass=$_POST['upi'];
        if(password_verify($pass,$upass))
        {

          $en=true;
        }
        else{
            $showEror1=TRUE;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>payment_mobile</title>
<link rel="stylesheet" href="st3.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
    body {


       
        background-image: url("photos/bg5.jpg");
        background-size: 100% 100%;
        background-repeat: no-repeat;
        
    }

    .con {
        color: white;
        height: 700px;
    }
    </style>
</head>

<body>
    <?php

    require 'partials/_nav_bar.php';
    ?>
    <?php

if($showEror)
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Oops!</strong> you have to complete kyc form before payment <a href="kyc.php">click here</a>to complete kyc.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    
}
if($showEror1)
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Oops!</strong>password is wrong.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

}
    
if($en){
    echo '
    <div class="alert alert-success" role="alert">
<h4 class="alert-heading">ACCOUNT BALANCE:'.$amt.'</h4>


</div>';
   }
    ?>
    
<div class="con">
   <?php
  
   if($Enable)
   {
    echo '<form action="check_balance.php" method="POST" >
  <div class="mb-3">
    <label for="mnum" class="form-label ">Enter UPI Passwod</label>
    <input type="number" class="form-control" id="upi" name="upi" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Enter</button>
  </form>';
   }




   ?>



</div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>