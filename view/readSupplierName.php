<?php
if(!empty($_POST["keyword"])) {
	$sql = "SELECT DISTINCT name FROM tbl_supplier WHERE name LIKE '" . $_POST["keyword"] . "%' ORDER BY name LIMIT 0, 5";
	$dsn = "mysql:host=localhost;dbname=Triple_R";
	try {
		$pdo = new PDO($dsn, "root", ""); // Constructor
	} catch (PDOException $e) {
		echo "Connection error: ".$e->getMessage(); exit;
	}
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$result=$stmt->fetchAll();if(!empty($result)) {
		?>
<ul id="country-list">
<?php
foreach($result as $value) {
	?>
	<li onClick="selectSupplier('<?php echo $value["name"]; ?>');"><?php echo $value["name"]; ?>
	</li>
	<?php } ?>
</ul>
<?php } } ?>