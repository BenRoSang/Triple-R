<?php
class FogetPasswordController{
	public function renderForgetPassword(){
		$_SESSION["page_title"]="Forget Password";
		if($_GET["user_type"]==1)
			return new SupplierForgetPasswordView();
		else if($_GET["user_type"]==2)
			return new MerchantForgetPasswordView();
		else
			return new ForgetPasswordView();
	}
}