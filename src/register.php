<?php 

require_once "./includes/config.php";
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // receive all input values from the form
  $firstname =        trim($_POST['fname']); 
  $lastname =         trim($_POST['lname']);
  $username =         trim($_POST['username']);
  $password =         trim($_POST['password']);
  $password_confirm = trim($_POST['password_confirm']); 
  $email =            trim($_POST['email']);
  $ip = $_SERVER['REMOTE_ADDR'];
  $regDa= time();
  $errors = array(); 

//    validating inputs:
    if (empty($firstname)) {    alert("First Name required!");
                           die(); } 
    if (!ctype_alnum($firstname)) { alert("Please insert only alphanumerical characters!");  die(); } 
    
    if (empty($lastname)) { alert("Last Name required!");  die();}
    if (!ctype_alnum($lastname)) { alert("Please insert only alphanumerical characters!");  die(); } 
    
    if (empty($username)) { alert("Username required!");  die(); }
    if (!ctype_alnum($username)) { alert("Please insert only alphanumerical characters!");  die(); } 
    if (strlen($username) < 4 ) { alert("Username should have at least 4 characters");  die(); }
    
    if (empty($password)) { alert("Password required!");  die(); }
    if (!ctype_alnum($password)) { alert("Please insert only alphanumerical characters!");  die(); } 
    if (strlen($password) < 4 ) { alert("Password should have at least 4 alphanumerical characters!");  die(); }
    if ($password != $password_confirm) { alert("Passwords do not match!");  die(); }
    if (!ctype_alnum($password_confirm)) { alert("Please insert only alphanumerical characters!");  die(); } 
    
    
    if (empty($email)) { alert("Email required!");  die(); }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === true) {
       alert("Please insert a valid email address!");  die();
} 
    

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
    
        $stmt = $link->prepare("SELECT * FROM user WHERE username=? LIMIT 1");

		$stmt->bind_param("s", $username);

		$stmt->execute();

		$result = $stmt->get_result();

		$user = $result->fetch_assoc();
    
    
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }
    
 

    if (count($errors) == 0) {
    $safePassword= md5($password);
    
    $query = $link->prepare("INSERT INTO user (id, firstName, lastName, username, password, email, ip, regDate) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");
        
    $query->bind_param("ssssssi", $firstname, $lastname, $username, $safePassword, $email , $ip, $regDa);
    
    $query->execute();
        


    if ($query) {
     // alert("New record created successfully");
      //header("");
        
        //echo "Go <a href='./index.php'> back</a>";
        
        echo "<div class='alert alert-success'><strong>Account created!</strong> </div>";
        
        /*
        <div class='alert alert-success'><strong>Account created!</strong> </div>
        
        */
    } else {
      echo "Error: test" . $query->error;
    }
    
    $link->close();
  } else {
    //echo print_r($errors);
  }
    
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Register</title>

 

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
	
	<form class="form-horizontal" action='./register.php' method="POST">
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

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
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