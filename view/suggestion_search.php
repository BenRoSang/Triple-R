<?php
$search=trim($_POST['keyword']);
$sql = "SELECT DISTINCT name FROM tbl_suggestion WHERE name LIKE '%$search%' ORDER BY name LIMIT 0, 10";
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