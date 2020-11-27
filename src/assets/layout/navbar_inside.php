<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
    <ul class="navbar-nav">
      <li class="nav-item <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'home.php') ? 'active' : '';?>">
        <a class="nav-link" href="./home.php">Home</a>
      </li>
      <li class="nav-item <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'market.php') ? 'active' : '';?>">
        <a class="nav-link" href="./market.php">Marketplace</a>
      </li>
      <li class="nav-item <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'settings.php') ? 'active' : '';?>">
        <a class="nav-link" href="./settings.php">Settings</a>
      </li>
	  <li class="nav-item <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'logout.php') ? 'active' : '';?>">
        <a class="nav-link" href="./logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>