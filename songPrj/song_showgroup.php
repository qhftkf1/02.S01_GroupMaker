<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'gjsqudqks1/',
  'opentutorials'
);
$query = "SELECT * FROM song_groupname";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($result)){
  $title = $row['group_name'];
  $list = $list."<li><a href = \"song_showgroupUpdate.php?group_num={$row['group_num']}\">{$title}</a></li>";
}
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
  <a href= song_showgroup.php>Group</a>
</div>

<div class="content">
  <div class="row">
    <ol>
      <?= $list ?>
    </ol>

  </div>

  <div class="row">
    <?php
    $sql = "SELECT * FROM song_groupname WHERE group_num = {$_GET['group_num']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

     $sql_two = "SELECT song_name FROM song_member WHERE group_name = '$row[1]'";
     $result_two = mysqli_query($conn, $sql_two);
     while($rowtwo = mysqli_fetch_array($result_two)){
     echo "<li>$rowtwo[0]</li>";
     }
     ?>

  </div>
</div>



  </body>
</html>
