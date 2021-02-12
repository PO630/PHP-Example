<?php
//===============================================================//
/*
  Type    : Service
  Auteur  : Marcheix François-Xavier
  Date    : 01/02/2021

                          ^ ^
                        (=o o=)
                          \_/
*/
//===============================================================//

require_once __DIR__.'../../Bin/Connect.php' ;
require_once __DIR__.'../../Object/User.php' ;
require_once __DIR__.'../../Object/Session.php' ;

//_______________________________________________________________//

// Service gestion utilisateur

function newIdUser()
{
    $con = mysql_connect();
    $user = new User() ;
    $newID = $user->newId( $con ) ;
    $con = null ;
    return $newID ;
}

function countUser()
{
    $con = mysql_connect();
    $user = new User() ;
    $count = $user->count( $con ) ;
    $con = null ;
    return $count ;
}

function findUser( $id )
{
    $pdo = PDO_connect() ;
    $user = new User() ;
    $user = $user->find( $pdo , $id ) ;
    $pdo = null ;
    return $user ;
}

function findAllUser()
{
    $pdo = PDO_connect() ;
    $user = new User() ;
    $users = $user->findAll( $pdo ) ;
    $pdo = null ;
    return $users ;
}

function findArrayUser( $offset , $limit )
{
    $pdo = PDO_connect() ;
    $user = new User() ;
    $users = $user->findArray( $pdo , $offset , $limit ) ;
    $pdo = null ;
    return $users ;
}

//_______________________________________________________________//

function deleteUserById( $id )
{
    $con = mysql_connect();
    $user = new User() ;
    $result = $user->delete( $con , $id ) ;
    $con = null ;
    return $result ;
}

function updateUser( $user )
{
    $pdo = PDO_connect() ;
    $user->update( $pdo , $user->getId() ) ;
    $pdo = null ;
    return 0;
}

function insertUser( $user )
{
    $pdo = PDO_connect() ;
    $user->setId( newIdUser() );
    $user->insert( $pdo ) ;
    $pdo = null ;
    return 0;
}

//_______________________________________________________________//

// Service connection utilisateur

function findUserToConnect( $emailUser , $passwordUser )
{
    foreach( findAllUser() as $userRow )
    {
        if( $userRow->is_password($passwordUser) && $userRow->is_email( $emailUser ) )
        {
            return $userRow ;
        }
    }
    return null ;
}

function connectUser( $user )
{
    Session::getInstance()->startSession() ;
    Session::getInstance()->__set( 'userId' , $user->getId() ) ;
    return 1 ;
}

function getUserSession()
{
    if( Session::getInstance()->__isset('userId') )
    {
        return findUser( Session::getInstance()->__get('userId') ) ;
    }
    return NULL ;
}

function disconnectUser()
{
    if( !Session::getInstance()->sessionState() )
    {
        return true ;
    }
    Session::getInstance()->destroy() ; 
    return false ;
}

function isConnect()
{
    if( !Session::getInstance()->sessionState() )
    {
        return false ;
    }
    if( !Session::getInstance()->__isset('userId') )
    {
        return false ;
    }
    return true ;
}


//===============================================================//
?>