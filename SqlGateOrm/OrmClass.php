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

class OrmClass
{
    //------------------------------------------------------------------//

    // Orm link database

    public function _table()
    {
        return "" ;
    }

    public function _tableRow()
    {
        return [] ;
    }

    public function _classRow()
    {
        return [] ;
    }

    public function _primaryKey()
    {
        return "id" ;
    }

    //------------------------------------------------------------------//

    // Query 

    public function queryFind( $_key )
    {
        return "SELECT * FROM ".$this->_table()." WHERE ".$this->_primaryKey()." = ".$_key." " ;
    }

    public function queryGetAll()
    {
        return "SELECT * FROM ".$this->_table()." " ;
    }

    public function queryDelete( $_key )
    {
        return "DELETE FROM ".$this->_table()." WHERE ".$this->_primaryKey()." = ".$_key." " ;
    }

    public function querySave( $_key )
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

    

}
//===============================================================//
?>