<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
    <ul class="navbar-nav">
      <li class="nav-item <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'index.php') ? 'active' : '';?>">
        <a class="nav-link" href="./index.php">Home</a>
      </li>
      <li class="nav-item <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'about.php') ? 'active' : '';?>">
        <a class="nav-link" href="./about.php">About us</a>
      </li>
      <li class="nav-item <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'register.php') ? 'active' : '';?>">
        <a class="nav-link" href="./register.php">Sign Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="document.getElementById('id01').style.display='block'">Login</a>
      </li>
    </ul>
  </div>
</nav>