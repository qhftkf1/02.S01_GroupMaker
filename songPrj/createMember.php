
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
      <a href= song_showgroup.php>Group</a>ㅍ
    </div>
    <div class="content">

    <?php
    //main에서 설정한 멤버수 만큼 칸 추가

    $groupCount = $_POST['song_groupCount'];
    echo '<form action="createGroup.php" method="post">';
    for($count = 0; $count < $_POST['song_groupCount']; $count++){
    echo  '

      <p> Name :<input type="text" name="song_name[]"></p>
      <input type = "hidden" name="group_name" value="'.$_POST['song_groupName'].'">
      ';
    }
    echo '
     <input type="text" name = "count" value ="'.$groupCount.'">
     <input type="submit">
     </form>';
    ?>

    </div>
  </body>
</html>
