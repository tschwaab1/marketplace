# Marketplace
## Basic structure

We are using a modular system. This means Pages like about.php or index.php are separated into multiple parts. For example: The menu at the top is inside extra file (src/asstes/layout/navbar.php) and the Login-Popup HTML code is separated in src/assets/layout/login_popup.php. These files are included on every Page where they are needed, this makes changes to the menu, ... easier and you dont have to edit 20 files for 1 change.

## Create Database connection

To create a Database connection please include the "src/includes/config.php" by
```php
require_once "./includes/config.php";
```

In the config.php have been constant set with the creditials of the Database and there is already a database connection established with
```php
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
```

You just have to include the file as written above and use the $link Object variable like this:

```php
mysqli_query($link, "SELECT id,username,password FROM user WHERE password = ".$pass.";");
```
For an advanced use of the mysqli functions please have a look at the src/login.php and see my examples and look them in php.net-manual up:

```php
if(empty($username_err) && empty($password_err)){
   $sql = "SELECT id, username, password FROM user WHERE username = ?";
        
     if($stmt = mysqli_prepare($link, $sql)){
         mysqli_stmt_bind_param($stmt, "s", $param_username);
         $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){ 
                mysqli_stmt_store_result($stmt);
```
