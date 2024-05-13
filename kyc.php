<?php

require 'partials/_db_conn.php'
?>
<?php
session_start();
$kyc=false;
$shower=false;
$showal=false;

if($_SERVER['REQUEST_METHOD']=="POST")
{

  $user_email=$_POST['email'];
  $user_mobile=$_POST['mobileno'];
  $user_acno=$_POST['acno'];
  $user_upi_id=$_POST['upi_id'];
  $user_balance=$_POST['balance'];
  $upi_password=$_POST['upi_password'];
  $cupi_password=$_POST['cupi_password'];
// $uname=$_SESSION['username'];
  if($upi_password == $cupi_password)
  {
    $name=$_SESSION['username'];
    $pass=password_hash($upi_password,PASSWORD_DEFAULT);
    $sql="INSERT INTO `kyc_data` (`username`, `user_email`, `user_mobile_no`, `account_no`, `upi_id`, `account_balance`, `user_password`, `time`) VALUES ('$name', '$user_email', '$user_mobile', '$user_acno', '$user_upi_id', '$user_balance', '$pass', current_timestamp())";
   
    $result=mysqli_query($conn,$sql);

    if($result)
    {
      $showal=true;
      $kyc=true;

    }
    else
    {
      $shower=true;
    }

  }
  else
  {
    $shower=true;
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
<link rel="stylesheet" href="st3.css">
<style>
  body
  {
    

    background-image:url("photos/bg1.jpg");
    background-size: 100% 100%;
  }
  .box
  {
    color:white;
  }
</style>
    <title>kyc</title>

    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>
    <?php

    require 'partials/_nav_bar.php';
    ?>

    <?php
    
    if($shower)
    {
      echo '<div class="alert alert-warning alert-dismissible fade show mb-0" style="height: 54px" role="alert">
            <p> Someting wrong in form .Please fill form again!</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    elseif ($showal) {
      echo '<div class="alert alert-success alert-dismissible fade show mb-0" style="height: 54px" role="alert">
            <p> Success!Your kyc details has been stored successfully.</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    
    ?>



    
    <div class="con my-4">
      <div class="box">
      <h1 class="text-center mb-6">Complete KYC</h1>
      <br>
      <br>
      <br>
        <form action="/payment_web/kyc.php" method="POST">
            <!-- <div class="mb-3">
    <label for="user_name" class="form-label ">username</label>
    <input type="text" class="form-control" id="user_name" name="username" aria-describedby="emailHelp">
    
  </div> -->
            
                <div class="mb-3">
                    <label for="user_email" class="form-label ">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>

                <div class="mb-3">
                    <label for="mobile_no" class="form-label ">Mobile No</label>
                    <input type="number" class="form-control" id="mobileno" name="mobileno"
                        aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="user_name" class="form-label ">Account No</label>
                    <input type="number" class="form-control" id="acno" name="acno" aria-describedby="emailHelp">

                </div>

                <div class="mb-3">
                    <label for="upi" class="form-label ">upi id</label>
                    <input type="text" class="form-control" id="upi_id" name="upi_id" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="balance" class="form-label">Balance</label>
                    <input type="number" class="form-control" name="balance" id="balance">
                </div>
                <div class="mb-3">
                    <label for="upassword" class="form-label">Upi Password</label>
                    <input type="password" class="form-control" name="upi_password" id="upi_password">
                </div>
                <div class="mb-3">
                    <label for="cupassword" class="form-label">conform Upi Password</label>
                    <input type="password" class="form-control" name="cupi_password" id="cupi_password">
                </div>
                <button type="submit" class="btn btn-primary">submit</button>
        </form>
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