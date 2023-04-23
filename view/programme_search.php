<?php
$search=trim($_POST['keyword']);
if(isset($_POST["programmeCategory"]) && $_POST["programmeCategory"]!= ""){
	$sql = "SELECT DISTINCT programme_name as name FROM tbl_programme WHERE programme_category_id='".$_POST["programmeCategory"]."' AND programme_name LIKE '%$search%' ORDER BY programme_name LIMIT 0, 10";
}
else $sql = "SELECT DISTINCT programme_name as name FROM tbl_programme WHERE programme_name LIKE '%$search%' ORDER BY programme_name LIMIT 0, 10";
$dsn = "mysql:host=localhost;dbname=triple_r";
try {
	$pdo = new PDO($dsn, "root", ""); // Constructor
} catch (PDOException $e) {
	echo "Connection error: ".$e->getMessage(); exit;
}
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll();?>
<ul id="country-list">
<?php 
foreach($result as $key=>$value){
?>
<li onClick="selectCountry('<?php echo $value["name"]; ?>');"><?php echo $value["name"]; ?></li>
<?php }
?>
</ul>