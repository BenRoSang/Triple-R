<?php
class ProgrammmeCategoryController{
	public function renderAllProgrammeCategory(){
		$_SESSION["page_title"]="Programme Category";
	    $limit_no_of_record=5;//no of record per page
		$ProgrammeCategorydao=new ProgrammeCategoryDao();
		$no_of_all_records=$ProgrammeCategorydao->getAllCategory();//total no of records
		
		//$allCategory=$ProgrammeCategorydao->getAllCategory();
		$maxpage=ceil($no_of_all_records/$limit_no_of_record); // total page
		if(@$_GET["page"]<1) $page=1;
		elseif(@$_GET["page"]>$maxpage) $page=$maxpage;
		else $page=$_GET["page"];
		$_SESSION['page']=$page;
		$start_from = ($page-1) * $limit_no_of_record ;
		$categorybylimit=$ProgrammeCategorydao->getAllCategoryByRows($start_from,$limit_no_of_record);
			
		
		return new ProgrammeCategoryView($categorybylimit,$no_of_all_records,$start_from);
	}
	
   public function renderProgrammeCategoryCreateSave(){
      	$_SESSION["page_title"]="Programme Category";
       $savedao=new ProgrammeCategoryDao();
       $savedao->insertProgrammeCategory();
       
       return $this->renderAllProgrammeCategory();
   
   }
   public function renderProgrammeCategoryDeleteConfirm(){
       $_SESSION["page_title"]="Programme Category";
       if(isset($_GET['prog_cat_id'])){
       $deletedao=new ProductDao();
        $deletedao->deleteProgrammeCategory();
       }
       
       return $this->renderAllProgrammeCategory();       
   }
   public function renderProgrammeCategoryEditSave(){
   	$_SESSION["page_title"]="Programme Category";
       $editdao=new ProgrammeCategoryDao();
       $editdao->editProgrammeCategory();
       return $this->renderAllProgrammeCategory();
   }
}


