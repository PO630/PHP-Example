<?php
//===============================================================//
/*
  Type    : function required 
  Auteur  : Marcheix François-Xavier
  Date    : 01/02/2021

  Nécessaire de connection à une base de donnée sql avec php.

                          ^ ^
                        (=o o=)
                          \_/
*/
//===============================================================//

// Information sur la base de donnée principalement utilisé.
define('DB_HOST'    , 'localhost');
define('DB_USER'    , 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'db_riot_game');

//===============================================================//

// Fonction 

// Connection avec mysql.
function function_mysql_connect( $db_host , $db_user , $db_password , $db_name )
{
  $connect = mysqli_connect( $db_host , $db_user , $db_password , $db_name);
  if (mysqli_connect_errno($connect)) {
    die("Failed to connect:" . mysqli_connect_error());
  }
  mysqli_set_charset($connect, "utf8");
  return $connect;
}

// Connection direct à la base de donnée.
function mysql_connect()
{
    return function_mysql_connect( DB_HOST , DB_USER , DB_PASSWORD , DB_NAME ) ;
}

//_______________________________________________________________//

// Connection avec PDO.
function function_PDO_connect(  $db_host , $db_user , $db_password , $db_name )
{
  try {
    $dbh = new PDO('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_password );
    return $dbh ;
    } catch (PDOException $e) {
      print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
  }
}

// Connection direct avec PDO.
function PDO_connect()
{
  return function_PDO_connect( DB_HOST , DB_USER , DB_PASSWORD , DB_NAME ) ;
}

//===============================================================//
?>