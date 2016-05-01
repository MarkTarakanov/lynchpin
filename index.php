<Docktype html>
<html>
<head>
<body>
  <?php
  ini_set('display_errors', 'On');
  if (isset($_POST['submit'])) {
    //process form
      $name = $_POST['name'];
      $password = $_POST['password'];
      $gender = $_POST['gender'];
      $color = $_POST['color'];
      $languages = $_POST['languages'];

      // Connect to DB
      $mysqli = new mysqli('localhost', 'Users', 'topsecret', 'Mark Tarakanov');

      // Throw exception instead
      if ($this->$mysqli->connect_errno) {
          echo 'Connect failed: ', $this->$mysqli->connect_error, '" }';
          exit();
      }

      // Check if user exists
      $sql = "SELECT id FROM Users WHERE username='$name'";
      $result = $mysqli->query($sql);

      if (mysqli_num_rows($result) > 0)
      {
          $message = [0 => "This user already exists!"];
      }
      else
      {
        $sql = "INSERT INTO Users (username, password, gender, color, languages) VALUES ('$name', '$password', '$gender', '$color', '$languages')";
        $result = $mysqli->query($sql);

        printf('User name: %s
        <br> Password: %s
        <br> Gender: %s
        <br> Color: %s
        <br> Language(s): %s,
        <br>T&amp;C: %s',
        htmlspecialchars($_POST['name']),
        htmlspecialchars($_POST['password']),
        htmlspecialchars($_POST['gender']),
        htmlspecialchars($_POST['color']),
        htmlspecialchars(implode(' ', $_POST['languages'])),
        htmlspecialchars($_POST['tc']));
      }
  }
  ?>
  <form method="post" action="">
    User Name: <input type="text" name="name"><br>
    Password: <input type="password" name="password"><br>
    Gender:
      <input type="radio" name="gender" value="f">female
      <input type="radio" name="gender" value="m">male <br>
      Favorite color:
        <select name="color">
            <option value="#f00">red</option>
            <option value="#0f0">green</option>
            <option value="#00f">blue</option>
          </select><br>
      Languages spoken:
        <select name="languages[]" multiple size="3">
          <option value="en">English</option>
          <option value="fr">French</option>
          <option value="it">Italian</option>
        </select><br>
        <input type="checkbox" name="tc" value="ok">I accept the T&C<br>
        <input type="submit" name="submit" value="Submit">
</form>
</body>
</head>
</html>
