<?php
class ProgramDao extends DAO{
   public function getAllProgram(){
    $sql="select * from tbl_programme_category";
       $this->openDB();
       $this->prepareQuery($sql);
       $result=$this->executeQuery();
       return $result;
   
   }
}