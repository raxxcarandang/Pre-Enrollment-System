<?php 
define ('DB_SERVER', 'localhost'); 
define ('DB_USERNAME', 'root');
define ('DB_PASSWORD', '');
define ('DB_NAME', 'preenrollmentsystem');
try {
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($link === false) {
	die ("ERROR DATABASE NOT CONNECTED!" . mysqli_connect_error());
}
}
catch (Exception $connection){ 
	echo "<script>alert('Database Connection Error!');</script>";
}
?>