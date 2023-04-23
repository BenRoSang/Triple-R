<?php
class AdminProgrammeController{
	public function renderAdminProgrammeSave(){
		$_SESSION["page_title"]="Programme List";
		$programmeDao=new ProgrammeDao();
		$dest_path=store_uploaded_file(IMAGE, "./images/programme/");
		$_SESSION["image_save"]=$dest_path;
		$dest_video_path=store_video_uploaded_file(VIDEO,"./videos/programme/");
		$_SESSION["video_save"]=$dest_video_path;
		$programmeDao->saveProgramme();
			
		$Allprogramme=$programmeDao->getAllProgramme();
		$maxpage=ceil(count($Allprogramme)/LIMIT_ROWS);
		if(@$_POST["hddProgrammePageList"]<1)$page=1;
		elseif(@$_POST["hddProgrammePageList"]>$maxpage)$page=$maxpage;
		else $page=$_POST["hddProgrammePageList"];
		$_SESSION['page']=$page;
		$start_from=($page-1)*LIMIT_ROWS;
		$programmeCategory=$programmeDao->getAllProgrammeCategory();
		$programme=$programmeDao->getAllProgrammeByRows($start_from,LIMIT_ROWS);
		return new AllProgrammeView($errors=null,$programme,$programmeCategory);
	}
	public function renderUpdateProgrammeCategory(){
		$_SESSION["page_title"]="Programme List";
		$errors=null;
		$programmeDao=new ProgrammeDao();
		if(isset($_FILES[UPDATE_IMAGE]) && $_FILES[UPDATE_IMAGE]["size"]>0){
			$dest_path=store_uploaded_file(UPDATE_IMAGE, "./images/programme/");
			$_SESSION["image_update"]=$dest_path;
		}
		else{
			$_SESSION["image_update"]=$_POST["imgEdit"]=="blank" ? "" :$_POST["imgEdit"];
		}
		if(isset($_FILES[UPDATE_VIDEO]) && $_FILES[UPDATE_VIDEO]["size"]>0)
		{
			$dest_video_path=store_video_uploaded_file(UPDATE_VIDEO,"./videos/programme/");
			$_SESSION["video_update"]=$dest_video_path;
		}
		else{
			$_SESSION["video_update"]=$_POST["videoEdit"]=="blank" ? "":$_POST["videoEdit"];
		}
		$programmeDao->updateProgramme();
		$Allprogramme=$programmeDao->getAllProgramme();
		$maxpage=ceil(count($Allprogramme)/LIMIT_ROWS);
		if(@$_POST["hddProgrammePageList"]<1)$page=1;
		elseif(@$_POST["hddProgrammePageList"]>$maxpage)$page=$maxpage;
		else $page=$_POST["hddProgrammePageList"];
		$_SESSION['page']=$page;
		$start_from=($page-1)*LIMIT_ROWS;
		$programmeCategory=$programmeDao->getAllProgrammeCategory();
		$programme=$programmeDao->getAllProgrammeByRows($start_from,LIMIT_ROWS);
		return new AllProgrammeView($errors=null,$programme,$programmeCategory);
	}

	public function renderAllProgramme(){
		$_SESSION["page_title"]="Programme List";
		if (isset($_GET['prog_id'])) {
			$deleteProgrammeDao = new ProgrammeDao();
			$deleteProgrammeDao->deleteProgramme();
		}
		$errors=null;
		$programmeDao=new ProgrammeDao();
		$Allprogramme=$programmeDao->getAllProgramme();
		$maxpage=ceil(count($Allprogramme)/LIMIT_ROWS);
		if(@$_POST["hddProgrammePageList"]<1)$page=1;
		elseif(@$_POST["hddProgrammePageList"]>$maxpage)$page=$maxpage;
		else $page=$_POST["hddProgrammePageList"];
		$_SESSION['page']=$page;
		$start_from=($page-1)*LIMIT_ROWS;
		$programmeCategory=$programmeDao->getAllProgrammeCategory();
		$programme=$programmeDao->getAllProgrammeByRows($start_from,LIMIT_ROWS);
		return new AllProgrammeView($errors,$programme,$programmeCategory);	
	}
	public function renderAddProgrammeCategory(){
		
		$errors=null;
		$programmeDao=new ProgrammeDao();
		$AllprogrammeCat=$programmeDao->getAllProgrammeCategory();
		return new AllProgrammeView($errors,$AllprogrammeCat);	
	}

	public function renderDeleteProgramme(){
		$_SESSION["page_title"]="Programme List";
		$errors;
		if(isset($_GET['prog_id'])){
		$programmeDao=new ProgrammeDao();		
		$Allprogramme=$programmeDao->deleteProgramme();

		// return new AllProgrammeView($errors,$Allprogramme);
		}
		$Allprogramme=$programmeDao->getAllProgramme();
		$maxpage=ceil(count($Allprogramme)/LIMIT_ROWS);
		if(@$_POST["hddProgrammePageList"]<1)$page=1;
		elseif(@$_POST["hddProgrammePageList"]>$maxpage)$page=$maxpage;
		else $page=$_POST["hddProgrammePageList"];
		$_SESSION['page']=$page;
		$start_from=($page-1)*LIMIT_ROWS;
		$programmeCategory=$programmeDao->getAllProgrammeCategory();
		$programme=$programmeDao->getAllProgrammeByRows($start_from,LIMIT_ROWS);
		return new AllProgrammeView($errors=null,$programme,$programmeCategory);
	}
	public function renderViewDetail(){
		if(isset($_GET['p_id'])){
			$errors=null;
			$programmeDao=new ProgrammeDao();
			$Allprogramme=$programmeDao->getDetailProgramme();
			return new AllProgrammeDetailView($Allprogramme);
		}	
	}
	/*public function renderProgrammeSearch(){

		$programmeDao=new ProgrammeDao();
		$Allprogramme=$programmeDao->getProgrammeBySeacrh();

		return new AllProgrammeView($Allprogramme);
	}*/
}