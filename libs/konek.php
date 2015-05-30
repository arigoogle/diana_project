<?php  

$host 		= "localhost";
$user 		= "root";
$pass		= "";
$dbname		= "db_diana";

// connect to server
mysql_connect($host, $user, $pass) or die('Server Offline');

// connect to database
mysql_select_db($dbname) or die('Database not found');


?>