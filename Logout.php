<!--
//===============================================================//

  Type    : front
  Auteur  : Marcheix François-Xavier
  Date    : 12/02/2021

                          ^ ^
                        (=o o=)
                          \_/

//===============================================================//
-->

<?php
    require_once "Backend/Service/UserService.php" ;
    disconnectUser();
    header('Location: ./Index.php');
    exit();
?>

