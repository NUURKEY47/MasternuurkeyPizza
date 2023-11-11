<?php 


include('config/db_connect.php');


if(isset($_POST['delete'])){

$id_to_delete= mysqli_real_escape_string($conn, $_POST['id_to_delete']);

$sql= "DELETE FROM pizza2 WHERE id=$id_to_delete";

if(mysqli_query($conn,$sql)){
//success
  // redirect if it success

header('location:index.php');
}  {
echo 'query error:' . mysqli_error($conn);

}


}










//check GET request id param

if(isset($_GET['id'])){

  $id= mysqli_real_escape_string($conn, $_GET['id']);

//make sql
  $sql="SELECT *FROM pizza2 WHERE Id = $id";
  // get query result

  $result=mysqli_query($conn,$sql);
  // fetch result in array format

  $pizza=mysqli_fetch_assoc($result);

// free result from memory
  mysqli_free_result($result);
  mysqli_close($conn);

}











 ?>
 <!DOCTYPE html>
 <html>
 
<?php  include('templates/header.php');?>
<div class="container center">
<?php if($pizza) : ?>
<h4><?php echo htmlspecialchars($pizza['title']);?>"</h4>
<p> created:<?php echo htmlspecialchars($pizza['email']); ?>"</p>
<p><?php  echo date($pizza['created_at']);?></p>
<h5>ingredient</h5>
<p><?php echo htmlspecialchars($pizza['ingredient']);?>"</p>
<!-- DELETE FORM-->
<form class="" action="details.php" method="POST">
  <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
  <input type="submit" name="delete" value= "delete" class=" btn brand z-depth-0">


</form>

<?php else: ?>
	<h5> no such pizza exist</h5>

<?php endif; ?>

</div>



<?php  include('templates/footer.php');?>
 </html>