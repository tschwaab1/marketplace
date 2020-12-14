<?php
session_start();
 
// Check if the user is already logged in
if(isset($_SESSION["isin"]) && $_SESSION["isin"] === true){
    header("location: home.php");
    exit;
}
 
require_once "./includes/config.php";
 
$username = $password = "";
$username_err = $password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
 
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    

    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT id, username, password FROM user WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
           
            $param_username = $username;
            
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if( md5($password) == $hashed_password){
                            
							// Password is correct, so start a new session
                            session_start();
                            
                            
                            $_SESSION["isin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            header("location: home.php");
                        } else{
                            
                            $password_err = "The password you entered was not valid.";
                        echo "<script> alert('".$password_err."');</script>";
						
						}
                    }
                } else{

                    $username_err = "No account found with that username.";
					echo "<script> alert('".$username_err."');</script>";
                }
            } else{
                echo "<script> alert('Oops! Something went wrong. Please try again later');</script>";
	
            }


            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>