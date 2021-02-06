<?php
//===============================================================//
/*
  Type    : Api controller 
  Auteur  : Marcheix François-Xavier
  Date    : 01/02/2021

  Api : Supprime un utilisateur avec son id.

                          ^ ^
                        (=o o=)
                          \_/
*/
//===============================================================//

require_once '../Service/UserService.php';

if( empty($_GET['id']) )
{
    // Echec pour le client avec id null ou invalide.
    return http_response_code(400);
}

if( !deleteUserById($_GET['id']) )
{
    // Echec pour la recherche sql 
    return http_response_code(422);
}

// Sucess request end code 204 
return http_response_code(204);

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