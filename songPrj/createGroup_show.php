<?php
$query = "SELECT * FROM song_group left join song_member on song_group.song_num = song_member.song_num";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_row($result)){
echo "</br>";
echo $row[5].'씨는 '.$row[2].'그룹입니다!';
}
?>
