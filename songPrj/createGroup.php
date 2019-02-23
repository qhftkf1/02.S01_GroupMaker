<?php
$conn = mysqli_connect(
  'qhftkf1.cafe24.com',
  'qhftkf1',
  'tmdrl001!',
  'qhftkf1'
);





$songName = $_POST['song_name'];
$groupName = $_POST['group_name'];

$count = $_POST['count'];

for($i = 0 ; $i <$count ; $i++){

    $sql = "
      INSERT INTO song_member
      (song_name, group_name)
      VALUES(
          '{$songName[$i]}',
          '{$groupName}'
        )
    ";

    $result = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Home</title>
  </head>
  <body>
    <div class="sidenav">
      <a href= song_main.php>Home</a>
      <a href= song_showgroup.php>Group</a>
    </div>
    <div class="content">
      <?php

      ?>
    </div>
  </body>
</html>
