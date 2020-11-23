<?php 



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Fixed top navbar example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./assets/ccss/navbar-top-fixed.css" rel="stylesheet">
	<link href="./assets/ccss/modal.css" rel="stylesheet">
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
    <ul class="navbar-nav">
      <li class="nav-item <?php// if($_SERVER['SCRIPT_NAME'])?>active">
        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="document.getElementById('id01').style.display='block'">Login</a>
      </li>
    </ul>
  </div>
</nav>

<main role="main" class="container">
  <div class="jumbotron">
    <h1>Marketplace</h1>
    <p class="lead">Gwampate Sau, Vieh mit Haxn, Giftschbridzn, Knedlfressa, Ecknsteha, Schuibuamtratza, Sautreiba, Schwammal, Freibialädschn, Hämmoridenpritschn, Hausdracha, Bauantrampl, Schdehlratz, klebrigs Biaschal, Geizgroogn, Mistviach, Luada, Herrgoddsacklzementfixlujja, Saggrament, kropfata Hamml, Plotschn, du Ams’l, du bleede, gscherta Hamml, Besnbinda, Scheißbürschdl, Voiksdepp, Katzlmacha, krummhaxata Goaßbog, junga Hubbfa, Kittlschliaffa, ja, wo samma denn, i werd da zoagn, wo da Bartl an Most hoid, hoid dei Babbn, Schdeckalfisch, oida Daddara, Beißn, oide Schäwan, Kittlschliaffa, oide Rudschn, Wurznsepp, Schuggsn, Kasberl, i-Düpferl-Reita, Hopfastanga, Bauantrampl, Ratschkathl, Krautara, Eignbrödla, Erzdepp, Freindal!</p>
    <a class="btn btn-lg btn-primary" href="#" role="button">More Information &raquo;</a>
  </div>
</main>
<footer class="footer">
 <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="#"> SySec Group 02</a>
  </div>



</footer>
</body>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      
	  
	  <div id="id01" class="modal">
  
  <!--------Dingens HTML for Login Popup form--------->
  
  
  <form class="modal-content animate" action="./login.php" method="post">
 

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#727273">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form> 
</div>



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
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
</html>
