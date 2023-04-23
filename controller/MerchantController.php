<?php
class MerchantController
{
	public function renderMerchantView()
	{
		$_SESSION["page_title"]="Registration";
		return new MerchantSaveView();
	}
	public function renderMerchantConfirm()
	{
		$regName=$_POST["regName"];
		$regEmail=$_POST["regEmail"];
		$regPass=$_POST["regPass"];
		$regCPass=$_POST["regCPass"];
		$regPhone=$_POST["regPhone"];
		$regAddress=$_POST["regAddress"];
		$regStatus=$_POST["regStatus"];
		if($regName=="" && $regEmail=="" && $regPass=="" && $regCPass=="")
		{
			$errors["all_null"]="<font color='red'>Please Enter all required fields.</font>";
		}
		else
		{
			if($regName=="")
			$errors["name_null"]="Please Enter name";
			$nameLength=(strlen($regName));
			if($nameLength<6)
			{
				$errors["nameLen_null"]="Username must be at least 6 characters";
			}
			if($nameLength>30)
			{
				$errors["nameLen_null"]="Username cannot be greater than 30 characters";
			}
			$emailLength=(strlen($regEmail));
			if($emailLength<6)
			{
				$errors["emailLen_null"]="Username must be at least 6 characters";
			}
			if($emailLength>30)
			{
				$errors["emailLen_null"]="Username cannot be greater than 50 characters";
			}
			if($regEmail=="")
			$errors["email_null"]="Please Enter email";
			if($regEmail!="")
			{
				$pattern="/^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,4}$/";
				if(!preg_match($pattern, $regEmail))
				$errors["invalid_email"]="Invalid Email";
				$userdao=new RegistrationDao();
				$user=$userdao->getMerchantByMerchantName($regEmail);
				if(!empty($user))
				$errors["user_exist"]="<font color='red'>Email already exist!</font>";
			}
			$passLength=(strlen($regPass));
			if($passLength<6)
			{
				$errors["passLen_null"]="Password must be at least 6 characters";
			}
			if($passLength>15)
			{
				$errors["passLen_null"]="Password cannot be greater than 15 characters";
			}
			$cpassLength=(strlen($regPass));
			if($cpassLength<6)
			{
				$errors["cpassLen_null"]="Confirm password must be at least 6 characters";
			}
			if($cpassLength>15)
			{
				$errors["cpassLen_null"]="Comfirm password cannot be greater than 15 characters";
			}
			if($regPass=="")
			$errors["pass_null"]="Please Enter password";
			if($regCPass=="")
			$errors["cpass_null"]="Please Enter confirm password";
			if($regPass!="" && $regCPass!="")
			if($regPass!=$regCPass)
			$errors["pass_notMatched"]="Password and Confirm Password must be same.";
		}
		if($regPhone!="")
		{
			$pattern="/^[0](\d{1,2})-(\d{5,9})$/";
			if(!preg_match($pattern,$regPhone))
			$errors["invalid_phone"]="Invalid Phone";
		}
		if(!empty($errors))
		return new MerchantSaveView($errors);
			
		if(empty($errors))
		{
			$user=new Merchant();
			$user->setMerchantName($regName);
			$user->setMerchantEmail($regEmail);
			$user->setMerchantPassword($regPass);
			$user->setMerchantPhone($regPhone);
			$user->setMerchantAddress($regAddress);
			$user->setMerchantStatus($regStatus);
			$_SESSION["reg_user"]=$user;
			$_SESSION["page_title"]="Registration";
			return new MerchantConfirmView();
		}
	}
	public function renderMerchantSave()
	{
		$userdao=new RegistrationDao();
		$userdao->saveMerchant();
		$_SESSION["page_title"]="Login";
		return new MerchantLoginView();
	}
	public function renderMerchantUpdate(){
		$_SESSION["page_title"]="Update Profile";
		return new MerchantUpdateProfileView();
	}
	public function renderMerchantUpdateConfirm(){
		$updName=$_POST["updName"];
		$updEmail=$_POST["updEmail"];
		$updAddress=$_POST["updAddress"];
		$user[0]["name"]=$updName;
		$user[0]["email"]=$updEmail;
		$user[0]["address"]=$updAddress;
		$user[0]["merchant_id"]=$_SESSION["loginUser"][0]["merchant_id"];			
		$_SESSION["update_user"]=$user;
		if($updName=="" && $updEmail=="" )
		{
			$errors["all_null"]="Please Enter all required fields.";
		}
		else
		{
			if($updName=="")
			$errors["name_null"]="Please Enter name";
			$nameUpdateLength=(strlen($updName));
			if($nameUpdateLength<6)
			{
				$errors["nameUpdateLen_null"]="Username must be at least 6 characters";
			}
			if($nameUpdateLength>30)
			{
				$errors["nameUpdateLen_null"]="Username cannot be greater than 30 characters";
			}
			$emailUpdateLength=(strlen($updEmail));
			if($emailUpdateLength<6)
			{
				$errors["emailUpdateLen_null"]="Username must be at least 6 characters";
			}
			if($emailUpdateLength>30)
			{
				$errors["emailUpdateLen_null"]="Username cannot be greater than 50 characters";
			}

			if($updEmail=="")
			$errors["email_null"]="Please Enter email";
			if($updEmail!="")
			{
				$pattern="/^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,4}$/";
				if(!preg_match($pattern, $updEmail))
				$errors["invalid_email"]="Invalid Email";
			}
		}
		if(!empty($errors))
			
		return new MerchantUpdateProfileView($errors);
			
		if(empty($errors))
		{
			$_SESSION["page_title"]="Update Profile";
			return new MerchantUpdateProfileConfirmView();
		}
	}
	public function renderMerchantUpdateSave()
	{
		$merchantdao=new RegistrationDao();
		$merchantdao->updateMerchant();
		$_SESSION["page_title"]="Home";
		return new HomeView();
	}
	public function renderMerchantPostProduct(){//Post Product Merchant view
		$limit_no_of_record=3;//no of record per page
		$productdao=new ProductDao();
		$no_of_all_records=$productdao->getAllPost();//total no of records
		$maxpage=ceil($no_of_all_records/$limit_no_of_record); // total page
		if($maxpage<1)$maxpage=1;
		if(@$_POST["hddCustomerProductList"]<1)$page=1;
		elseif(@$_POST["hddCustomerProductList"]>$maxpage)$page=$maxpage;
		else $page=@$_POST["hddCustomerProductList"];
		$_SESSION['page']=$page;
		$start_from = ($page-1) * 3;
		$productbylimit=$productdao->getAllPostByRows($start_from,$limit_no_of_record);
		return new PostProductMerchantView($productbylimit,$no_of_all_records,$start_from);
	}
	public function renderSearch(){
		$productdao=new ProductDao();
		$limit_no_of_record=3;//no of record per page
		$search=$_POST["ajax"];
		$records=$productdao->getAllData($search);//total no of records
		$no_of_all_records=count($records);
		$maxpage=ceil($no_of_all_records/$limit_no_of_record); // total page
		//control
		if(@$_POST["hddCustomerProductList"]<1)$page=1;
		elseif(@$_POST["hddCustomerProductList"]>$maxpage)$page=$maxpage;
		else $page=$_POST["hddCustomerProductList"];
		$_SESSION['page']=$page;
		$start_from = ($page-1) * 3;
		$_SESSION["page_title"]="Merchant List";
		return new PostProductMerchantView($records,$no_of_all_records,$start_from);
	}
	//Admin Start
public function renderAllMerchant(){
		$limit_no_of_record=5;//no of record per page
		$adminDao=new AdminDao();
		$records=$adminDao->getAllMerchant();//total no of records
		$no_of_all_records=count($records);
		$maxpage=ceil($no_of_all_records/$limit_no_of_record); // total page
		if(@$_POST["hddMerchantPageList"]<1) $page=1;
		elseif(@$_POST["hddMerchantPageList"]>$maxpage) $page=$maxpage;
		else $page=$_POST["hddMerchantPageList"];
		$_SESSION['page']=$page;
		$start_from = ($page-1) * 5;
		$merchantbylimit=$adminDao->getAllMerchantByRows($start_from,$limit_no_of_record);
		$_SESSION["page_title"]="Merchant List";
		return new AllMerchantView($merchantbylimit,$no_of_all_records,$start_from);		
	}
	public function renderMerchantBlock($blockId){
		$adminDao=new AdminDao();		
		$adminDao->updateMerchantBlock($blockId);	
		$limit_no_of_record=5;//no of record per page
		$adminDao=new AdminDao();
		$records=$adminDao->getAllMerchant();//total no of records
		$no_of_all_records=count($records);
		$maxpage=ceil($no_of_all_records/$limit_no_of_record); // total page
		if(@$_POST["hddPageList"]<1) $page=1;
		elseif(@$_POST["hddPageList"]>$maxpage) $page=$maxpage;
		else $page=$_POST["hddPageList"];
		$_SESSION['page']=$page;
		$start_from = ($page-1) * 5;
		$merchantbylimit=$adminDao->getAllMerchantByRows($start_from,$limit_no_of_record);
		$_SESSION["page_title"]="Merchant List";
		return new AllMerchantView($merchantbylimit,$no_of_all_records,$start_from);
	}
	public function renderMerchantSearchant($searchMerName){
		
		$limit_no_of_record=5;//no of record per page
		$adminDao=new AdminDao();
		$records=$adminDao->getMerchantByName($searchMerName);//total no of records
		$no_of_all_records=count($records);
		$_SESSION["page_title"]="Merchant List";
		return new AllMerchantView($records,$no_of_all_records,0);
	}
	//Admin End
}