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
    <form action="song_mainUpdate.php" method="post">
      <?php
      $sql_group = "SELECT group_name FROM song_groupname WHERE group_num = {$_GET['group_num']}";
      $result_group = mysqli_query($conn, $sql_group);
      $row_group = mysqli_fetch_array($result_group);
       echo '<input type="hidden" name="group_name" value="'.$row_group[group_name].'">'?>
      <input type="submit" name="update" value="update">
      <input type="submit" name="delete" value="delete">

    </form>
  </div>
  <div class="row">
    <?php

    $sql = "SELECT song_name FROM song_member LEFT JOIN song_groupname
    ON song_member.group_name = song_groupname.group_name WHERE group_num = {$_GET['group_num']}";
      $result = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_array($result)){
     echo "<li>$row[0]</li>";
     }
     ?>

  </div>
</div>



  </body>
</html>
