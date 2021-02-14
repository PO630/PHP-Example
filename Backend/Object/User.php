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

require_once  __DIR__.'../../SqlGateOrm/OrmClass.php';

// Hash key 
define('DB_USER_HASH_KEY'    , 'DeusEx');

class User extends OrmClass
{
    //------------------------------------------------------------------//

    // Orm link database

    public function _class()
    {
        return "User" ;
    }

    public function _classRow()
    {
        return [    $this->id_user          , $this->name_user ,
                    $this->password_user    , $this->email_user ,
                    $this->avatar_user      , $this->ban_user
                ] ;
    }

    public function _table()
    {
        return "user" ;
    }

    public function _tableRow()
    {
        return [    "id_user"       , "name_user" ,
                    "password_user" , "email_user" ,
                    "avatar_user"   , "ban_user" 
                ] ;
    }

    public function _primaryKey()
    {
        return "id_user" ;
    }

    //------------------------------------------------------------------//

    // Attribut

    private $id_user = 0 ;                      // MAIN KEY
    private $name_user ;                        // UNIQUE
    private $password_user ;                    // MDP5
    private $email_user ;                       // UNIQUE
    private $avatar_user = "defaultAvatar.png";
    private $ban_user = 0 ;

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
    public function getAvatarSource()
    {
        return __DIR__.'/../Image/'.$this->avatar_user;
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
    private function setPassword( $value )
    {
        // use by orm : don't hash password -> create size error.
        $this->password_user = $value ;
    }
    public function setNewPassword( $value )
    {
        // use by the user : hash new password 
        $this->password_user = $value ;
        $this->hash_password();
    }
    public function setEmail( $value )
    {
        $this->email_user = $value ;
    }
    public function setAvatar( $value )
    {
        $this->avatar_user = $value ;
    }
    public function setBan( $value )
    {
        $this->ban_user = $value ;
    }

    //------------------------------------------------------------------//

    // Hash function 
    public function hash_password()
    {
        $this->setPassword( md5( $this->getPassword()."".DB_USER_HASH_KEY ) ) ;
    }

    // 
    public function is_password( $passwordUser )
    {
        if( strcmp( $this->getPassword() , md5( $passwordUser."".DB_USER_HASH_KEY ) ) === 0 )
        {
            return true ;
        }
        return false ;
    }

    // 
    public function is_email( $emailUser )
    {
        if( strcmp( $this->getEmail() , $emailUser  ) === 0 )
        {
            return true ;
        }
        return false ;
    }

    // 
    public function is_name( $nameUser )
    {
        if( strcmp( $this->getName() , $nameUser  ) === 0 )
        {
            return true ;
        }
        return false ;
    }

    //------------------------------------------------------------------//

}

//===============================================================//
?>