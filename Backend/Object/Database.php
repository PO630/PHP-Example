<?php
//===============================================================//
/*
  Type    : Object
  Auteur  : Marcheix François-Xavier
  Date    : 06/02/2021

                          ^ ^
                        (=o o=)
                          \_/
*/
//===============================================================//

require_once  __DIR__.'../../SqlGateOrm/OrmClass.php';

// Information sur la base de donnée principalement utilisé.
define('DATABASE_HOST'    , 'localhost');
define('DATABASE_NAME'    , 'db_riot_game');
define('DATABASE_USER'    , 'root');
define('DATABASE_PASSWORD', '');

//===============================================================//

class Database extends OrmClass
{
//------------------------------------------------------------------//

    // Orm link database

    public function _class()
    {
        return "Database" ;
    }

    public function _classRow()
    {
        return [    $this->id_database , $this->host_database , 
                    $this->name_database , $this->user_database , $this->password_database ] ;
    }

    public function _table()
    {
        return "database" ;
    }

    public function _tableRow()
    {
        return [    "id_database" , "host_database" ,
                    "name_database" , "user_database" , "password_database" ] ;
    }

    public function _primaryKey()
    {
        return "id_database" ;
    }

    //------------------------------------------------------------------//

    private $id_database ;
    private $host_database = DATABASE_HOST ;
    private $name_database = DATABASE_NAME ;
    private $user_database = DATABASE_USER ;
    private $password_database = DATABASE_PASSWORD ;

    //------------------------------------------------------------------//

    public function getId()
    {
        return $this->id_database ;
    }
    public function getHost()
    {
        return $this->host_database ;
    }
    public function getName()
    {
        return $this->name_database ;
    }
    public function getUser()
    {
        return $this->user_database ;
    }
    public function getPassword()
    {
        return $this->password_database ;
    }

    //------------------------------------------------------------------//

    public function setId( $value )
    {
        $this->id_database = $value ;
    }
    public function setHost( $value )
    {
        $this->host_database = $value ;
    }
    public function setName( $value )
    {
        $this->name_database = $value ;
    }
    public function setUser( $value )
    {
        $this->user_database = $value ;
    }
    public function setPassword( $value )
    {
        $this->password_database = $value ;
    }

    //------------------------------------------------------------------//

    public function mysqlConnect()
    {
      $connect = mysqli_connect( $this->getHost() , $this->getUser() , $this->getPassword() , $this->getName() );
      if (mysqli_connect_errno($connect)) {
        die("Failed to connect:" . mysqli_connect_error());
      }
      mysqli_set_charset($connect, "utf8");
      return $connect;
    }

    public function pdoConnect()
    {
      try {
        $dbh = new PDO('mysql:host='.$this->getHost().';dbname='.$this->getName(), $this->getUser(), $this->getPassword() );
        return $dbh ;
        } catch (PDOException $e) {
          print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
      }
    }

    //------------------------------------------------------------------//

}

//===============================================================//
?>