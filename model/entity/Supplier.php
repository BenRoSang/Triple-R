<?php
class Supplier
{
	private $supplier_id;
	private $supplier_name;
	private $supplier_email;
	private $supplier_password;
	private $supplier_phone;
	private $supplier_address;
	private $supplier_status;
	
	public function getSupplierId()
	{
		return $this->supplier_id;
	}
	public function setSupplierId($supplier_id)
	{
		$this->supplier_id=$supplier_id;
	}
	public function getSupplierName()
	{
		return $this->supplier_name;
	}
	public function setSupplierName($supplier_name)
	{
		$this->supplier_name=$supplier_name;
	}
	public function getSupplierEmail()
	{
		return $this->supplier_email;
	}
	public function setSupplierEmail($supplier_email)
	{
		$this->supplier_email=$supplier_email;
	}
	public function getSupplierPassword()
	{
		return $this->supplier_password;
	}
	public function setSupplierPassword($supplier_password)
	{
		$this->supplier_password=$supplier_password;
	}
	public function getSupplierPhone()
	{
		return $this->supplier_phone;
	}
	public function setSupplierPhone($supplier_phone)
	{
		$this->supplier_phone=$supplier_phone;
	}
	public function getSupplierAddress()
	{
		return $this->supplier_address;
	}
	public function setSupplierAddress($supplier_address)
	{
		$this->supplier_address=$supplier_address;
	}
	public function getSupplierStatus()
	{
		return $this->supplier_status;
	}
	public function setSupplierStatus($supplier_status)
	{
		$this->supplier_status=$supplier_status;
	}
	

	
}