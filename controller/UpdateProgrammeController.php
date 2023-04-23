<?php
class UpdateProgrammeController{
	public function renderUpdateProgram(){
		$a=@$_POST["adminProgrammeEdit"];
		$b=@$_POST["organizationEdit"];
		$c=@$_POST["descriptionEdit"];
		$d=@$_POST["photoEdit"];
		$_SESSION["page_title"]="Programme";
		return new AllProgrammeView($a,$b,$c,$d);
	}
}