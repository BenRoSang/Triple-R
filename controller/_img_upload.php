<?php
function store_uploaded_img($file_element_name, $destination) {
	
$temp_file = $file_element_name['tmp_name'];
if (!is_uploaded_file($temp_file)) return false;
$original = pathinfo($file_element_name['name']);
if (!preg_match("/.*\/$/", $destination)) return false;
//----- If destination file exists, append number to the filename
$i = 0;
do {
$dest_path = $destination.$original['filename']
.($i==0?'':"[$i]").'.'.$original['extension'];
$i++;
} while (file_exists($dest_path));
//----- Move the temporaly file to the destination
if (move_uploaded_file($temp_file, $dest_path))
return $dest_path; else return false;
}