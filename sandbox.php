<?php 
 // echo $_SERVER['SERVER_NAME'] . '<br/>';

 // echo $_SERVER['REQUEST_METHOD'] . '<br/>';

 // echo $_SERVER['SCRIPT_FILENAME'] . '<br/>';

 //echo $_SERVER['SERVER_NAME'] . '<br/>';

if(isset($_POST['submit'])){


	session_start();

// store what the user enter in name input in session variable


	$_SESSION['name']=$_POST['name'];
    echo $_SESSION['name'];





};

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body>
 

 <form action="sandbox.php" method="POST">
 	
<input type="text" name="name" /> <br/>

<select name="gender">
	<option value="male">male</option>
	<option value="female">female</option>
</select>
<input type="submit" name="submit"  value="submit" />

 </form>

 </body>
 </html>
