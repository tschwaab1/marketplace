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

		$stmt= $link->prepare("Select o.id, o.title, o.descr, o.userid, o.price, u.email from user u, offer o where o.id = ? AND o.userid = u.id LIMIT 0,1;");
		$stmt->bind_param("i", $_GET['id']);

		$stmt->execute();

		$result = $stmt->get_result();

		$row = $result->fetch_assoc();


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
	</tr>";
  

?>

 </tbody>
</table>
<a class="btn btn-lg btn-primary" href="mailto:<?php echo $row['email'];?>" role="button">Contact Seller &raquo;</a>

</div>

<div class="jumbotron">
<h4>Comments</h4>

<table class="table table-borderless">
  <thead>
  </thead>
  </table>

    <?php

	$offerid = $_GET['id'];		

	$query_fetch = mysqli_query($link,"SELECT comment.text as text, user.username as username, comment.timestamp as timestamp FROM                                             comment JOIN user ON comment.userid=user.id WHERE comment.offerid = $offerid");
	
 	while($show = mysqli_fetch_array($query_fetch)){

		echo date('Y-m-d H:i:s',$show['timestamp'])." - by: ".$show["username"]."<br>".$show['text']."<hr/>";
		
		 
 	} // while loop brace
?>
</div>

<div class="jumbotron">  
  <br><br>

    <h4>Comments:</h4>
	
	<form method="POST" action = "comment.php?action=add&offerid=<?php echo $row['id'];?>">
	 <table class="table table-borderless">

		<tbody>
			<tr>
				<td><textarea name="comment" rows="4" cols="50"></textarea></td>
			</tr>
		</tbody>
	</table>
	
	 <br><br>
	 	<input type="submit" value="Submit">
		</form>
  </div>
  
</main>

<?php

//include footer
require_once('./assets/layout/footer.php');

?>