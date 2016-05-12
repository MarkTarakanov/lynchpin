<Docktype html>
<html>
<head>
<body>
  <?php
  $name = '';
  $password = '';
  $gender = '';
  $tc = '';
  $color = '';
  $languages = array();

  if (isset($_POST['submit'])) {
    $ok = true;
    if (!isset($_POST['name']) || $_POST['name'] === ''){
      $ok = false;
    } else {
      $name = $_POST['name'];
    }
    if (!isset($_POST['password']) || $_POST['password'] === ''){
      $ok = false;
    } else {
      $password = $_POST['password'];
    }
    if (!isset($_POST['gender']) || $_POST['gender'] === ''){
      $ok = false;
    } else {
      $gender = $_POST['gender'];
    }
    if (!isset($_POST['tc']) || $_POST['tc'] === ''){
      $ok = false;
    }else {
      $tc = $_POST['tc'];
    }
    if (!isset($_POST['color']) || $_POST['color'] === ''){
      $ok = false;
    }else {
      $color = $_POST['color'];
    }
    if (!isset($_POST['languages']) || !is_array($_POST['languages'])
          || count($_POST['languages']) === 0){
      $ok = false;
    }else {
      $languages = $_POST['languages'];
    }
  }
   ?>
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
      $mysqli = new mysqli('localhost', 'Mark Tarakanov', 'topsecret', 'Users');
      // Throw exception instead
      if ($mysqli->connect_errno) {
          echo 'Connect failed: ', $mysqli->connect_error, '" }';
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
        htmlspecialchars($name),
        htmlspecialchars($password),
        htmlspecialchars($gender),
        htmlspecialchars($color),
        htmlspecialchars(implode(' ', $languages)),
        htmlspecialchars($tc));
      }
  }
  ?>
  <form method="post" action="">
    User Name: <input type="text" name="name" value="<?php
        echo htmlspecialchars($name);
     ?>"><br>
    Password: <input type="password" name="password" value="<?php
        echo htmlspecialchars($password);
     ?>"><br>
    Gender:
      <input type="radio" name="gender" value="f" <?php
        if ($gender === 'f') {
          echo ' checked';
        }
      ?>>female
      <input type="radio" name="gender" value="m" <?php
        if ($gender === 'm') {
          echo ' checked';
        }
      ?>>male <br>
      Favorite color:
        <select name="color">
          <option value="">Please select</option>
            <option value="#f00"  <?php
              if ($color === '#f00') {
                echo ' selected';
              }
            ?>>red</option>
            <option value="#0f0"<?php
              if ($color === '#0f0') {
                echo ' selected';
              }
            ?>>green</option>
            <option value="#00f"<?php
              if ($color === '#00f') {
                echo ' selected';
              }
            ?>>blue</option>
          </select><br>
      Languages spoken:
        <select name="languages[]" multiple size="3">
          <option value="en"<?php
            if (in_array('en', $languages)) {
              echo ' selected';
            }
          ?>>English</option>
          <option value="fr"<?php
            if (in_array('fr', $languages)) {
              echo ' selected';
            }
          ?>>French</option>
          <option value="it"<?php
            if (in_array('it', $languages)) {
              echo ' selected';
            }
          ?>>Italian</option>
        </select><br>
        <input type="checkbox" name="tc" value="ok" <?php
        if ($tc === 'ok') {
          echo ' checked';
          }
        ?>>I accept the T&C<br>
        <input type="submit" name="submit" value="Submit">
</form>
</body>
</head>
</html>
