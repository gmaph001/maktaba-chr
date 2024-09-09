<?php
     require "config.php";

     $yearpage = $_GET['mwaka'];
     $monthpage = $_GET['mwezi'];

     $query = "SELECT * FROM machapisho";
     $result = mysqli_query($db, $query);

     $n = 0;
     $size = 0;
     $size1 = 0;
     $size2 = 0;
     $size3 = 0;
     $size4 = 0;
     $size5 = 0;
     $size6 = 0;
     $mwaka[$size] = [];
     $mwezi[$size1] = [];
     $year[$size2] = [];
     $month[$size3] = [];
     $id[$size] = [];
     $id2[$size4] = [];
     $id3[$size5] = [];
     $id4[$size6] = [];
     $jina[$size] = [];
     $jina2[$size4] = [];
     $jina3[$size5] = [];
     $jina4[$size6] = [];
     $namba[$size] = [];
     $namba2[$size4] = [];
     $namba3[$size5] = [];
     $namba4[$size6] = [];
     $idadi[$size] = [];
     $idadi2[$size4] = [];
     $idadi3[$size5] = [];
     $idadi4[$size6] = [];
     $yaliyoagizwa = 0;
     $yaliyopo = 0;
     $jumla = 0;

     if($result){
          for($i=0; $i<mysqli_num_rows($result); $i++){
               $row = mysqli_fetch_array($result);
               if($row['aina'] === "broshua"){
                    $mwaka[$size] = $row['mwaka'];
                    if($yearpage === $row['mwaka']){
                         $mwezi[$size1] = $row['mwezi'];
                         $jina[$size1] = $row['jina'];
                         $namba[$size1] = $row['namba'];
                         $idadi[$size1] = $row['idadi'];
                         if($row['kundi'] === "yaliyoagizwa"){
                              $id2[$size4] = $row['id'];
                              $jina2[$size4] = $row['jina'];
                              $namba2[$size4] = $row['namba'];
                              $idadi2[$size4] = $row['idadi'];
                              $yaliyoagizwa+=$row['idadi'];
                              $size4++;
                         }
                         if($row['kundi'] === "yaliyopo"){
                              $id3[$size5] = $row['id'];
                              $jina3[$size5] = $row['jina'];
                              $namba3[$size5] = $row['namba'];
                              $idadi3[$size5] = $row['idadi'];
                              $yaliyopo+=$row['idadi'];
                              $size5++;
                         }
                         $size1++;
                    }
                    $size++;
               }
          }
     }

     for($i=0; $i<$size5; $i++){
          for($j=0; $j<$size4; $j++){
               if($namba3[$i] === $namba2[$j]){
                    $id4[$size6] = $id2[$j];
                    $jina4[$size6] = $jina2[$j];
                    $namba4[$size6] = $namba2[$j];
                    $idadi4[$size6] = $idadi2[$j] + $idadi3[$i];
                    $size6++;
               }
          }
     }

     $jumla = $yaliyoagizwa + $yaliyopo;
     
     for($i=0; $i<$size; $i++){
          if($i<$size-1){
               if($mwaka[$i] === $mwaka[$i+1]){
                    $year[$size2] = $mwaka[$i];
               }
               else{
                    $size2++;
                    $year[$size2] = $mwaka[$i];
               }
          }
          else{
               $size2++;
               $year[$size2] = $mwaka[$i];
          }
     }
     for($i=0; $i<$size1; $i++){
          if($i<$size1-1){
               if($mwezi[$i] === $mwezi[$i+1]){
                    $month[$size3] = $mwezi[$i];
               }
               else{
                    $size3++;
                    $month[$size3] = $mwezi[$i];
               }
          }
          else{
               $size3++;
               $month[$size3] = $mwezi[$i];
          }
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="styles/navBar.css">
     <link rel="stylesheet" type="text/css" href="styles/maktaba.css">
     <link rel="icon" type="image/x-icon" href="media/icons/jw-logo-4.jpg">
     <title>Charambe | Maktaba | Broshua</title>
</head>
<body>
     <div class="main">
          <div class="navigation">
               <img src="media/icons/jw-logo-4.jpg" class="logo">
               <ul type="none" class="menu">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="maktaba.php">Maktaba</a></li>
               </ul>
          </div>
          <div class="body">
               <h1>BROSHUA</h1><br><br>
               <div class="date">
                    <h1>Mwaka</h1>
                    <div class="years-collection">
                         <?php
                              for($i=$size2; $i>0; $i--){
                                   if($year[$i] === $yearpage){
                                        echo "<a href='broshua.php?mwaka=$year[$i]&&mwezi=$monthpage' class='year active'>$year[$i]</a>";
                                   }
                                   else{
                                        echo "<a href='broshua.php?mwaka=$year[$i]&&mwezi=$monthpage' class='year'>$year[$i]</a>";
                                   }
                              }
                         ?>
                    </div>
                    <h1>Mwezi</h1>
                    <div class="years-collection">
                         <?php
                              for($i=$size3; $i>0; $i--){
                                   if($month[$i] === $monthpage){
                                        echo "<a href='broshua.php?mwaka=$yearpage&&mwezi=$month[$i]' class='year active'>$month[$i]</a>";
                                   }
                                   else{
                                        echo "<a href='broshua.php?mwaka=$yearpage&&mwezi=$month[$i]' class='year'>$month[$i]</a>";
                                   }
                              }
                         ?>
                    </div>
               </div>
               <div class="ordered">
                    <h1>Yaliyoagizwa:</h1>
                         <?php
                              for($i=$size4-1; $i>=0; $i--){
                                   echo "
                                             <form action='submit-machapisho.php?cat=broshua&&kundi=yaliyoagizwa&&year=$yearpage&&month=$monthpage' method='POST' name='submit' enctype='multipart/form-data'>
                                                  <div class='ordered-details'>
                                                       <input type='number' name='id' plcaholder='$id2[$i]' value='$id2[$i]' style='display: none;'>
                                                       <input type='text' name='jina' placeholder='$jina2[$i]' value='$jina2[$i]'>
                                                       <input type='text' name='namba' placeholder='$namba2[$i]' value='$namba2[$i]'>
                                                       <input type='number' name='idadi' placeholder='$idadi2[$i]' value='$idadi2[$i]'>
                                                  </div>
                                                  <button class='sendbtn' name='sasisha'>Sasisha</button>
                                             </form>
                                        ";
                              }
                         ?>
               </div>
               <div class="ordered">
                    <h1>Yaliyopo:</h1>
                         <?php
                              for($i=$size5-1; $i>=0; $i--){
                                   echo "
                                             <form action='submit-machapisho.php?cat=broshua&&kundi=yaliyopo&&year=$yearpage&&month=$monthpage' method='POST' name='submit' enctype='multipart/form-data'>
                                                  <div class='ordered-details'>
                                                       <input type='number' name='id' plcaholder='$id3[$i]' value='$id3[$i]' style='display: none;'>
                                                       <input type='text' name='jina' placeholder='$jina3[$i]' value='$jina3[$i]'>
                                                       <input type='text' name='namba' placeholder='$namba3[$i]' value='$namba3[$i]'>
                                                       <input type='number' name='idadi' placeholder='$idadi3[$i]' value='$idadi3[$i]'>
                                                  </div>
                                                  <button class='sendbtn' name='sasisha'>Sasisha</button>
                                             </form>
                                        ";
                              }
                         ?>
               </div>
               <div class="ordered">
                    <h1>Yaliyobaki:</h1>
                    <?php
                         for($i=$size6-1; $i>=0; $i--){
                              echo "
                                        <div class='ordered-details'>
                                             <input type='text' name='jina' placeholder='$jina4[$i]' value='$jina4[$i]'>
                                             <input type='text' name='namba' placeholder='$namba4[$i]' value='$namba4[$i]'>
                                             <input type='number' name='idadi' placeholder='$idadi4[$i]' value='$idadi4[$i]'>
                                        </div>
                                   ";
                         }
                    ?>
               </div>
               <div class="ordered">
                    <h1>Jumla:</h1>
                    <?php
                         echo "
                                   <div class='ordered-details'>
                                        <div class='cat'>
                                             <p>Yaliyoagizwa:</p>
                                             <p>$yaliyoagizwa</p>
                                        </div>
                                        <div class='cat'>
                                             <p>Yaliyopo:</p>
                                             <p>$yaliyopo</p>
                                        </div>
                                        <div class='cat'>
                                             <p>Jumla:</p>
                                             <p>$jumla</p>
                                        </div>
                                   </div>
                              ";
                    ?>
               </div>
          </div>
     </div>     
</body>
</html>