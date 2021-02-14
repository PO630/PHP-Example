<!--
//===============================================================//

  Type    : front
  Auteur  : Marcheix François-Xavier
  Date    : 14/02/2021

                          ^ ^
                        (=o o=)
                          \_/

//===============================================================//
-->
<?php
    //
    require_once "Backend/Service/UserService.php" ;
    // Log Only
    if( !isConnect() )
    {
      header('Location: ./Index.php');
      exit();
    }
    //

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Main Menu</title>
        <link rel="icon" type="image/png" href="Image/Logo.png">
        <link rel="stylesheet" href="Css/MainStyle.css">
    </head>
    
    <body>

    <?php
      include "PHP-include/NavigationBar.php" ;
      // $userNavigation include in PHP-include/NavigationBar.php
    ?>

    <div class="row">
    
        <div class="side" style="text-align: center;" >
            <img class="userAvatar" src="Image/Logo.png">
        </div>
        <div class="main">
            <p>
            <label for="email"><b>Email : <?php echo $userNavigation->getEmail() ; ?> </b></label>
            </p>
            <p>
            <label for="name" ><b>Name  : <?php echo $userNavigation->getName() ; ?>  </b></label>
            </p>
            <label for="name" ><b>SCR  : <?php echo $userNavigation->getAvatarSource() ; ?>  </b></label>
            <img class="userAvatar" <?php echo $userNavigation->getAvatarSource() ; ?> >
        </div>

    </div>

    </body>

<!-- Insert Js -->
<script src="Javascript/AlertBox.js"></script>
</html>