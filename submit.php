<?php

     require "config.php";

     if(isset($_POST['kusanya'])){     
          $kundi = $_POST['kundi'];
          $aina = $_POST['machapisho'];
          $jina = $_POST['jina'];
          $namba = $_POST['namba'];
          $idadi = $_POST['idadi'];
          $mwezi = $_POST['mwezi'];
          $mwaka = $_POST['mwaka'];


          $query = "INSERT INTO machapisho (kundi, aina, jina, namba, idadi, mwezi, mwaka) VALUES ('$kundi', '$aina', '$jina', '$namba', '$idadi', '$mwezi', '$mwaka')";
          $result = mysqli_query($db, $query);

          if($result){
               echo "Successfully inserted!";
               header("location:index.html");
          }
          else{
               echo "Error while submitting!";
          }

     }