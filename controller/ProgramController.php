<?php
class ProgramController{
	public function renderProgram(){
		
		$programdao=new ProgramDao();
		$all_program=$programdao->getAllProgram();
		$_SESSION["page_title"]="Programme";
		return new ProgramView($all_program);
	}
	public function renderProgramDetails(){
		
		if(isset($_GET['programme_category_id'])){
			
		$programdetaildao=new ProgramDetailDao();
		$all_program_detail=$programdetaildao->getAllProgramDetail();
		$_SESSION["page_title"]="Programme Details";
		return new ProgramDetailsView($all_program_detail);
		}
	}
	
}