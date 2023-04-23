<?php
class AdminLogoutController{
	public function renderAdminLogout(){
		$_SESSION["page_title"]="Home";
		if(isset($_SESSION["loginUser"]))
			unset($_SESSION["loginUser"]);
		session_destroy();		
		return new HomeView();
	}

}