<?php
     $timezone = date_default_timezone_set('Africa/Nairobi');
     if($timezone){
          $mwaka = Date('Y');
          $mwezi = Date('n');
     }
     else{
          echo "failed to get local timezone";
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
     <title>Charambe | Maktaba</title>
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
               <div class="groups">
                    <?php echo "<a href='magazeti.php?mwaka=$mwaka&&mwezi=$mwezi' class='group'>";?>
                         <img src="media/icons/magazeti.png" class="icons">
                         <p>Magazeti.</p>
                    </a>
                    <?php echo "<a href='vitabu.php?mwaka=$mwaka&&mwezi=$mwezi' class='group'>";?>
                         <img src="media/icons/vitabu.png" class="icons">
                         <p>Vitabu.</p>
                    </a>
                    <?php echo "<a href='trakti.php?mwaka=$mwaka&&mwezi=$mwezi' class='group'>";?>
                         <img src="media/icons/trakti.png" class="icons">
                         <p>Trakti na Mialiko.</p>
                    </a>
                    <?php echo "<a href='broshua.php?mwaka=$mwaka&&mwezi=$mwezi' class='group'>";?>
                         <img src="media/icons/broshua.png" class="icons">
                         <p>Broshua na vijitabu.</p>
                    </a>
                    <?php echo "<a href='madaftari.php?mwaka=$mwaka&&mwezi=$mwezi' class='group'>";?>
                         <img src="media/icons/madaftari.png" class="icons">
                         <p>Madaftari ya Mkutano.</p>
                    </a>
               </div>
          </div>
     </div>
</body>
</html>