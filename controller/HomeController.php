<?php 
class HomeController{
	public function renderHomePage() {
		$_SESSOIN["page_title"]="Home";
		return new HomeView();
	}
}
