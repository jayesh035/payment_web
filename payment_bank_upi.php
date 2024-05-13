<?php
    require 'partials/_db_conn.php';
    // $through_upi=false;
    
?>

<?php
session_start();
    $showEror=False;
    $Enable=FALSE;
    $uname=$_SESSION['username'];
    $sql="SELECT * FROM `kyc_data` WHERE `username` LIKE '$uname'";
    $result=mysqli_query($conn,$sql);
    $numrows=mysqli_num_rows($result);
    if($numrows==1)
    {
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
        if($_SESSION['upi_method']==0)
        {
            $acno=$_POST['data'];
            $sql="SELECT * FROM `kyc_data` WHERE `account_no` = $acno";
            
        }
        else
        {
            $upi_data=$_POST['upi_data'];
            $sql="SELECT * FROM `kyc_data` WHERE `upi_id` LIKE '$upi_data'";
        }
        $result1=mysqli_query($conn,$sql);
        $numrows=mysqli_num_rows($result1);
        if($numrows==1)
        {
            $row=mysqli_fetch_assoc($result1);
            $password_enable=True;
            $_SESSION['mobile_number']=$mbnumber;
            $_SESSION['reciver_name']=$row['username'];
            $_SESSION['reciver_balance']=$row['account_balance'];
            header("location: make_payment.php");
            exit;
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

    <title>payment_upi_bank</title>
    <link rel="stylesheet" href="st3.css">
    <style>
    body {


        background-image: url("photos/bg5.jpg");
        background-size: 100% 100%;
        background-repeat: no-repeat;
    }

    .box {
        color: black;
        
        /* background-color:white; */
        color:white;
        border-radius: 4px;
    }
    .con
    {
        height: 650px;
    }
    </style>
    <!-- <link rel="stylesheet" href="style.css"> -->
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
    $err="Account No";
    // $get=0;
    if($_SESSION['upi_method']==1)
    {
        $err="upi id";
        // $get=0;
    }
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Oops!</strong>No '.$err.' found, please try another '.$err.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    
    </div>';
  
}
    
    ?>
   
<div class="con">
    <div class="box">
   <?php
   if($Enable)
   {
    $get=4;
    if($_SERVER['REQUEST_METHOD']=='GET')
    {
        $get=$_GET['upi'];
    }
    else if(isset($_SESSION['upi_method']))
    {
        $get=$_SESSION['upi_method'];
    }
    if($get==0)
    {
        $_SESSION['upi_method']=0;
        echo '<h4 class="my-4">For Accont</h4>
        <form action="payment_bank_upi.php" method="POST" >
      <div class="mb-3">
        <label for="acno" class="form-label ">Enter Acount No.</label>
        <input type="number" class="form-control" id="acno" name="data" aria-describedby="emailHelp">
      </div>
      <button type="submit" class="btn btn-primary">Enter</button>
      </form>';
      
    
    }
else if($get==1)
{
    $_SESSION['upi_method']=1;
    echo '<h4 class="my-4">For UPI</h4>
    <form action="payment_bank_upi.php" method="POST" >
  <div class="mb-3">
    <label for="upi" class="form-label ">Enter UPI</label>
    <input type="text" class="form-control" id="upi" name="upi_data" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Enter</button>
  </form>';
}



if($get==0)
{
  echo ' <div class="alert alert-success my-3" role="alert">
   <a href="payment_bank_upi.php?upi=1" class="alert-link">click here</a> for payment by UPI.
</div>';
}
if($get==1)
{
   echo ' <div class="alert alert-success my-3"   role="alert">
   <a href="payment_bank_upi.php?upi=0" class="alert-link">click here</a> for payment by account no.
</div>';
}
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