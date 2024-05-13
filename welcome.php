<?php

session_start();
if(!isset($_SESSION['logedin'])|| $_SESSION['logedin']!=true)
{
  header("location: login.php");
  exit;
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

    <title>Welcome</title>
<style>
    .box
    {
        height: 400px;
        
    }
    body
    {
        background-image: url("photos/bg4.jpg");
    }
    .head
    {
        margin-top:60px;
        color:white;
    }
    .payment
    {
        margin-top: 65px;
    }
    
</style>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <?php

    require 'partials/_nav_bar.php';
    ?>
    <?php
if(isset($_SESSION['logedin']) &&$_SESSION['logedin']==true )
echo '<div class="alert alert-success alert-dismissible fade show mb-0" style="height: 54px" role="alert">
            <p> You have successfully logged in as '. $_SESSION['username'].'.</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

?>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">

                <img src="photos/1.jpg" width="2000" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="photos/2.png" width="2000" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="photos/3.png" width="2000" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="box">
        
        <div class="head">
            <h4><b>Transfer Money</b></h4>
        </div>
        <div class="payment">



            <div class="card" style="width: 18rem;">
                <img src="photos/user-solid.svg" height="110" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">To Mobile Number</h5>
                    <a href="payment_mobile.php" class="btn btn-primary">Enter</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="photos/building-columns-solid.svg" height="110" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">To Bank/UPI ID</h5>

                    <a href="payment_bank_upi.php?upi=0" class="btn btn-primary">Enter</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="photos/piggy-bank-solid.svg" height="110" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Check balance</h5>

                    <a href="check_balance.php" class="btn btn-primary">Enter</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="photos/calendar-week-solid.svg" height="110" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Transaction History</h5>

                    <a href="transaction.php" class="btn btn-primary">Enter</a>
                </div>
            </div>
        </div>
        
    </div>

    <!-- <div class="container">
        <div class="alert alert-success my-4" role="alert">
            <h4 class="alert-heading"> Welcome-<?php echo $_SESSION['username']?>!</h4>
            <p> You have successfully logged in as <?php echo $_SESSION['username']?>.</p>
           
            <hr>
           
        </div>
    </div> -->
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