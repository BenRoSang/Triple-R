<?php
class Merchant
{
	private $merchant_id;
	private $merchant_name;
	private $merchant_email;
	private $merchant_password;
	private $merchant_phone;
	private $merchant_address;
	private $merchant_status;
	
	public function getMerchantId()
	{
		return $this->merchant_id;
	}
	public function setMerchantId($merchant_id)
	{
		$this->merchant_id=$merchant_id;
	}
	public function getMerchantName()
	{
		return $this->merchant_name;
	}
	public function setMerchantName($merchant_name)
	{
		$this->merchant_name=$merchant_name;
	}
	public function getMerchantEmail()
	{
		return $this->merchant_email;
	}
	public function setMerchantEmail($merchant_email)
	{
		$this->merchant_email=$merchant_email;
	}
	public function getMerchantPassword()
	{
		return $this->merchant_password;
	}
	public function setMerchantPassword($merchant_password)
	{
		$this->merchant_password=$merchant_password;
	}
	public function getMerchantPhone()
	{
		return $this->merchant_phone;
	}
	public function setMerchantPhone($merchant_phone)
	{
		$this->merchant_phone=$merchant_phone;
	}
	public function getMerchantAddress()
	{
		return $this->merchant_address;
	}
	public function setMerchantAddress($merchant_address)
	{
		$this->merchant_address=$merchant_address;
	}
	public function getMerchantStatus()
	{
		return $this->merchant_status;
	}
	public function setMerchantStatus($merchant_status)
	{
		$this->merchant_status=$merchant_status;
	}
	

	
}