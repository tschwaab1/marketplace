<?php
session_start();
 

if(!isset($_SESSION["isin"]) || $_SESSION["isin"] !== true){
    header("location: index.php");
    exit;
}
//check if session exists otherwise kick em out

require_once('./includes/config.php');


$sql = "SELECT id, title, descr, userid, price FROM `offer`;";

$result = mysqli_query($link, $sql);





?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Home</title>


    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/ccss/navbar-top-fixed.css" rel="stylesheet">
	<link href="./assets/ccss/modal.css" rel="stylesheet">
  </head>
  <body>

<?php
//Add Menu
require_once('./assets/layout/navbar_inside.php')


 ?>

<main role="main" class="container">
  <div class="jumbotron">
    <h1>Offer</h1>

  
  <table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>      
	  <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
 


<?php


if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	  
	  
	  
    echo "
	
	<tr>
      <th scope='row'>".$row['id']."</th>
      <td>".$row['title']."</td>
      <td title='Click on View to see the full Description'>".substr($row['descr'],0,90)." ...</td>
      <td>".$row['price']."</td>
	  <td><a href='./showOff.php?id=".$row['id']."'>View</a></td>
    </tr>
	
	
	";
  
  
  
  
  
  }
} else {
  echo "";
}



?>


  </tbody>
</table>

  </div>
</main>

<?php

//include footer
require_once('./assets/layout/footer.php');

?>