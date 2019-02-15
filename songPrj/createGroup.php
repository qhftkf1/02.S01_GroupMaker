<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'gjsqudqks1/',
  'opentutorials'
);
$songNum = $_POST['song_num'];
$songName = $_POST['song_name'];

$count = $_POST['count'];
for($i = 0 ; $i <$count ; $i++){
    $sql = "
      INSERT INTO song_member
      (song_num, song_name)
      VALUES(
          '{$songNum[$i]}',
          '{$songName[$i]}'
        )
        ON DUPLICATE KEY UPDATE song_num = '$songNum[$i]', song_name = '$songName[$i]'
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
    <title>Home</title>
  </head>
  <body>
    <div class="sidenav">
      <a href= song_main.php>Home</a>
    </div>
    <div class="content">

      
      <?php
      require_once('createGroup_rand.php');

      //
      require_once('createGroup_show.php');
    ?>
    </div>
  </body>
</html>
