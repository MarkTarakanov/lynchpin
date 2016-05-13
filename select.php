<!DOCKTYPE>
<html>
<head>
    <title>PHP</title>
</head>
  <body>

<ul>

    <?php

      $db = mysqli_connect('localhost', 'Mark Tarakanov', 'topsecret', 'Users');
      $sql = 'SELECT * FROM Users';
      $result = mysqli_query($db, $sql);

      foreach ($result as $row) {
        printf('<li><span style="color: %s;">%s (%s)</span>
        <a href="update.php?id=%s">edit</a>
        <a href="update.php?id=%s">delete</a></li>',
          htmlspecialchars($row['color']),
          htmlspecialchars($row['username']),
          htmlspecialchars($row['gender']),
          htmlspecialchars($row['id']),
          htmlspecialchars($row['id'])
        );
      }
      mysqli_close($db);
     


    ?>


</ul>



  </body>

</html>
