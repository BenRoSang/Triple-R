<?php
class SupplierController
{
	public function renderSupplierView()
	{
		$_SESSION["page_title"]="Registration";
		return new SupplierSaveView();
	}
	public function renderSupplierConfirm()
	{
		$regSupplierName=$_POST["regSupplierName"];
		$regSupplierEmail=$_POST["regSupplierEmail"];
		$regSupplierPass=$_POST["regSupplierPass"];
		$regSupplierCPass=$_POST["regSupplierCPass"];
		$regSupplierPhone=$_POST["regSupplierPhone"];
		$regSupplierAddress=$_POST["regSupplierAddress"];
		$regSupplierStatus=$_POST["regSupplierStatus"];
		if($regSupplierName=="" && $regSupplierEmail=="" && $regSupplierPass=="" && $regSupplierCPass=="")
		{
			$errors["all_null"]="<font color='red'>Please Enter all required fields.</font>";
		}
		else
		{
			if($regSupplierName=="")
			$errors["name_null"]="Please Enter name";
			if($regSupplierEmail=="")
			$errors["email_null"]="Please Enter email";
				
			$nameSupplierLength=(strlen($regSupplierName));
			if($nameSupplierLength<6)
			{
				$errors["nameSupplierLen_null"]="Username must be at least 6 characters";
			}
			if($nameSupplierLength>30)
			{
				$errors["nameSupplierLen_null"]="Username cannot be greater than 30 characters";
			}
				
				
			$emailSupplierLength=(strlen($regSupplierEmail));
			if($emailSupplierLength<6)
			{
				$errors["emailSupplierLen_null"]="Username must be at least 6 characters";
			}
			if($emailSupplierLength>30)
			{
				$errors["emailSupplierLen_null"]="Username cannot be greater than 50 characters";
			}
			if($regSupplierEmail!="")
			{
				$pattern="/^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,4}$/";
				if(!preg_match($pattern, $regSupplierEmail))
				$errors["invalid_email"]="Invalid Email";
				$supplierdao=new RegistrationDao();
				//$user=$userdao->getUserByUserName();
				$supplier=$supplierdao->getSupplierBySupplierName($regSupplierEmail);
				if(!empty($supplier))
				$errors["user_exist"]="<font color='red'>Email already exist!</font>";
			}

			$passSupplierLength=(strlen($regSupplierPass));
			
			if($regSupplierCPass==""){
				$errors["cpass_null"]="Please Enter confirm password";
			}
			if($regSupplierPass==""){
				$errors["pass_null"]="Please Enter password";
			}
			elseif (strlen($regSupplierPass)<6)
			{
				$errors["passSupplierLen_null"]="Password must be at least 6 characters";
			}
			if ($regSupplierPass!="" && $regSupplierCPass!="" && $regSupplierPass!= $regSupplierCPass )
			{
				$errors["pass_notMatched"]="Password and Confirm Password must be same.";
			}
		}
		if($regSupplierPhone!="")
		{
			$pattern="/^[0](\d{1,2})-(\d{5,9})$/";
			if(!preg_match($pattern,$regSupplierPhone))
			$errors["invalid_phone"]="Invalid Phone";
		}
		if(!empty($errors))
		return new SupplierSaveView($errors);
			
		if(empty($errors))
		{
			$supplier=new Supplier();
			$supplier->setSupplierName($regSupplierName);
			$supplier->setSupplierEmail($regSupplierEmail);
			$supplier->setSupplierPassword($regSupplierPass);
			$supplier->setSupplierPhone($regSupplierPhone);
			$supplier->setSupplierAddress($regSupplierAddress);
			$supplier->setSupplierStatus($regSupplierStatus);

			$_SESSION["reg_Suser"]=$supplier;
			$_SESSION["page_title"]="Registration";
			return new SupplierConfirmView();
		}
	}
	public function renderSupplierSave()
	{
		$supplierdao=new RegistrationDao();
		$supplierdao->saveSupplier();
		$_SESSION["page_title"]="Login";
		return new SupplierLoginView();
	}
	public function renderSupplierUpdate(){
		$_SESSION["page_title"]="Update Profile";
		return new SupplierUpdateProfileView();
	}
	public function renderSupplierUpdateConfirm(){
		$updName=$_POST["updSName"];
		$updEmail=$_POST["updSEmail"];
		$updPass=$_POST["updSPass"];
		$updCPass=$_POST["updSCPass"];
		$updAddress=$_POST["updSAddress"];

		$user[0]["name"]=$updName;
		$user[0]["email"]=$updEmail;
			
		if($updPass==$_SESSION["loginUser"][0]["password"])
		$user[0]["password"]=$updPass;
		else
		$user[0]["password"]=md5($updPass);

		$user[0]["address"]=$updAddress;
		$user[0]["supplier_id"]=$_SESSION["loginUser"][0]["supplier_id"];
			
		$_SESSION["update_Suser"]=$user;

		if($updName=="" && $updEmail=="" && $updPass=="" && $updCPass=="")
		{
			$errors["all_null"]="Please Enter all required fields.";
		}
		else
		{
			if($updName=="")
			$errors["name_null"]="Please Enter name";
			$nameSupplierUpdateLength=(strlen($updName));
			if($nameSupplierUpdateLength<6)
			{
				$errors["nameSupplierUpdateLen_null"]="Username must be at least 6 characters";
			}
			if($nameSupplierUpdateLength>30)
			{
				$errors["nameSupplierUpdateLen_null"]="Username cannot be greater than 30 characters";
			}
				
				
			$emailSupplierUpdateLength=(strlen($updEmail));
			if($emailSupplierUpdateLength<6)
			{
				$errors["emailSupplierUpdateLen_null"]="Username must be at least 6 characters";
			}
			if($emailSupplierUpdateLength>30)
			{
				$errors["emailSupplierUpdateLen_null"]="Username cannot be greater than 50 characters";
			}
				
			if($updEmail=="")
			$errors["email_null"]="Please Enter email";
			if($updEmail!="")
			{
				$pattern="/^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,4}$/";
				if(!preg_match($pattern, $updEmail))
				$errors["invalid_email"]="Invalid Email";
			}
				
				
			if($updPass=="")
			$errors["pass_null"]="Please Enter password";
			if($updCPass=="")
			$errors["cpass_null"]="Please Enter confirm password";
			if($updPass!="" && $updCPass!="")
			if($updPass!=$updCPass)
			$errors["pass_notMatched"]="Password and Confirm Password must be same.";
		}
		if(!empty($errors))
			
		return new SupplierUpdateProfileView($errors);
			
		if(empty($errors))
		{
			$_SESSION["page_title"]="Update Profile";
			return new SupplierUpdateProfileConfirmView();
		}
	}
	public function renderSupplierUpdateSave()
	{
		$supplierdao=new RegistrationDao();
		$supplierdao->updateSupplier();
		$_SESSION["page_title"]="Home";
		return new HomeView();
	}
	
	public function renderSupplier(){
		$_SESSION["page_title"]="Product List";
		if (isset($_GET['p_id'])) {
			$productDao = new ProductDao();
			$delete_product = $productDao->DeleteProduct();
		}
		return new SupplierView();
	}
	//Admin Start
public function renderAllSupplier()
	{	
		$limit_no_of_record=5;//no of record per page
		$adminDao=new AdminDao();
		$records=$adminDao->getAllSupplier();//total no of records
		$no_of_all_records=count($records);
		$maxpage=ceil($no_of_all_records/$limit_no_of_record); // total page
		if(@$_POST["hddSupplierPageList"]<1) $page=1;
		elseif(@$_POST["hddSupplierPageList"]>$maxpage) $page=$maxpage;
		else $page=$_POST["hddSupplierPageList"];
		$_SESSION['page']=$page;
		$start_from = ($page-1) * 5;
		$supplierbylimit=$adminDao->getAllSupplierByRows($start_from,$limit_no_of_record);
		$_SESSION["page_title"]="Supplier List";
		return new AllSupplierView($supplierbylimit,$no_of_all_records,$start_from);
	}
	public function renderSupplierBlock($blockId){		
		$adminDao=new AdminDao();
		
		$adminDao->updateSupplierBlock($blockId);	
		//$merchant=$adminDao->getAllMerchant();
		$limit_no_of_record=5;//no of record per page
		$records=$adminDao->getAllSupplier();//total no of records
		$no_of_all_records=count($records);
		$maxpage=ceil($no_of_all_records/$limit_no_of_record); // total page
		if(@$_GET["page"]<1) $page=1;
		elseif(@$_GET["page"]>$maxpage) $page=$maxpage;
		else $page=$_GET["page"];
		$_SESSION['page']=$page;
		$start_from = ($page-1) * 5;
		$supplierbylimit=$adminDao->getAllSupplierByRows($start_from,$limit_no_of_record);
		$_SESSION["page_title"]="Supplier List";
		return new AllSupplierView($supplierbylimit,$no_of_all_records,$start_from);
	}

	public function renderSupplierSearch($searchSupName){
		
		$limit_no_of_record=5;//no of record per page
		$adminDao=new AdminDao();
		$records=$adminDao->getSupplierByName($searchSupName);//total no of records
		$no_of_all_records=count($records);
		$_SESSION["page_title"]="Supplier List";
		return new AllSupplierView($records,$no_of_all_records,0);
	}
	//Admin End
	
}