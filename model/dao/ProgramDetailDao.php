<?php
class ProgramDetailDao extends DAO{

	public function getAllProgramDetail(){    
		   
		$sql="select * from tbl_programme where programme_category_id =".$_GET['programme_category_id'];
		
		
		$this->openDB();
		$this->prepareQuery($sql);
		
		$result=$this->executeQuery();
		$this->closeDB();
		return $result;	 
	}
	
}

