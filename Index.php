<!--
//===============================================================//

  Type    : front
  Auteur  : Marcheix François-Xavier
  Date    : 11/02/2021

                          ^ ^
                        (=o o=)
                          \_/

//===============================================================//
-->
<?php
    require_once "Backend/Service/UserService.php" ;
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Main Menu</title>
        <link rel="stylesheet" href="Css/MainStyle.css">
    </head>

    <body>

    <div>
      <?php
        if( isConnect() )
        {
          echo getUserSession()->getName() ;
          ?>
          <a href="Logout.php">Logout</a>
          <?php
        }
        else
        {
          ?>
          <a href="Login.php">Login</a>
          <?php
        }
      ?>
    </div>

    </body>

</html>