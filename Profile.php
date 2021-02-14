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
    if( isset( $_FILES['input_file'] ) )
    {
      $userNavigation = getUserSession() ;
      $userNavigation->uploadAvatar( $_FILES['input_file'] ) ;
      updateUser( $userNavigation ) ;
    }
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

    <!-- Header -->
    <div class="header">
      <h1>My Website</h1>
      <img src="Image/Logo.png" alt="Logo web site" >
    </div>

    <?php
      include "PHP-include/NavigationBar.php" ;
    ?>

    <div class="row">
    
        <div class="side" style="text-align: center;" >

            <img class="userAvatar" src="<?php echo $userNavigation->getAvatarSource() ; ?>" >

            <form method='post' action='' enctype='multipart/form-data'>
              <input type='file' name='input_file' />
              <input type='submit' value='Submit' name='submit_file' />
            </form>

        </div>

        <div class="main">
            <p>
            <label for="email"><b>Email : <?php echo $userNavigation->getEmail() ; ?> </b></label>
            </p>
            <p>
            <label for="name" ><b>Name  : <?php echo $userNavigation->getName() ; ?>  </b></label>
            </p>
        </div>

    </div>

    <!-- Footer -->
    <div class="footer">
    </div>

    </body>

<!-- Insert Js -->
<script src="Javascript/AlertBox.js"></script>
</html>