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

class OrmQuery
{
    //------------------------------------------------------------------//

    // Orm link database

    public function _table()
    {
        return "_table" ;
    }

    public function _tableRow()
    {
        return [] ;
    }

    public function _primaryKey()
    {
        return "_primaryKey" ;
    }

    //------------------------------------------------------------------//

    // Query Read only

    public function queryNewId()
    {
        return "SELECT MAX(".$this->_primaryKey().") + 1 as maxId FROM ".$this->_table()." " ;
    }

    public function queryCount()
    {
        return "SELECT COUNT(*) as total FROM ".$this->_table()." " ;
    }

    public function queryFind( $_key )
    {
        return "SELECT * FROM ".$this->_table()." WHERE ".$this->_primaryKey()." = ".$_key." " ;
    }

    public function queryGetAll()
    {
        return "SELECT * FROM ".$this->_table()." " ;
    }

    public function queryGetArray( $offset , $limit )
    {
        return "SELECT * FROM ".$this->_table()." LIMIT {$limit}  OFFSET {$offset} ";
    }

    // Query write

    public function queryDelete( $_key )
    {
        return "DELETE FROM ".$this->_table()." WHERE ".$this->_primaryKey()." = ".$_key." " ;
    }

    public function queryUpdate( $_key )
    {
        $index = 0 ;
        $sql = "UPDATE ".$this->_table()." SET ";
        foreach( $this->_tableRow() as $stringRow )
        {
            if( ++$index === count( $this->_tableRow() ) )
            {
                $sql = $sql." ".$stringRow."=? " ;
            }
            else
            {
                $sql = $sql." ".$stringRow."=?, " ;
            }
        }
        $sql = $sql." WHERE ".$this->_primaryKey()." = ".$_key." " ;
        return $sql ;
    }

    public function queryInsert( )
    {
        $index = 0 ;
        $sql = "INSERT INTO ".$this->_table()." (" ;
        foreach( $this->_tableRow() as $stringRow )
        {
            if( ++$index === count( $this->_tableRow() ) )
            {
                $sql = $sql." ".$stringRow." ) VALUES ( " ;
            }
            else
            {
                $sql = $sql." ".$stringRow.", " ;
            }
        }
        $index = 0 ;
        foreach( $this->_tableRow() as $stringRow )
        {
            if( ++$index === count( $this->_tableRow() ) )
            {
                $sql = $sql."? ) " ;
            }
            else
            {
                $sql = $sql."?, " ;
            }
        }
        return $sql ;
    }



    //------------------------------------------------------------------//
}
//===============================================================//
?>