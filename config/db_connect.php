<?php 

$servername='localhost';
$username='nuurkey';
$password='';
$db='masternuurkey_pizza';


//connect to database
$conn=mysqli_connect($servername, $username ,$password, $db);


  //check the connection(if no connection print error message)
if(!$conn){
echo 'the connection error:' . mysqli_connect_error();
}



 ?>
