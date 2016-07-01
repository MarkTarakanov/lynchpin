<?php
session_start();
$message = '';
	//connect to db, IF the name and password are submited
if (isset($_POST['name']) && isset($_POST['password'])) {
	// Connection handle
	$db = mysqli_connect('localhost', 'Mark Tarakanov', 'topsecret', 'Users');
	// Create SQL command using sprintf: %s means string
	$sql = sprintf("SELECT * FROM users WHERE username = '%s'",
		mysqli_real_escape_string($db, $_POST['name'])
		);
	// Execure the SQL command
	$result = mysqli_query($db, $sql);
	// Get associative array
	$row = mysqli_fetch_assoc($result);

	// What's going on here?!
	if ($row) {
		$password = $row['password'];
		// password_verify function isn't implemented!!!
		if (password_verify($_POST['password'])) {
			$message = 'Login successful.';

		} else {
		$message =  'Login failed.';
		}
	} else {
		$message = 'Login failed.';
	}

	// Here is how I would do it:
	/*
	// Check if the username even exists
	if (mysqli_num_rows($result) === 0)
    {
        $message = "The username is invalid. Please try again, or sign up.";
    }
    else
    {
    	// Get associative array of user info (username, password, etc.)
		$passArr = mysqli_fetch_assoc($result);

		// NOTE: associative arrays consist of key-value pairs. In this case, keys are "username", "password", etc. Values would be "mark", "topsecret", etc.

		// Get password from the array
		$password = $passArr['password'];

		// Check if password provided by user matches the one from the DB
		if ($_POST['password'] === $password) {
			// Success!!!
			$message = 'Login successful.';
		} else {
			// Not success =(
			$message = "Invalid password. Please try again, or request a new one.";
		}
    }
    */

	mysqli_close($db);
}	
// I always get login failed... what do I do?
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lynchpin</title>
</head>
<?php
 echo "<p>$message</p>";
?>
<body>
  <form method="post" action="">
  User name <input type="text" name="name"><br>
  Password <input type="password" name="password"><br>
  <input type="submit" value="Login">
  </form>
</body>
</html>
