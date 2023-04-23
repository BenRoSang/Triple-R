<?php
class AdminLoginController{
	public function renderAdminLogin(){
		$_SESSION["page_title"]="Login";
		return new AdminLoginView();
	}
	public function renderAdminLoginCheck(){

		if($_POST["adminName"]=="" && $_POST["adminPassword"]==""){
			$errors["all_null"]="Please Enter required fields.";
		}

		else{
			if($_POST["adminName"]=="")
			$errors["name_null"]="Please Enter login name.";
			if($_POST["adminPassword"]=="")
			$errors["pass_null"]="Please Enter password.";

			if($_POST["adminName"]!="" && $_POST["adminPassword"]!=""){

				$adminDao=new AdminDao();
				$admin=$adminDao->getAdminByAdminName($_POST["adminName"]);

				if(empty($admin))
				$errors["invalid"]="Invalid User";
				elseif($admin[0]["password"]!=$_POST["adminPassword"])
				$errors["Wrong"]="Invalid Password";
			}

		}
		if(!empty($errors))
		return new AdminLoginView($errors);
		else {
			$_SESSION["loginUser"]=$admin;
			//return new AdminHomeView();
			//$adminDao=new AdminDao();
			//$merchant=$adminDao->getAllMerchant();

			//return new AllMerchantView($merchant);
			// $limit_no_of_record=5;//no of record per page
			// $adminDao=new AdminDao();
			// $records=$adminDao->getAllMerchant();//total no of records
			// $no_of_all_records=count($records);
			// $maxpage=ceil($no_of_all_records/$limit_no_of_record); // total page
			// if(@$_GET["page"]<1) $page=1;
			// elseif(@$_GET["page"]>$maxpage) $page=$maxpage;
			// else $page=$_GET["page"];
			// $_SESSION['page']=$page;
			// $start_from = ($page-1) * 5;
			// $merchantbylimit=$adminDao->getAllMerchantByRows($start_from,$limit_no_of_record);
			// return new AllMerchantView($merchantbylimit,$no_of_all_records,$start_from);
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
	}
}