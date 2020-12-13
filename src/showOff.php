<?php
session_start();
 

if(!isset($_SESSION["isin"]) || $_SESSION["isin"] !== true){
    header("location: index.php");
    exit;
}
//check if session exists otherwise kick em out

require_once('./includes/config.php');

	if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
		
		die("Error no offer selected! Or Invalid (no numeric) input parameter!");

}
//Param should now me numeric

$stmt = $link->prepare("SELECT id, title, descr, userid, price FROM `offer` WHERE id=?");

$stmt->bind_param("i", $_GET['id']);

$sql = "SELECT id, title, descr, userid, price FROM `offer`;";

$result = mysqli_query($link, $sql);

$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_assoc();

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

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/navbar-fixed/">

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
    <h1><?php echo $row['title'];?></h1>

  
  <table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">##</th>


    </tr>
  </thead>
  <tbody>
 


<?php

    echo "
	
	<tr>
		<td>Titel:</td>
		<td>".$row['title']."</td>
	</tr>
		<tr>
		<td>Description:</td>
		<td>".$row['descr']."</td>
	</tr>
		<tr>
		<td>Seller</td>
		<td>".$row['userid']."</td>
	</tr>
		<tr>
		<td>Price:</td>
		<td>".$row['price']."</td>
	</tr>


	
	
	";
  

?>


  </tbody>
</table>
<a class="btn btn-lg btn-primary" href="#" role="button">Contact Seller &raquo;</a>
  </div>
</main>

<?php

//include footer
require_once('./assets/layout/footer.php');

?>