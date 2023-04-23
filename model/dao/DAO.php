<?php
class DAO {
	protected $db_conn;
	private $stmt;
	protected function openDB() {
		try {
			//echo "<br>operate".DB_NAME. " ".DB_HOST_NAME ."
			//".DB_PORT_NUM."<br>";
			$conn_str = 'mysql:dbname=' . DB_NAME .';host=' . DB_HOST_NAME
			.';port=' . DB_PORT_NUM;
			$this->db_conn = new PDO($conn_str, DB_USER_NAME, DB_PASSWORD);
		} catch(PDOException $e) {
			print_r($e->getMessage());
		}
	}
	protected function closeDB() {
		$this->db_conn = null;
	}
	protected function prepareQuery($sql) {
		$this->stmt = $this->db_conn->prepare($sql);
	}
	protected function bindQueryParam($param, $value) {
		$this->stmt->bindParam($param, $value);
	}
	protected function executeQuery() {
		$this->stmt->execute();
		return $this->stmt->fetchAll();
	}
	protected function executeUpdate() {
		return $this->stmt->execute();
	}
	protected function beginTrans() {
		$this->db_conn->beginTransaction();
	}
	protected function commitTrans() {
		$this->db_conn->commit();
	}
	protected function rollbackTrans() {
		$this->db_conn->rollBack();
	}
}