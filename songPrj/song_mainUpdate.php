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
  $list = $list."<li><a href = \"song_main.php?group_num={$row['group_num']}\">{$title}</a></li>";
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

  <form action="createMember.php" method="post">
    <div class="row">
      <div class="col-25">
          <label>그룹명</label>
      </div>
      <div class="col-75">
        <?php echo '<input type="text" name="song_groupName" value = "'.$_POST['group_name'].'">'; ?>
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label>인 원</label>
      </div>
      <div class="col-75">
        <input type="text" name="song_groupCount">
      </div>
    </div>
    <input type="submit">
  </form>


</div>



  </body>
</html>
