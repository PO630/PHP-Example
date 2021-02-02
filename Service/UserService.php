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

require '../Manager/connect.php';
require '../Object/User.php' ;

//_______________________________________________________________//

// Service gestion utilisateur

function getUserById( $id )
{
    $pdo = PDO_connect() ;
    $sql = "SELECT * FROM user WHERE id_user = ".$id." " ;
    $user = $pdo->query($sql)->fetchObject('User');
    $pdo = null ;
    return $user ;
}

function deleteUserById( $id )
{
    $con = mysql_connect();
    $sql = 'DELETE FROM user WHERE id_user = '.$_GET['id'].' '  ;
    $result = mysqli_query($con, $sql);
    $con = null ;
    return $result ;
}

function getAllUserArray()
{
    $pdo = PDO_connect() ;
    $sql = "SELECT * FROM user" ;
    $users = $pdo->query($sql)->fetchAll(PDO::FETCH_CLASS, 'User');
    $pdo = null ;
    return $users ;
}

function getUserArray( $offset , $limit )
{
    $pdo = PDO_connect() ;
    $sql = "SELECT * FROM user LIMIT {$limit}  OFFSET {$offset} " ;
    $users = $pdo->query($sql)->fetchAll(PDO::FETCH_CLASS, 'User');
    $pdo = null ;
    return $users ;
}

function countUser()
{
    $con = mysql_connect();
    $sql_count = "SELECT COUNT(*) as total FROM user " ;
    $count = (int) mysqli_fetch_assoc(mysqli_query($con,$sql_count))['total'] ;
    $con = null ;
    return $count ;
}

function updateUser( $user )
{
    $pdo = PDO_connect() ;
    $sql = "SELECT * FROM user WHERE id_user = ".$user->getId()." " ;

    // TO DO : orm 

    $pdo = null ;
    return 0;
}

//_______________________________________________________________//

// Service connection utilisateur

function ConnectUser( $emailUser , $passwordUser )
{
    foreach( getAllUserArray() as $userRow )
    {
        if( $userRow->is_password($passwordUser) && $userRow->is_email( $emailUser ) )
        {
            return true ;
        }
    }
    return false ;
}


//===============================================================//
?>