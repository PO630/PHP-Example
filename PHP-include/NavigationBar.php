<?php
//===============================================================//
/*
  Type    : front
  Auteur  : Marcheix François-Xavier
  Date    : 13/02/2021

                          ^ ^
                        (=o o=)
                          \_/
*/
//===============================================================//

    require_once "Backend/Service/UserService.php" ;

    $userNavigation = getUserSession() ;

//===============================================================//
?>
    <div class="navigationBar">

        <a class="navigationItem" href="Index.php">Home</a>
        <a class="navigationItem" href="#news">News</a>
        <a class="navigationItem" href="#contact">Contact</a>
        <a class="navigationItem" href="#about">About</a>
        <?php 
        if( isConnect() )
        {
            ?>
            <a class="navigationAccount" href="Logout.php">Logout</a>
            <a class="navigationAccount" href="Profile.php">
                <?php
                    echo $userNavigation->getName() ;
                ?>
            </a>
            <?php
        }
        else
        {
            ?>
            <a class="navigationAccount" href="SignIn.php">SignIn</a>
            <a class="navigationAccount" href="Login.php">Login</a>
            <?php
        }
        ?>
    </div>
