
<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'gjsqudqks1/',
  'opentutorials'
);


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
  </head>
  <body>
    <div class="sidenav">
      <a href= song_main.php>Home</a>
    </div>
    <div class="content">
    <?php

    $sql = "SELECT * FROM song_member WHERE group_name = '{$_POST['group_name']}'";
    $result = mysqli_query($conn, $sql);

    while($row=mysqli_fetch_row($result)){

      echo '<form action="createGroup.php" method="post">
        <p> No : <input type="text" name="song_num[]" value = "'.$row[0].'"></p>
        <p> Name :<input type="text" name="song_name[]" value = "'.$row[1].'"></p>
        <input type="submit">
        </form>';

    }




    ?>
    </div>
  </body>
</html>
