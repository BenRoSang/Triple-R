<?php
class ProgrammeCategory{
	private $programme_category_id;
	private $programme_category_name;
	private $image;
	private $description;
	private $delete_status;
	
	public function getProgramme_category_id(){
		return $this->programme_category_id;
	}
	public function setProgramme_category_id($programme_category_id){
		$this->programme_category_id=$programme_category_id;
	}
	
	public function getsetProgramme_category_name(){
		return $this->programme_category_name;
	}
	public function setProgramme_category_name($programme_category_name){
		$this->programme_category_name=$programme_category_name;
	}
	
	public function getImage(){
		return $this->image;
	}
	public function setImage($image){
		$this->image=$image;
	}
	
	public function getDescription(){
		return $this->description;
	}
	public function setDescription($description){
		$this->description=$description;
	}

	public function getDelete_status(){
		return $this->delete_status;
	}
	public function setDelete_status($delete_status){
		$this->delete_status=$delete_status;
	}
	
	
}