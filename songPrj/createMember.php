
<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'gjsqudqks1/',
  'opentutorials'
);
$sql = "
  INSERT INTO song_groupname
  (group_name)
  VALUES(
      '{$_POST['song_groupName']}'
    )
";
$result = mysqli_query($conn, $sql);
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


    $groupCount = $_POST['song_groupCount'];
    echo '<form action="createGroup.php" method="post">';
    for($count = 0; $count < $_POST['song_groupCount']; $count++){
    echo  '

      <p> No : <input type="text" name="song_num[]"></p>
      <p> Name :<input type="text" name="song_name[]"></p>
      ';
    }
    echo '
    <input type="hidden" name = "count" value ="';
    echo $groupCount.'">
    <p> 그룹수 : <input type="text" name= "groupCount"></p>
    <input type="submit">
    </form>';


    ?>
    </div>
  </body>
</html>
