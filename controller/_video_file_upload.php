<?php
function store_video_uploaded_file($file_element_name, $destination) {
//$maxsize = 5242880; // 5MB
$maxsize=20971520;
$temp_file = $_FILES[$file_element_name]['tmp_name'];
	
if (!is_uploaded_file($temp_file)) return false;
$original = pathinfo($_FILES[$file_element_name]['name']);
if (!preg_match("/.*\/$/", $destination)) return false;
//----- If destination file exists, append number to the filename
$i = 0;
do {
$dest_path = $destination.$original['filename']
.($i==0?'':"[$i]").'.'.$original['extension'];
$i++;
} while (file_exists($dest_path));
$videoFileType = strtolower(pathinfo($dest_path,PATHINFO_EXTENSION));
$extensions_arr = array("mp4","avi","3gp","mov","mpeg","webm");
if( in_array($videoFileType,$extensions_arr) ){
	// Check file size
	if(($_FILES[$file_element_name]['size'] >= $maxsize) || ($_FILES[$file_element_name]["size"] == 0)) {
		return false;
	}else{
		// Upload
		if(move_uploaded_file($temp_file,$dest_path)){
			return $dest_path;
		}
	}

}else{
	return false;
}
}
		//upload video
		


		