<?php
require 'partials/_db_conn.php';
session_start();

?>
<?php
// session_start();
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
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="st2.css">
    <title>Profile</title>
    <style>
      body
  {
    

    background-image:url("photos/tra.jpg");
    background-size: 100% 100%;
    background-repeat: no-repeat;
  }
  .box
{
    display: flex;
    align-items: center;
    /* justify-content: space-between; */
    height: 116px;
}
.box nav li
{
    list-style: none;
}
.box
{
    border-top: 2px solid white;
    border-bottom: 2px solid white;
}
.bank
{
    display: flex;
    align-items: center;
    height: 116px;
    border-top: 2px solid white;
}
.main-box
{
    margin-top: 60px;
    border: 2px solid white;
    
}
.container
{
    height: 600px;
}
  nav
  {
    color:white;
  }
  h4
  {
    color:white;
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
    <strong>Oops!</strong> you have to complete kyc form <a href="kyc.php">click here</a>to complete kyc.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    
}


 $sql="SELECT * FROM `kyc_data` WHERE `username`= '$uname'";
 $result=mysqli_query($conn,$sql);
 if(!$result)
 {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Oops!</strong> something is wrong 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
 }
while ($row=mysqli_fetch_assoc($result)) {
   echo ' <div class="container">
        <div class="main-box">
            <h4>About</h4>
            <div class="box">
                <div class="box1">
                    <nav>
                        <ul>
                            <li><b>Name:</b></li>
                            <li><b>Email:</b></li>
                            <li><b>Phone No:</b></li>
                        </ul>

                    </nav>
                </div>
                <div class="box2">
                    <nav>
                        <ul>
                            <li>'.$row['username'].'</li>
                            <li>'.$row['user_email'].'</li>
                            <li>'.$row['user_mobile_no'].'</li>
                        </ul>

                    </nav>

                </div>
            </div>

            <h4>Bank Details</h4>
            <div class="bank">
                <div class="b1">
                    <nav>
                        <ul>
                            <li><b>UPI ID:</b></li>
                            <li><b>Account No.:</b></li>

                        </ul>

                    </nav>
                </div>
                <div class="b2">
                    <nav>
                        <ul>
                        <li>'.$row['upi_id'].'</li>
                        <li>'.$row['account_no'].'</li>

                        </ul>

                    </nav>
                </div>
            </div>
        </div>';    
}

?>
    <!-- <div class="container">
        <div class="main-box">
            <h4>About</h4>
            <div class="box">
                <div class="box1">
                    <nav>
                        <ul>
                            <li><b>Name:</b></li>
                            <li><b>Email:</b></li>
                            <li><b>Phone No:</b></li>
                        </ul>

                    </nav>
                </div>
                <div class="box2">
                    <nav>
                        <ul>
                            <li>jayesh</li>
                            <li>kk</li>
                            <li>mm</li>
                        </ul>

                    </nav>

                </div>
            </div>

            <h4>Bank Details</h4>
            <div class="bank">
                <div class="b1">
                    <nav>
                        <ul>
                            <li><b>UPI ID:</b></li>
                            <li><b>Account No.:</b></li>

                        </ul>

                    </nav>
                </div>
                <div class="b2">
                    <nav>
                        <ul>
                            <li>349587</li>
                            <li>34057348956</li>

                        </ul>

                    </nav>
                </div>
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