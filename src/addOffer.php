<?php
session_start();
 

if(!isset($_SESSION["isin"]) || $_SESSION["isin"] !== true){
    header("location: index.php");
    exit;
}
//check if session exists otherwise kick em out

require_once('./includes/config.php');

if(isset($_GET['action']) AND $_GET['action'] == "add"){
	
	$title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
	$descr =  filter_var($_POST['descr'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$uID   = filter_var($_SESSION['id'], FILTER_SANITIZE_NUMBER_INT);
	
	$stmt = $link->prepare("INSERT INTO `offer` (`id`, `title`, `descr`, `userid`, `price`) VALUES (NULL, ?, ?, ?, ?)");
	$stmt->bind_param("ssii", $title, $descr, $uID, $price);
	//$stmt->execute();
	
	if($stmt->execute()){
			
			echo "<div class='alert alert-success' role='alert'>You have added ".$title." to our market!</div>";
			
	} else {
		
			echo '<div class="alert alert-danger" role="alert">Execute failed: (' . $stmt->errno . ') ' . $stmt->error.'</div>';
			
			//echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	//echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;	
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