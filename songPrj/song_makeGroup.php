
<?php
require 'createGroup_rand.php';
?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
      <link rel="stylesheet" href="style.css">

      <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
     <title></title>
   </head>
   <body>
     <div class="sidenav">
       <a href= song_main.php>Home</a>
       <a href= song_showgroup.php>Group</a>
     </div>

     <div class="content">
       <div class="row">
         <?php
         for($i = 0 ; $i < $numofG ;$i++){
            echo '<div>
            <h2>'.$i.'그룹</h2>';
            while($row_group = mysqli_fetch_row($resu)){
              if($i == $row_group[2]){
                echo '<p>'.$row_group[5].'</p>';
              }

            }
              $resu = mysqli_query($conn, $query_show);
              echo    '</div>';
         }

         ?>



         </div>
     </div>
   </body>
 </html>
