<?php
session_start();

require_once('./includes/config.php'); 

if(!isset($_SESSION["isin"]) || $_SESSION["isin"] !== true){
    header("location: index.php");
    exit;
}
//check if session exists otherwise kick em out

if(isset($_GET['action']) && $_GET['action'] == "add"){

    $userid = $_SESSION['id'];
    $offerid = $_GET['offerid'];
    $comment = $_POST['comment'];
    $time = time();


    $insert = "INSERT INTO `comment` (`id`, `text`, `userid`, `offerid`, `timestamp`) VALUES (NULL, '$comment', '$userid', '$offerid', '$time')";
     
    if ($link->query($insert) === TRUE) {
        header("location: market.php");
      } else {
        echo "Error: " . $insert . "<br>" . $link->error;
      }
      
   
}

?>