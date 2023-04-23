<?php
class AdminDao extends DAO{

	private $result;
	public function getAdminByAdminName($adminName){

		$sql="select * from tbl_admin where admin_name=:adminname";

		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":adminname", $adminName);
		$result=$this->executeQuery();
		return $result;
	}
	public function getAllMerchant(){
		$sql="select * from tbl_merchant";
		if(@$_POST["searchMerName"]!="")
		{
			$sql.=" WHERE name LIKE '".'%'.@$_POST["searchMerName"].'%'."'";
		}
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		return $result;
	}
	public function getMerchantByName($searchMerName){
		$sql="select * from tbl_merchant where name=:merchantname";

		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":merchantname", $searchMerName);
		$result=$this->executeQuery();
		return $result;
	}
	public function getAllMerchantByRows($start,$no_of_record){
		$sql="select * from tbl_merchant ";
		if(@$_POST["searchMerName"]!=""){
			$sql.=" WHERE name LIKE '".'%'.@$_POST["searchMerName"].'%'."'";
		}
		$sql.=" limit $start,$no_of_record";
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		return $result;
	}
	public function getAllSupplier(){
		$sql="select * from tbl_supplier";
		if(@$_POST["searchSupName"]!=""){
			$sql.=" WHERE name LIKE '".'%'.@$_POST["searchSupName"].'%'."'";	
		}
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		return $result;
	}
	public function getAllSupplierByRows($start,$no_of_record){
		$sql="select * from tbl_supplier";
		if(@$_POST["searchSupName"]!=""){
			$sql.=" WHERE name LIKE '".'%'.@$_POST["searchSupName"].'%'."'";	
		}
		$sql.=" limit $start,$no_of_record";
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		return $result;
	}
	public function getSupplierByName($searchSupplierName){
		$sql="select * from tbl_supplier where name=:suppliername";

		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":suppliername", $searchSupplierName);
		$result=$this->executeQuery();
		return $result;
	}

	public function updateMerchantBlock($merchant_id){
		$sql="select * from tbl_merchant where merchant_id=:merchant_id";
		//$sql="update tbl_merchant set delete_status=1 where merchant_id=:merchant_id";

		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":merchant_id", $merchant_id);
		$result=$this->executeQuery();

		foreach ($result as $key=>$value){

			if($value["delete_status"]!=1)
			$sqlUpdate="update tbl_merchant set delete_status=1 where merchant_id=:merchant_id";
			else
			$sqlUpdate="update tbl_merchant set delete_status=0 where merchant_id=:merchant_id";
			$this->prepareQuery($sqlUpdate);
			$this->bindQueryParam(":merchant_id", $merchant_id);
			$this->executeQuery();
		}

	}
	
 public function deleteProductCategory(){
        $sql = "update tbl_product_category set delete_status=1 where product_category_id=".$_GET['prod_cat_id'];
        $this->openDB();
        $this->prepareQuery($sql);
        $this->executeQuery();
    }
    
	public function updateSupplierBlock($supplier_id){
		$sql="select * from tbl_supplier where supplier_id=:supplier_id";
		//$sql="update tbl_merchant set delete_status=1 where merchant_id=:merchant_id";

		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":supplier_id", $supplier_id);
		$result=$this->executeQuery();

		foreach ($result as $key=>$value){

			if($value["delete_status"]!=1)
			$sqlUpdate="update tbl_supplier set delete_status=1 where supplier_id=:supplier_id";
			else
			$sqlUpdate="update tbl_supplier set delete_status=0 where supplier_id=:supplier_id";
			$this->prepareQuery($sqlUpdate);
			$this->bindQueryParam(":supplier_id", $supplier_id);
			$this->executeQuery();
		}
	}
}
