<?php

include('config/db_connect.php');


// write query for all pizza/write command
$sql='SELECT title,ingredient,id FROM  pizza2';

//make query $get result// issue the command
 $result =mysqli_query($conn, $sql);

// fetch the resulting rows as an array//get the data in format we need as associate array
 $pizzas=mysqli_fetch_all($result,MYSQLI_ASSOC);


// free result from memory
 mysqli_free_result($result);
 // close connection

 mysqli_close($conn);
   
// cycle through pizzas element as indivitual array using explode function
 //(explode(',', $pizzas[1]['ingredient]); an array we need to cycle 

     // print_r($pizzas);





  ?>


<!DOCTYPE html>
<html>

<?php  include('templates/header.php');?>

<h4 class="grey-text  center">Pizzas</h4>

<div class="container">

<div class="row">
   
 
 <?php foreach($pizzas as $pizza) :   ?>

<div class="col s6 md3">
  <div class="card z-depth-0">
    <div class="card-content center">
      <h4><?php echo htmlspecialchars($pizza['title']);  ?> </h4>
     <ul>
       
<?php foreach(explode(',', $pizza['ingredient']) as $ing) : ?>

<li> <?php echo htmlspecialchars($ing);  ?></li>

<?php  endforeach;?>

     </ul>
  </div>
  <div class="card-action right-align">
    <a  class="brand-text" href="details.php?id=<?php  echo $pizza['id']?>" >more info</a>



  </div>

</div>

</div>
<?php endforeach; ?>









  

</div>

</div>




<?php  include('templates/footer.php');?>




</html>