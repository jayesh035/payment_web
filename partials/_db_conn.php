<?php
$username="root";
$password="";
$database="users";
$server="localhost";

$conn=mysqli_connect($server,$username,$password,$database);

if(!$conn)
{
    echo "Error".mysqli_connection_error();
}
// else{
//     echo "successfull";
// }

?>