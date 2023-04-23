<?php
class UserDao extends DAO{
	public function getUserBySupEmail($email){
		$sqlSup="select * from tbl_supplier where email='$email'";
		
		$this->openDB();
		$this->prepareQuery($sqlSup);
		$result=$this->executeQuery();
		
		return $result;
	}
	public function updateNewPassword($pass){

		$sup=false;//$mer=false;
		$for_email=$_POST['forgot_email'];

		$sqlSupplier="select email from tbl_supplier";
		$this->openDB();
		$this->prepareQuery($sqlSupplier);
		$resSup=$this->executeQuery();
		
		foreach ($resSup as $key=>$value){
			if($for_email==$value[0]){
				$sup=true;
			}
		}
		if($sup==true){
			$sql="update tbl_supplier set password=$pass where email='$for_email'";
			$this->prepareQuery($sql);
			$this->executeQuery();
		}
		
	}
	public function getUserByMerEmail($email){
	    $sqlSup="select * from tbl_merchant where email='$email'";
	    
	    $this->openDB();
	    $this->prepareQuery($sqlSup);
	    $result=$this->executeQuery();
	    
	    return $result;
	}
	public function updateNewPasswordMer($pass){
	    
	    $sup=false;//$mer=false;
	    $for_email=$_POST['forgot_email'];
	    
	    $sqlSupplier="select email from tbl_merchant";
	    $this->openDB();
	    $this->prepareQuery($sqlSupplier);
	    $resSup=$this->executeQuery();
	    
	    foreach ($resSup as $key=>$value){
	        if($for_email==$value[0]){
	            $sup=true;
	        }
	    }
	    if($sup==true){
	        $sql="update tbl_merchant set password=$pass where email='$for_email'";
	        $this->prepareQuery($sql);
	        $this->executeQuery();
	    }
	    
	}
}