<!--
//===============================================================//

  Type    : front
  Auteur  : Marcheix François-Xavier
  Date    : 13/02/2021

                          ^ ^
                        (=o o=)
                          \_/

//===============================================================//
-->
<?php
    require_once "Backend/Service/UserService.php" ;
    // Déja Connecté
    if( isConnect() )
    {
    header('Location: ./Index.php');
    exit();
    }
    $signInError = 2 ;
    if(     isset($_POST['input_email']     ) 
        and isset($_POST['input_password']  ) 
        and isset($_POST['input_name']      ) )
    {
        $signInError = createNewUser( $_POST['input_email'] , $_POST['input_password'] , $_POST['input_name'] ) ;
    }
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Sign In</title>
        <link rel="icon" type="image/png" href="Image/Logo.png">
        <link rel="stylesheet" href="Css/MainStyle.css">
        <link rel="stylesheet" href="Css/Login.css">
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

        <form class="box" method="POST" action="SignIn.php" >
            <h1>Sign In</h1>
            <input type="text"      name="input_email"    placeholder="Email"       >
            <input type="password"  name="input_password" placeholder="Password"    >
            <input type="text"      name="input_name"     placeholder="User Name"   >
            <input type="submit"    name="input_submit"   value="SignIn"            >
        </form>

        <?php 

        switch ($signInError) {
            case 0:
                ?>
                <div class="alertBox" >
                    Complete all the fields to register
                    <span class="closebtnAlertBox" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
                <?php
                break;
            case 1:
                ?>
                <div class="alertBox" >
                    Registration successfully completed, try to <a href="Login.php">login</a>
                  <span class="closebtnAlertBox" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
                <?php
                break;
            case -1:
                ?>
                <div class="alertBox" >
                  Email already used !
                  <span class="closebtnAlertBox" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
                <?php
                break;
            case -2:
                ?>
                <div class="alertBox" >
                    Username already in use !
                  <span class="closebtnAlertBox" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
                <?php
                break;
        }
        ?>

    </body>

<!-- Insert Js -->
<script src="Javascript/AlertBox.js"></script>
</html>