<?php
class LogoutController
{
	public function 

	renderLogout()
	{
		if(isset($_SESSION["loginUser"]))
			unset($_SESSION["loginUser"]);
		session_destroy();
		$_SESSION["page_title"]="Home";
		return new HomeView();
	}
}