<?php
session_start();
$message = '';
	//connect to db, IF the name and password are submited
if (isset($_POST['name']) && isset($_POST['password'])) {
	$db = mysqli_connect('localhost', 'Mark Tarakanov', 'topsecret', 'Users');
	$sql = sprintf("SELECT * FROM users WHERE username = '%name'",
		mysqli_real_escape_string($db, $_POST[name])
		);
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_assoc($result);
	if ($row) {
		$password = $row['password'];
		if (password_verify($_POST['password'])) {
			$message = 'Login successful.';

		} else {
		$message =  'Login failed.';
		}
	} else {
		$message = 'Login failed.';
	}
	mysqli_close($db);
}	
// I always get login failed... what do I do?
?><!DOCKTYPE html>
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
