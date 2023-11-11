<?php
// connection of the the database
include('config/db_connect.php');

$email = $title = $ingredient = '';

$errors = array('email'=>'', 'title'=>'' , 'ingredient'=>'');

//check if there is an data/ variable has been passed in globall array using POST method (check submit variable has been submitted)
if(isset($_POST['submit'])){

 
 // echo htmlspecialchars$_POST['title'];
  // echo htmlspecialchars$_POST['ingredient'];

//check email  if it is empty or not

  if(empty($_POST['email'])){

    $errors['email']='email is required <br/>';
  }
else
{
  $email =$_POST['email'];
  //filter_var(value,built_in_function)
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $errors['email'] = 'email must be valid email address';
  }
}

// check title if it is empty or not
 if(empty($_POST['title'])){

   $errors['title']= 'title is required <br/>';
  }
else
{
   $title= $_POST['title'];
   if(!preg_match('/^[a-zA-Z\s]+$/', $title)){

     $errors['title']= "title must letter and spaces only";
   }


// check ingredient if it is empty or not 

}
// check ingredient
 if(empty($_POST['ingredient'])){

    $errors['ingredient']='ingredient is required <br/>';
  }
else
{
     $ingredient= $_POST['ingredient'];
   if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredient)){
$errors['ingredient']="title must be letters and spaces only";
}


}



if(array_filter($errors)){

  //echo 'there is an error';
}
else{

  //echo 'form is valid';
  //send data to database using mysqli_real_escape_string()=> pass connection and value you want to store to function as 

  $email= mysqli_real_escape_string($conn, $_POST['email']);

  $title= mysqli_real_escape_string($conn, $_POST['title']);

  $ingredient= mysqli_real_escape_string($conn, $_POST['ingredient']);


//create sql
  //insert data to table name you want 
//insert into pizza2 table and updates those columns and values for those columns

 $sql= "INSERT INTO pizza2(title,email,ingredient) VALUES ('$email', '$title', '$ingredient')";

// save it to db and check

if(mysqli_query($conn,$sql)){
  //success
  // redirect to home back if the connection successful 
  header('location:index.php');
}else{

  //error
  echo 'query error :' . mysql_error($conn);
}


  header('location:index.php');



}

}// end of POSTcheck





  ?>


<!DOCTYPE html>
<html>

<?php  include('templates/header.php');?>

<section class="container grey-text">
  
<h4 class="center">add pizza</h4>
<form class="white " action="add.php" method="POST">
 <label>your email:</label>
 <div class="red-text"> <?php echo $errors["email"];?>  </div> 
 <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>" />
  <label>pizza title:</label> 
   <div class="red-text"> <?php echo $errors["title"];?>  </div> 
 <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>"/>
  <label>ingredient(comma separated):</label> 
   <div class="red-text"> <?php echo $errors["ingredient"];?>  </div> 
 <input type="text" name="ingredient"  value="<?php echo htmlspecialchars($ingredient)?>"/>
<div class="center">
  
  <input  type="submit" name="submit" value="submit" class="btn grey-text z-depth-0" />
</div>


</form>


</section>











<?php  include('templates/footer.php'); ?>




</html>