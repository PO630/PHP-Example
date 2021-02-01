<?php
//===============================================================//
/*
  Type    : Api controller 
  Auteur  : Marcheix François-Xavier
  Date    : 01/02/2021

  Api : Retourne les informations publiques des utilisateurs.

                          ^ ^
                        (=o o=)
                          \_/
*/
//===============================================================//

require '../Manager/connect.php';

$con = mysql_connect();

//===============================================================//

// Pagination required 

// get offset
if( empty($_GET['offset']) )
{
    $offset = 0 ;
}
else
{
    $offset = $_GET['offset'] ;
}

// get limite
if( empty($_GET['limite']) )
{
    $limite = 10 ;
}
else
{
    $limite = $_GET['limite'] ;
}

//===============================================================//

// Query qui renvoie les informations sur les utilisateurs avec pagination.
$sql = "SELECT * FROM user ORDER BY id_user LIMIT {$limite}  OFFSET {$offset} ;" ;
// Query qui renvoie le nombre total d'utilisateurs.
$sql_count = "SELECT COUNT(*) as total FROM user ;" ;

$userList = [];
if( $result = mysqli_query($con,$sql) )
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $userList[$cr]['id_user']       = $row['id_user'];
    $userList[$cr]['name_user']     = $row['name_user'];
    $userList[$cr]['email_user']    = $row['email_user'];
    $userList[$cr]['avatar_user']   = $row['avatar_user'];
    $cr++;
  }

  // le nombre total d'article
  $count = (int) mysqli_fetch_assoc(mysqli_query($con,$sql_count))['total'] ;
  // le nombre de page observable
  $pages = (int) ceil($count/$limite);
  // renvoie d'un json 
  header("Content-Type: application/json;charset=utf-8");
  echo json_encode( [ 'offset'=>$offset , 'limite'=>$limite , 'total'=>$count , 'pages'=>$pages , 'userList'=>$userList ] );
}
else
{
  http_response_code(400);
}

// Close connection 
$con = null ;


//===============================================================//

// Serveur apache nécessite un fichier .htaccess 

/*

# Remove the php extension from the filename
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^([^\.]+)$ $1.php [NC,L]

# Set the headers for the restful api
Header always set Access-Control-Allow-Origin http://localhost:4200
Header always set Access-Control-Max-Age "1000"
Header always set Access-Control-Allow-Headers "X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding"
Header always set Access-Control-Allow-Methods "POST, GET, OPTIONS, DELETE, PUT"

*/

//===============================================================//
?>