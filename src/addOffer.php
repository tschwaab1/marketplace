<?php
session_start();
 

if(!isset($_SESSION["isin"]) || $_SESSION["isin"] !== true){
    header("location: index.php");
    exit;
}
//check if session exists otherwise kick em out

require_once('./includes/config.php');

if(isset($_GET['action']) AND $_GET['action'] == "add"){
	
	
	
}

//Param should now me numeric
/* 
		$stmt = $link->prepare("SELECT id, title, descr, userid, price FROM `offer` WHERE id=?");

		$stmt->bind_param("i", $_GET['id']);

		$sql = "SELECT id, title, descr, userid, price FROM `offer`;";

		$result = mysqli_query($link, $sql);

		$stmt->execute();

		$result = $stmt->get_result();

		$row = $result->fetch_assoc();
 */
//var_dump($row);


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
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
    <h1><?php// echo $row['title'];?></h1>

  <form method="POST" action="./addOffer.php?action=add">
  <table class="table table-borderless">

  <tbody>
 
	<tr>
		<td>Titel:</td>
		<td><input type="text" class="form-control" id="title" placeholder="Titel"></td>
	</tr>
		<tr>
		<td>Preis:</td>
		<td><input type="text" class="form-control" id="price" placeholder="1337 €"></td>
	</tr>
		<tr>
		<td>Beschreibung:</td>
		<td><textarea class="form-control" id="descr" rows="3"></textarea></td>
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