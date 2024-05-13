<?php
session_start();
require 'partials/_db_conn.php';

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>transaction history</title>
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="st1.css">

    <style>
      body
  {
    

    background-image:url("photos/tra.jpg");
    background-size: 100% 100%;
    background-repeat: no-repeat;
  }
  .container
  {
    color:white;
    height: 800px;
  }
  .table
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
    <strong>Oops!</strong> you have to complete kyc form before payment <a href="kyc.php">click here</a>to complete kyc.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    
}
?>

<div class="container">
    <div class="head"><h4>Transaction History</h4></div>
    <div class="tbl">

<table class="table ">
  <thead>
    <tr>
      
      <th scope="col">Transaction id</th>
      <th scope="col">User name</th>
      <th scope="col">transaction type</th>
      <th scope="col">amount</th>
      <th scope="col">account balance</th>
      <th scope="col">Time</th>

    </tr>
  </thead>
  <tbody>
    <?php
    if($Enable)
    {

    
    $uname=$_SESSION['username'];
    $sql="SELECT * FROM `trancation_history` WHERE `user_name` LIKE '$uname'";
    $result=mysqli_query($conn,$sql);
    
    while ($row=mysqli_fetch_assoc($result)) {
       echo ' <tr>
        
        <td>'.$row['transaction_id'].'</td>
        <td>'.$row['user_type'].'</td>
        <td>'.$row['transaction_type'].'</td>
        <td>'.$row['amount'].'</td>
        <td>'.$row['account_balance'].'</td>
        <td>'.$row['transaction_time'].'</td>
      </tr>';
    }
    }

    ?>
  </tbody>
  
</table>
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