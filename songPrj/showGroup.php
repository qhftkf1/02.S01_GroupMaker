<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'gjsqudqks1/',
  'opentutorials'
);


$query = "SELECT * FROM song_member";
$result = mysqli_query($conn, $query);
$query_group = "SELECT * FROM song_group";
$result_group = mysqli_query($conn, $query_group);

//테이블 안에 총 개수 구하기 count in table
if($res = mysqli_query($conn, "SELECT * FROM song_member")){
  $row_cnt = mysqli_num_rows($res);
  printf("%d", $row_cnt);
}
// 만들고자 하는 그룹 수
$numofG = 2;

//전과 같은 그룹에 배정되지 않기 위해 방문 배열 생성
$arr = array();

//테이블 한줄씩 방문
while($row = mysqli_fetch_row($result)){
$row_group = mysqli_fetch_row($result_group);
  echo '<br/>';
  echo 'ID : '. $row[0];
  echo ' Name : '. $row[1];
  echo '<br/>';
  $rand_num = mt_rand(1, $row_cnt);

  printf(" %d ", $array[$rand_num]);
  while($array[$rand_num] != 0 || $rand_num == $row_group[2]){
    $rand_num = mt_rand(1, $row_cnt);

  }
  $array[$rand_num] = 1;
  printf(" %d ", $rand_num);

  $a = $rand_num;
  $b = $rand_num % $numofG;
  printf(" %d ", $b);

  //안에 내용이 없으면 INSERT 내용이 있으면 UPDATE
  $sql = "
    INSERT INTO song_group
    (song_num, song_rand, song_ggroup, song_flag)
    VALUES(
        '$row[0]',
        '$a',
        '$b',
        '0'
      )
      ON DUPLICATE KEY UPDATE song_rand = '$a', song_ggroup = '$b'
  ";

    $resu = mysqli_query($conn, $sql);






}
  echo '<a href = "songGroup.php">돌아가기</a><br/>';



?>
