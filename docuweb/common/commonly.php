<?php
$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = ''; 
$DATABASE_PASS = ''; 
$DATABASE_NAME = '';
// The following code trys to connect using the information above
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, it stops and desplays the message below
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>
