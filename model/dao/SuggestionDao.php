<?php
class SuggestionDao extends DAO
{
	/*public function getContactInfo($name,$email,$subject,$message)
	{
		$sql="select * from tbl_suggestion where name=:name,email=:email,subject=:subject,messge=:message";
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":email",$email);
		//$this->bindQueryParam(":password",$merchant_password);
		$result=$this->executeQuery();
		return $result;
	}*/

	public function saveSuggestionInfo()
	{
		$sql="insert into tbl_suggestion values(null,:name,:email,:subject,:message)";
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":name",$_SESSION["contact_user"]->getSuggestionName());
		$this->bindQueryParam(":email",$_SESSION["contact_user"]->getSuggestionEmail());
		$this->bindQueryParam(":subject",$_SESSION["contact_user"]->getSuggestionSubject());
		$this->bindQueryParam(":message",$_SESSION["contact_user"]->getSuggestionMessage());
		

		$this->beginTrans();
		$result=$this->executeUpdate();

		if($result) $this->commitTrans();
		else $this->rollbackTrans();

		if(isset($_SESSION["contact_user"]))
		unset($_SESSION["contact_user"]);
	}
	//Admin Start
	public function getAllSuggestion(){
		$sql="SELECT * FROM tbl_suggestion";
		if(@$_POST["txtAdminSuggestionSearch"]!="")
			$sql=" WHERE name LIKE '".'%'.@$_POST["txtAdminSuggestionSearch"].'%'."'";
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		$this->closeDB();
		return count($result);
	}
	public function getAllSuggestionByRows($start_from,$limit_no_rows){
		$sql="SELECT * FROM tbl_suggestion";
		if(@$_POST["txtAdminSuggestionSearch"]!="")
			$sql.=" WHERE name LIKE '".'%'.@$_POST["txtAdminSuggestionSearch"].'%'."'";
		$sql.=" LIMIT $start_from,$limit_no_rows";
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		$this->closeDB();
		return $result;
	}
	//Admin End
	
}