<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'gjsqudqks1/',
  'opentutorials'
);
//테이블 초기화
$query_delete = "DELETE FROM song_group";
$result_delete = mysqli_query($conn, $query_delete);
$result_auto = mysqli_query($conn, "ALTER TABLE song_group AUTO_INCREMENT =1");

// $query = "SELECT * FROM song_member WHERE group_name = '{$_POST['group_name']}'";
// $result = mysqli_query($conn, $query);
// $query_group = "SELECT * FROM song_group";
// $result_group = mysqli_query($conn, $query_group);

//테이블 안에 총 개수 구하기 count in table
if($res = mysqli_query($conn, "SELECT * FROM song_member WHERE group_name ='{$_POST['group_name']}' ")){
  $row_cnt = mysqli_num_rows($res);
}
// 만들고자 하는 그룹 수
$numofG = $_POST['group_count'];

//전과 같은 그룹에 배정되지 않기 위해 방문 배열 생성
$arr = array();

//테이블 한줄씩 방문
while($row = mysqli_fetch_row($res)){
// $row_group = mysqli_fetch_row($result_group);

    $rand_num = mt_rand(1, $row_cnt);

    // printf(" %d ", $array[$rand_num]);
    //중복되지 않고, 전에 있었던 그룹에서 나오기
    while($array[$rand_num] != 0){
        $rand_num = mt_rand(1, $row_cnt);
    }

  $array[$rand_num] = 1;
  // printf(" %d ", $rand_num);

  $a = $rand_num;
  $b = $rand_num % $numofG;

  //안에 내용이 없으면 INSERT 내용이 있으면 UPDATE
  $sql = "
    INSERT INTO song_group
    (song_rand, song_ggroup, song_flag)
    VALUES(
        '$a',
        '$b',
        '$row[0]'
      )
      ON DUPLICATE KEY UPDATE song_rand = '$a', song_ggroup = '$b'
  ";

    $resu = mysqli_query($conn, $sql);
  
}

$query_show = "SELECT * FROM song_group
LEFT JOIN song_member ON song_group.song_flag = song_member.song_num";
$resu = mysqli_query($conn, $query_show);
//
// for($i = 0 ; $i < $numofG ;$i++){
//   echo $i.'그룹';
//
//   while($row_group = mysqli_fetch_row($resu)){
//
//     if($i == $row_group[2]){
//         echo "<br/>";
//       echo $row_group[5];
//     }
//   }
//   $resu = mysqli_query($conn, $query_show);
//   echo "<br/>";
// }
 ?>
