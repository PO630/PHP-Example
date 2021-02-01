<?php
//===============================================================//
/*
  Type    : Object
  Auteur  : Marcheix François-Xavier
  Date    : 01/02/2021

                          ^ ^
                        (=o o=)
                          \_/
*/
//===============================================================//

require '../Manager/connect.php';

// Hash key 
define('DB_USER_HASH_KEY'    , 'DeusEx');

class User
{

    //------------------------------------------------------------------//

    private $id_user ;
    private $name_user ;
    private $password_user ;
    private $email_user ;
    private $avatar_user ;
    private $last_connexion_user ;
    private $ban_user ;

    //------------------------------------------------------------------//

    // GET 

    public function getId()
    {
        return $this->id_user ;
    }
    public function getName()
    {
        return $this->name_user ;
    }
    public function getPassword()
    {
        return $this->password_user ;
    }
    public function getEmail()
    {
        return $this->email_user ;
    }
    public function getAvatar()
    {
        return $this->avatar_user ;
    }
    public function getLastConnexion()
    {
        return $this->last_connexion_user ;
    }
    public function getBan()
    {
        return $this->ban_user ;
    }

    //------------------------------------------------------------------//

    // SET

    public function setId( $value )
    {
        $this->id_user = $value ;
    }
    public function setName( $value )
    {
        $this->name_user = $value ;
    }
    public function setPassword( $value )
    {
        $this->password_user = $value ;
    }
    public function setEmail( $value )
    {
        $this->email_user = $value ;
    }
    public function setAvatar( $value )
    {
        $this->avatar_user = $value ;
    }
    public function setLastConnexion( $value )
    {
        $this->last_connexion_user = $value ;
    }
    public function setBan( $value )
    {
        $this->ban_user = $value ;
    }

    //------------------------------------------------------------------//

    // Hash function 
    public function hash_password()
    {
        return md5( $this->getPassword()."".DB_USER_HASH_KEY ) ;
    }

    // 
    public function is_password( $passwordUser )
    {
        if( $this->hash_password() === md5( $passwordUser."".DB_USER_HASH_KEY ) )
        {
            return true ;
        }
        return false ;
    }

    // 
    public function is_email( $emailUser )
    {
        if( $this->getEmail() === md5( $emailUser ) )
        {
            return true ;
        }
        return false ;
    }

    //------------------------------------------------------------------//

}


//===============================================================//
// Example use
/* 
    // Single value 
    $user = $pdo->query('SELECT * FROM user LIMIT 1')->fetchObject('User');
    // Array values
    $users = $pdo->query('SELECT * FROM user')->fetchAll(PDO::FETCH_CLASS, 'User');
*/
//===============================================================//
?>