<?php
class AdminHomeController{
	public function renderAdminHome(){
		$_SESSION["page_title"]="Home";
		return new AdminHomeView();
	}
}