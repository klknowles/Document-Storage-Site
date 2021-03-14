<?php
/** * This is where the code checks whether all the information inserted to login is correct.
*/
session_start();
// This is where your server information goes
$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'root'; 
$DATABASE_PASS = 'knowles1970'; 
$DATABASE_NAME = 'fakedb';
// The following code trys to connect using the information above
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, it stops and desplays the message below
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	//If could not get the data that should have been sent.
	die ('Please fill both the username and password field!');
}

// This will prepare our SQL.
if ($stmt = $con->prepare('SELECT id, password FROM registration WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
}

$stmt->store_result();
//Checkcs if user name exists
if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	if (password_verify($_POST['password'], $password)) {
		// Create sessions so we know the user is logged in.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $id;
		//After authenticating this takes us to the mainpage
		header('Location: ../pages/documentList.php');
	} else {
		echo 'Incorrect password!';
	}
} else {
	echo 'Incorrect username!';
}
$stmt->close();
?>