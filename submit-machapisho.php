<?php

     require "config.php";

     $cat = $_GET['cat'];
     $kundi = $_GET['kundi'];
     $year = $_GET['year'];
     $month = $_GET['month'];

     if(isset($_POST['sasisha'])){
          $id = $_POST['id'];
          $jina = $_POST['jina'];
          $namba = $_POST['namba'];
          $idadi = $_POST['idadi'];

          $query = "SELECT * FROM machapisho";
          $result = mysqli_query($db, $query);

          if($result){
               for($i=0; $i<mysqli_num_rows($result); $i++){
                    $row = mysqli_fetch_array($result);

                    if($cat === $row['aina']){
                         if($kundi === $row['kundi']){
                              $query2 = "UPDATE machapisho SET jina = '$jina', namba = '$namba', idadi = '$idadi' WHERE id = '$id' ";
                              $result2 = mysqli_query($db, $query2);

                              if($result2){
                                   echo "Record updated successfully!";
                                   header("location:$cat.php?mwaka=$year&&mwezi=$month");
                              }
                              else{
                                   echo "error while updating record!";
                              }
                         }
                    }
               }
          }
     }