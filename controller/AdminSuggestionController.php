<?php
class AdminSuggestionController{
	public function renderAdminSuggestion(){
		$_SESSION["page_title"]="Suggestion List";
		$suggestionDao=new SuggestionDao();
		$suggestionCount=$suggestionDao->getAllSuggestion();
		$maxpage=ceil($suggestionCount/LIMIT_ROWS);
		if(@$_POST["hddSuggestionPageList"]<1)$page=1;
		elseif(@$_POST["hddSuggestionPageList"]>$maxpage)$page=$maxpage;
		else $page=$_POST["hddSuggestionPageList"];
		$_SESSION['page']=$page;
		$start_from=($page-1)*LIMIT_ROWS;
		$suggestion=$suggestionDao->getAllSuggestionByRows($start_from,LIMIT_ROWS);
		return new AdminSuggestionView($suggestion);
	}
}