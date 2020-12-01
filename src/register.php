<?php 
$servername = "localhost";
$database = "marketplace";
$username = "root";
$password = "";

$con = mysqli_connect($servername, $username , $password, $database) or die("Database not connected");

if (isset($_POST['create'])) {
  // receive all input values from the form
  $firstname =        trim($_POST['firstname']);
  $lastname =         trim($_POST['lastname']);
  $username =         trim($_POST['username']);
  $password =         trim($_POST['password']);
  $password_confirm = trim($_POST['password_confirm']); 
  $email =            trim($_POST['email']);
  $ip = $_SERVER['REMOTE_ADDR'];
  $regDa= date('Ymdhis');
  $errors = array(); 


  if (empty($firstname)) { array_push($errors, "Firstname is required"); }
  if (empty($lastname)) { array_push($errors, "Lastname is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (strlen($username) < 4 ) { array_push($errors, "Username should have at least four characters"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (strlen($password) < 4 ) { array_push($errors, "Password should have at least four characters"); }
  if ($password != $password_confirm) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE username='$username' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

    if (count($errors) == 0) {
    $query = "INSERT INTO user (id, firstName, lastName, username, password, email, ip, regDate)
    VALUES (NULL, '$firstname', '$lastname', '$username', '".md5($password)."', '$email' , '$ip', '$regDa')";
    

    if ($con->query($query) === TRUE) {
      echo "New record created successfully";
      header("location: index.php");
    } else {
      echo "Error: " . $query . "<br>" . $con->error;
    }
    
    $con->close();
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
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Register</title>

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
require_once('./assets/layout/navbar.php')


 ?>

<main role="main" class="container">
  <div class=".container-sm">   
	
	<form class="form-horizontal" action='' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Register</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="fname">First Name</label>
      <div class="controls">
        <input type="text" id="fname" name="fname" placeholder="" class="input-xlarge">
        <p class="help-block">fname can contain any letters or numbers, without spaces</p>
      </div>
    </div>   
	<div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="lname">Last Name</label>
      <div class="controls">
        <input type="text" id="lname" name="lname" placeholder="" class="input-xlarge">
        <p class="help-block">lname can contain any letters or numbers, without spaces</p>
      </div>
    </div>   
	<div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
        <p class="help-block">Username can contain any letters or numbers, without spaces</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
        <p class="help-block">Please provide your E-mail</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
        <p class="help-block">Password should be at least 4 characters</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
        <p class="help-block">Please confirm password</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Register</button>
      </div>
    </div>
   </fieldset>
  </form>
</div>
</main>




<?php

//include footer
require_once('./assets/layout/footer.php');

//Add Div for Login Popup on every page
require_once('./assets/layout/login_popup.php');
?>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
window.jQuery || document.write('<script src="./assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
</html>