<?php
$servername='localhost:3306';
$username='root';
$password='admin@123';
$dbname = "shoppingcart";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysqli_error());
}
?>