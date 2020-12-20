<?php
session_start();
 
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
} 

if(!isset($_SESSION["isin"]) || $_SESSION["isin"] !== true){
    header("location: index.php");
    exit;
}
//check if session exists otherwise kick em out

require_once('./includes/config.php');

if(isset($_GET['action']) AND $_GET['action'] == "add"){
	
	$title = $_POST['title'];
	$price = $_POST['price'];
	$descr = $_POST['descr'];
	$uID   = $_SESSION['id'];
   $errors = array();    
    
    if (empty($title)) {    alert("Title required!");}
    if (empty($price)) {    alert("Price required!");}


    
        $query = "INSERT INTO `offer` (`id`, `title`, `descr`, `userid`, `price`) 
    VALUES (NULL, '$title', '$descr', '$uID', '$price')";
		$result = mysqli_query($link, $query);
    
    
    if (count($errors) == 0) {

    

    if ($link->query($query) === TRUE) {
      echo "<div class='alert alert-success'><strong>You have added: " . $title .  " </strong> </div>";
    } else {
      echo "Error: " . $query . "<br>" . $link->error;
    }
    
    $link->close();
  } else {
    echo print_r($errors);
  }
    

	
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <h1>Add Offer</h1>

  <form method="POST" action="./addOffer.php?action=add">
  <table class="table table-borderless">

  <tbody>
 
	<tr>
		<td>Titel:</td>
		<td><input type="text" class="form-control" name="title" placeholder="Titel"></td>
	</tr>
		<tr>
		<td>Price:</td>
		<td><input type="text" class="form-control" name="price" placeholder="1337 €"></td>
	</tr>
		<tr>
		<td>Description:</td>
		<td><textarea class="form-control" name="descr" rows="3"></textarea></td>
	</tr>
		<tr>
		<td><button type="submit" class="btn btn-primary mb-2">Add</button></td>
		<td></td>
	</tr>



  </tbody>
</table>
</form>

</div>

  
</main>

<?php

//include footer
require_once('./assets/layout/footer.php');

?>