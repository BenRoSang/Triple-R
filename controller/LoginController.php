<?php
class LoginController{
	public function renderLogin(){
		$_SESSION["page_title"]="Login";
		if($_GET["user_type"]==1)
			return new SupplierLoginView();
		else if($_GET["user_type"]==2)
			return new MerchantLoginView();
		else
			return new LoginView();
	}

	public function renderMerchantLoginCheck()
	{
		if($_POST["m_email"]=="" && $_POST["m_password"]=="")
		{
			$errors["all_null"]="<font color='red'>PLease Enter required fields.<br>";
		}
		else 
		{
			if($_POST["m_email"]=="")
				$errors["memail_null"]="Please Enter Your Login Email.";
			if($_POST["m_password"]=="")
				$errors["pass_null"]="Please Enter Your Login Password.";
			if($_POST["m_email"]!="" && $_POST["m_password"]!="")
			{
				$merchantdao=new RegistrationDao();
				$merchant=$merchantdao->getMerchantByMerchantName($_POST["m_email"]);//array type
				//echo "<pre>";
				//print_r($user);
				//echo "</pre>";
				if(empty($merchant))
				{
					$errors["invalid_email"]="Invalid Email!";
				}
				else
				{
					if($merchant[0]["password"]!=md5($_POST["m_password"]))
						$errors["wrong_pass"]="Wrong Password!";
					
				}
			}
		}
		if(!empty($errors))
			return new MerchantLoginView($errors);
		else 
		{	
			$_SESSION["loginUser"]=$merchant;
			
			return new HomeView();
		}
	}


	public function renderSupplierLoginCheck()
	{
		if($_POST["l_email"]=="" && $_POST["l_password"]=="")
		{
			$errors["all_null"]="<font color='red'>PLease Enter required fields.<br>";
		}
		else 
		{
			if($_POST["l_email"]=="")
				$errors["lemail_null"]="Please Enter Your Login Email.";
			if($_POST["l_password"]=="")
				$errors["pass_null"]="Please Enter Your Login Password.";
			if($_POST["l_email"]!="" && $_POST["l_password"]!="")
			{
				$supplierdao=new RegistrationDao();
				$supplier=$supplierdao->getSupplierBySupplierName($_POST["l_email"]);//array type
				//echo "<pre>";
				//print_r($user);
				//echo "</pre>";
				if(empty($supplier))
				{
					$errors["invalid_email"]="Invalid Email!";
				}
				else
				{
					if($supplier[0]["password"]!=md5($_POST["l_password"]))
						$errors["wrong_pass"]="Wrong Password!";
					
				}
			}
		}
		if(!empty($errors))
			return new SupplierLoginView($errors);
		else 
		{
			$_SESSION["loginUser"]=$supplier;
			return new HomeView();
		}
	}
}