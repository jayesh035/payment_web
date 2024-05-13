<?php
$showError=false;
require 'partials/_db_conn.php';
?>
<?php

session_start();
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $uname=$_SESSION['username'];
    $amt=$_POST['amount'];
    $password=$_POST['upassword'];
    
    // echo var_dump($password);
    // echo var_dump($uname);

    $sql="SELECT * FROM `kyc_data` WHERE `username`= '$uname'";
    $result=mysqli_query($conn,$sql);

    $num=mysqli_num_rows($result);
    if($num==1)
    {
        while( $row1=mysqli_fetch_assoc($result))
        {
            $sender_amt=$row1['account_balance'];
        //  echo var_dump( $row1['user_password']);
         if(password_verify($password,$row1['user_password']))
         {
         if($sender_amt>=$amt)
         {
             if(isset($_SESSION['reciver_name']))
             {
                 $new_sender_bal=$sender_amt-$amt;
                 $sender_name=$_SESSION['username'];
                 $reciver_name=$_SESSION['reciver_name'];
 
                 $new_reciver_bal=$_SESSION['reciver_balance']+$amt;
                 $new_sql="UPDATE `kyc_data` SET `account_balance` = '$new_sender_bal' WHERE `kyc_data`.`username`='$sender_name'";
                 $result1=mysqli_query($conn,$new_sql);
                 $new_sql1="UPDATE `kyc_data` SET `account_balance` = '$new_reciver_bal' WHERE `kyc_data`.`username`= '$reciver_name'";
                 $result2=mysqli_query($conn,$new_sql1);
                $tr1="INSERT INTO `trancation_history` ( `user_name`,`transaction_type`, `amount`, `user_type`,`account_balance`, `transaction_time`) VALUES ('$sender_name', 'send', '$amt', '$reciver_name','$new_sender_bal', current_timestamp())";
                $transaction1=mysqli_query($conn,$tr1);
                $tr2="INSERT INTO `trancation_history` ( `user_name`,`transaction_type`, `amount`, `user_type`,`account_balance`, `transaction_time`) VALUES ( '$reciver_name','recived', '$amt', '$sender_name','$new_reciver_bal', current_timestamp())";
                $transaction2=mysqli_query($conn,$tr2);

                if($result1)
                 {
                     
                    header("location:success.php");
                    exit;
                 }
                 else
                 {
                     $showError=mysqli_error($result1);
                 }
             }
             else
             {
                 $showError="something is wrong.";
             }
         }
         else{
             $showError="you have insufficient balance.";
         }
     }
     else
     {
         $showError="Password is wrong!";
     }
 
        }
    }
    else
    {
        $showError="something is wrong!";
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
    <title>make_payment</title>


<style>
        body {


       
background-image: url("photos/bg5.jpg");
background-size: 100% 100%;
background-repeat: no-repeat;
}
.con
{
    height: 650px;
    color:white;
}
</style>
</head>

<body>
    <?php
    require 'partials/_nav_bar.php';
    ?>
    <?php
    if($showError)
    {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oops!</strong> '.$showError.'please try again.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    
    ?>

    <div class="con">
        <div class="box">
        <h1 class="text-center">make payment</h1>
        <form action="make_payment.php" method="POST">
            <div class="mb-3">
                <label for="amount" class="form-label ">Enter Amount</label>
                <input type="number" class="form-control" id="amount" name="amount">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Enter Password</label>
                <input type="password" class="form-control" name="upassword" id="upassword">
            </div>
            <button type="submit" class="btn btn-primary">pay</button>
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