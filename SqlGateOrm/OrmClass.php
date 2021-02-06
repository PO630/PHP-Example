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

require_once "OrmQuery.php" ;

class OrmClass extends OrmQuery
{
    //------------------------------------------------------------------//

    public function _class()
    {
        return "OrmClass" ;
    }

    public function _classRow()
    {
        return [] ;
    }

    //------------------------------------------------------------------//

    public function newId( $mysql )
    {
        // TO DO : set on PDO
        return (int) mysqli_fetch_assoc( mysqli_query( $mysql , $this->queryNewId() ) )['maxId'] ;
    }

    public function count( $mysql )
    {
        // TO DO : set on PDO
        return (int) mysqli_fetch_assoc( mysqli_query( $mysql , $this->queryCount() ) )['total'] ;
    }

    public function find( $pdo , $id )
    {
        $classFind = $pdo->query( $this->queryFind($id) )->fetchObject( $this->_class() );
        return $classFind ;
    }

    public function findAll( $pdo )
    {
        $classArray = $pdo->query( $this->queryGetAll() )->fetchAll( PDO::FETCH_CLASS , $this->_class() );
        return $classArray ;
    }

    public function findArray( $pdo , $offset , $limit )
    {
        $classArray = $pdo->query( $this->queryGetArray($offset,$limit) )->fetchAll( PDO::FETCH_CLASS , $this->_class() );
        return $classArray ;
    }

    //------------------------------------------------------------------//

    public function delete( $mysql , $id )
    {
        // TO DO : set on PDO
        $result = mysqli_query( $mysql , $this->queryDelete( $id ) );
        return $result ;
    }

    public function update( $pdo , $id )
    {
        $result = $pdo->prepare( $this->queryUpdate( $id ) )->execute( $this->_classRow() );
        return $result ;
    }

    public function insert( $pdo )
    {
        $result = $pdo->prepare( $this->queryInsert( ) )->execute( $this->_classRow() );
        return $result ;
    }

    //------------------------------------------------------------------//
}
//===============================================================//
?>