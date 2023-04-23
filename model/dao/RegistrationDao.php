<?php
class RegistrationDao extends DAO
{
	public function getMerchantByMerchantName($merchant_email)
	{
		$sql="select * from tbl_merchant where email=:email and delete_status!=1";
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":email",$merchant_email);
		//$this->bindQueryParam(":password",$merchant_password);
		$result=$this->executeQuery();
		return $result;
	}

	public function getSupplierBySupplierName($supplier_email)
	{
		$sql="select * from tbl_supplier where email=:email and delete_status!=1";
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":email",$supplier_email);
		//$this->bindQueryParam(":password",$merchant_password);
		$result=$this->executeQuery();
		return $result;
	}

	public function saveMerchant()
	{
		$sql="insert into tbl_merchant values(null,:name,:email,:password,:phone,:address,:status)";
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":name",$_SESSION["reg_user"]->getMerchantName());
		$this->bindQueryParam(":email",$_SESSION["reg_user"]->getMerchantEmail());
		$this->bindQueryParam(":password",md5($_SESSION["reg_user"]->getMerchantPassword()));
		//$this->bindQueryParam(":cpassword",$_SESSION["reg_user"]->getCPassword());
		$this->bindQueryParam(":address",$_SESSION["reg_user"]->getMerchantAddress());		
		$this->bindQueryParam(":phone",$_SESSION["reg_user"]->getMerchantPhone());
		$this->bindQueryParam(":status",$_SESSION["reg_user"]->getMerchantStatus());
		

		$this->beginTrans();
		$result=$this->executeUpdate();

		if($result) $this->commitTrans();
		else $this->rollbackTrans();

		if(isset($_SESSION["reg_user"]))
		unset($_SESSION["reg_user"]);
	}
	
	public function saveSupplier()
	{
		$supplier_name = $_SESSION["reg_Suser"]->getSupplierName();
		$supplier_email = $_SESSION["reg_Suser"]->getSupplierEmail();
		$supplier_password = md5($_SESSION["reg_Suser"]->getSupplierPassword());
		$supplier_address = $_SESSION["reg_Suser"]->getSupplierAddress();
		$supplier_phone = $_SESSION["reg_Suser"]->getSupplierPhone();
		$supplier_status = $_SESSION["reg_Suser"]->getSupplierStatus();

		$sql="insert into tbl_supplier values(null,'$supplier_name','$supplier_email','$supplier_password','$supplier_phone','$supplier_address','$supplier_status')";

		

		$this->openDB();
		$this->prepareQuery($sql);
		/*$this->bindQueryParam(":supplier_name",$_SESSION["reg_Suser"]->getSupplierName());
		$this->bindQueryParam(":supplier_email",$_SESSION["reg_Suser"]->getSupplierEmail());
		$this->bindQueryParam(":supplier_password",md5($_SESSION["reg_Suser"]->getSupplierPassword()));
		$this->bindQueryParam(":cpassword",$_SESSION["reg_user"]->getCPassword());
		$this->bindQueryParam(":supplier_address",$_SESSION["reg_Suser"]->getSupplierAddress());		
		$this->bindQueryParam(":supplier_phone",$_SESSION["reg_Suser"]->getSupplierPhone());
		$this->bindQueryParam(":supplier_status",$_SESSION["reg_Suser"]->getSupplierStatus());*/
		
		$this->beginTrans();
		$result=$this->executeUpdate();

		if($result) $this->commitTrans();
		else $this->rollbackTrans();

		if(isset($_SESSION["reg_Suser"]))
		unset($_SESSION["reg_Suser"]);
	}
public function updateSupplier(){
		
		$sql="update tbl_supplier set name=:name,email=:email,password=:password,address=:address where email=:email";
		
		$this->openDB();
		$this->prepareQuery($sql);
		
		$this->bindQueryParam(":name",$_SESSION["update_Suser"][0]["name"]);
		$this->bindQueryParam(":email",$_SESSION["update_Suser"][0]["email"]);
		$this->bindQueryParam(":password",$_SESSION["update_Suser"][0]["password"]);
		//$this->bindQueryParam(":phone",$_SESSION["update_user"][0]["telephone"]);
		$this->bindQueryParam(":address",$_SESSION["update_Suser"][0]["address"]);
		$this->bindQueryParam(":id",$_SESSION["update_Suser"][0]["supplier_id"]);
		
		$this->beginTrans();
		$result=$this->executeUpdate();
		if($result)
			$this->commitTrans();
		else 
			$this->rollbackTrans();
		
			
			$_SESSION["loginUser"]=$_SESSION["update_Suser"];
	}
	
	public function updateMerchant(){
		
		$sql="update tbl_merchant set name=:mname,email=:memail,password=:mpassword,address=:maddress where email=:memail";
		
		$this->openDB();
		$this->prepareQuery($sql);
		
		$this->bindQueryParam(":mname",$_SESSION["update_user"][0]["name"]);
		$this->bindQueryParam(":memail",$_SESSION["update_user"][0]["email"]);
		$this->bindQueryParam(":mpassword",$_SESSION["update_user"][0]["password"]);
		//$this->bindQueryParam(":phone",$_SESSION["update_user"][0]["telephone"]);
		$this->bindQueryParam(":maddress",$_SESSION["update_user"][0]["address"]);
		$this->bindQueryParam(":id",$_SESSION["update_user"][0]["merchant_id"]);
		
		$this->beginTrans();
		$result=$this->executeUpdate();
		if($result)
			$this->commitTrans();
		else 
			$this->rollbackTrans();
		
			
			$_SESSION["loginUser"]=$_SESSION["update_user"];
	}
	
	public function getAllSupplier(){
		$sql = "select * from tbl_supplier";
		$this->openDB();
		$this->prepareQuery($sql);
		$result = $this->executeQuery();
		return $result;
		
	}
	
	public function getAllMerchant(){
		$sql = "select * from tbl_merchant";
		$this->openDB();
		$this->prepareQuery($sql);
		$result = $this->executeQuery();
		return $result;
	}
}