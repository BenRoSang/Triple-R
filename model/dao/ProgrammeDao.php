<?php
class ProgrammeDao extends DAO{
	public function getProgrammeByProgrammeName(){
		$sql="SELECT * FROM tbl_programme WHERE delete_status!=1 AND programme_name LIKE :programme_name";
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":programme_name",$_POST["adminProgrammeName"]);
		$result=$this->executeQuery();
		$this->closeDB();
		return $result;
	}
	
	public function getAllProgramme(){
		$sql="SELECT tbl_programme.programme_id,tbl_programme.programme_name, tbl_programme_category.programme_category_name,
		tbl_programme.organization,tbl_programme.description,tbl_programme.image,tbl_programme.video
		FROM tbl_programme,tbl_programme_category 
		WHERE tbl_programme_category.programme_category_id=tbl_programme.programme_category_id";
		if(@$_POST["txtAdminProgrammeSearch"]!="")
			$sql.=" AND tbl_programme.programme_name LIKE '".'%'.@$_POST["txtAdminProgrammeSearch"].'%'."'";
		if(@$_POST["programme_cat_id"]!="")
			$sql.=" AND tbl_programme.programme_category_id='".@$_POST["programme_cat_id"]."'";
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		$this->closeDB();
		
		return $result;
	}
	public function getAllProgrammeByRows($start,$limit_no_rows){
		$sql="SELECT tbl_programme.programme_id,tbl_programme.programme_category_id,tbl_programme.programme_name, tbl_programme_category.programme_category_name,
		tbl_programme.organization,tbl_programme.description,tbl_programme.image,tbl_programme.video,tbl_programme.delete_status
		FROM tbl_programme,tbl_programme_category 
		WHERE tbl_programme_category.programme_category_id=tbl_programme.programme_category_id";
		if(@$_POST["txtAdminProgrammeSearch"]!="")
			$sql.=" AND tbl_programme.programme_name LIKE '".'%'.@$_POST["txtAdminProgrammeSearch"].'%'."'";
		if(@$_POST["programme_cat_id"]!="")
			$sql.=" AND tbl_programme.programme_category_id='".@$_POST["programme_cat_id"]."'";
		$sql.=" ORDER BY tbl_programme.updated_date DESC LIMIT $start,$limit_no_rows";
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		$this->closeDB();
		
		return $result;
	}
	public function saveProgramme(){
		
		$sql="INSERT INTO tbl_programme VALUES(NULL,:programme_name,:organization,:description,:image,:video,0,:update_date,:programme_category_id)";
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam("programme_name",$_POST["adminProgrammeName"]);
		$this->bindQueryParam("organization",$_POST["adminProgrammeOrganization"]);
		$this->bindQueryParam("description",$_POST["adminProgrammeDescription"]);
		$this->bindQueryParam("image",$_SESSION["image_save"]);
		$this->bindQueryParam("video",$_SESSION["video_save"]);
		$this->bindQueryParam("update_date",date('Y-m-d h:i:s'));
		$this->bindQueryParam("programme_category_id",$_POST["categoryName"]);		
		$this->beginTrans();
        $result=$this->executeUpdate();
        if ($result) {
                  $this->commitTrans();
        }else {
            $this->rollbackTrans();
            }
	}
	public function updateProgramme(){
       $sql="UPDATE tbl_programme SET programme_name=:name,organization=:org,description=:des,image=:img,video=:video,programme_category_id=:programmecategory WHERE programme_id=:id";
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam("name",$_POST["adminProgrammeNameEdit"]);
		$this->bindQueryParam("des",$_POST["descriptionEdit"]);
		$this->bindQueryParam("org",$_POST["organizationEdit"]);
		$this->bindQueryParam("video",$_SESSION["video_update"]);
		$this->bindQueryParam("programmecategory",$_POST["categoryEditName"]);
		$this->bindQueryParam("img",$_SESSION["image_update"]);
		$this->bindQueryParam("id",$_POST["programmeUpdateId"]);        
        $this->beginTrans();
        $result=$this->executeUpdate();
        if ($result) {
            $this->commitTrans();
        }else {
            $this->rollbackTrans();
        }
    }
   
	
	public function getAllProgrammeCategory(){
		$sql="SELECT * FROM tbl_programme_category";
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		$this->closeDB();
		return $result;
	}
	public function getDetailProgramme(){
		$sql="SELECT tbl_programme.programme_id,tbl_programme.programme_name, tbl_programme_category.programme_category_name,
		tbl_programme.organization,tbl_programme.description,tbl_programme.image,tbl_programme.video FROM tbl_programme,tbl_programme_category WHERE programme_id=".$_GET['p_id'];
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		
		$this->closeDB();
		return $result;
	}
	public function deleteProgramme(){
		$sql="UPDATE  tbl_programme SET delete_status=1 WHERE programme_id=".$_GET['prog_id'];
		$this->openDB();
		$this->prepareQuery($sql);
		$this->executeQuery();
			

	}
	}
