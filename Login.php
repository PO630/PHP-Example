<!--
//===============================================================//

  Type    : front
  Auteur  : Marcheix François-Xavier
  Date    : 10/02/2021

                          ^ ^
                        (=o o=)
                          \_/

//===============================================================//
-->
<!DOCTYPE html>
<html lang="en">

  <?php
    require_once "Backend/Service/UserService.php" ;
    // Déja Connecté
    if( isConnect() )
    {
      header('Location: ./index.php');
    }
    $findError = 0 ;
    // Appliaction de la méthod POST 
    if( isset($_POST['input_email']) and isset($_POST['input_password']) )
    {
      $newUser = findUserToConnect( $_POST['input_email'] , $_POST['input_password'] ) ;
      if( $newUser !== null )
      {
        connectUser( $newUser ) ;
        header('Location: ./index.php');
      }
      else
      {
        $findError = 1 ;
      }

    }
  ?>

  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="Css/MainStyle.css">
    <link rel="stylesheet" href="Css/Login.css">
  </head>

  <body>

    <form class="box" method="POST" action="Login.php" >
      <h1>Login</h1>
      <input type="text"      name="input_email"    placeholder="Email">
      <input type="password"  name="input_password" placeholder="Password">
      <input type="submit"    name="input_submit"   value="Login">
      <?php 
        if( $findError )
        {
          ?>
          <div class="alertBox" >
            Email or Password is incorrect ! 
            <span class="closebtnAlertBox" onclick="this.parentElement.style.display='none';">&times;</span>
          </div>
          <?php
        }
      ?>
    </form>
  </body>

<!-- Insert Js -->
<script src="Javascript/AlertBox.js"></script>
</html>
