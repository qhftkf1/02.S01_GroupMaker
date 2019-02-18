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
  $list = $list."<li><a href = \"song_showgroupUpdate.php?group_num={$row['group_num']} && group_name={$title}\">{$title}</a></li>";
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
    //멤버들 정보 보여주기
    $sql = "SELECT song_name FROM song_member LEFT JOIN song_groupname
    ON song_member.group_name = song_groupname.group_name WHERE group_num = {$_GET['group_name']}";
      $result = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_array($result)){
     echo "<li>$row[0]</li>";
     }
     ?>

  </div>
</div>


  </body>
</html>
