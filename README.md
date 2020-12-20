# Marketplace
## Basic structure

We are using a modular system. This means Pages like about.php or index.php are separated into multiple parts. For example: The menu at the top is inside extra file (src/asstes/layout/navbar.php) and the Login-Popup HTML code is separated in src/assets/layout/login_popup.php. These files are included on every Page where they are needed, this makes changes to the menu, ... easier and you dont have to edit 20 files for 1 change.

## Requirements

* Webserver(Apache2/nginx)
* PHP >= 7.4.3
* MariaDB >= 10.4.11

## Install the Marketplace
### Step 1: Create a Database, User & import the .sql file
1. Go to your DBMS(for example phpMyAdmin)
2. Create a new Databse and a new User(with or without Password) 
3. Select your Database in phpMyAdmin and import the db/marketplace.sql file

### Step 2: Edit config.php

Location of config.php's are src/includes/config.php & src_unsafe/includes/config.php

1. Open both files with your favourite editor
2. Now you will see something similar:

```php
<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'marketplace');
```
3. Enter your DB credentials here. For DB_USERNAME your DB user e.g. root, DB_PASSWORD your Password e.g. 12345 or empty, DB_NAME your Databasename e.g. marketplace
4. Save the files

### Step 3: Upload
Upload both folders (src and src_unsafe) to your e.g. htdocs directory (Also known as DocumentRoot).

Note: In case you are using XAMPP your DocumentRoot is normally located in "C:\xampp\htdocs" (Windows) or "/Applications/xampp/xamppfiles/htdocs" (Mac)

### Step 4: Access your installation
Go to your Domain "http://example.com/src" for the safe Version and "http://example.com/src_unsafe" for the unsafe version
or
in case you are using Xampp to "http://localhost/src" for the safe version or "http://localhost/src_unsafe" for the unsafe version.

Note: Of course the path where you find the script depends on where you copied or uploaded it. 

### Step 5: Login

There are two default Accounts and a few default Offers inside the marketplace.sql

Account#1
>User: admin
>Pass: admin

Account#2
>User: user
>Pass: user

Of course you're free to create your own Account and Offers! :)

## Visit our Online Version:

In case you only want to test the safe and unsafe version.

Go to http://marketplace.schwaab.bayern/src for the safe and http://marketplace.schwaab.bayern/src_unsafe for the unsafe Version.

Note: We set up our online Version src & src_unsafe with two different databases ;-)

