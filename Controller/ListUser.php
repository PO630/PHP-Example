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

require '../Service/UserService.php';

//===============================================================//

// Pagination required 

// get offset
if( empty($_GET['offset']) || $_GET['offset'] < 0 )
{
    $offset = 0 ;
}
else
{
    $offset = $_GET['offset'] ;
}

// get limit
if( empty($_GET['limit']) || $_GET['limit'] < 1 )
{
    $limit = 10 ;
}
else
{
    $limit = $_GET['limit'] ;
}

//===============================================================//

$userList = [];
if( $result = findArrayUser( $offset , $limit ) )
{
  $cr = 0;
  foreach( $result as $row )
  {
    $userList[$cr]['id']       = $row->getId();
    $userList[$cr]['name']     = $row->getName();
    $userList[$cr]['email']    = $row->getEmail();
    $userList[$cr]['avatar']   = $row->getAvatar();
    $cr++;
  }

  // le nombre total d'article
  $count = countUser() ;
  // le nombre de page observable
  $pages = (int) ceil($count/$limit);
  // renvoie d'un json 
  header("Content-Type: application/json;charset=utf-8");
  echo json_encode( [ 'offset'=>$offset , 'limit'=>$limit , 'total'=>$count , 'pages'=>$pages , 'userList'=>$userList ] );
}
else
{
  http_response_code(400);
}

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