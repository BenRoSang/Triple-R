<?php
class ProductCategoryDao extends DAO{
	/*
	public function getAllProductCategory(){
		$sql = "select * from tbl_product_category";
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		
		return $result;
	}*/
	
	public function getProductCategoryUnit($cat_id){
		$sql = "select * from tbl_product_category where product_category_id =:cat_id";
		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":cat_id", $cat_id);
		$result=$this->executeQuery();
		
		return $result;
	}
//Admin Start
public function getAllProductCategory(){
		$sql="select product_category_id,product_category_name from tbl_product_category where delete_status!=1";
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();   	
		$this->closeDB();
		return $result;
	}
    public function getAllCategoryByRows($start,$no_of_record){
        $sql="select * from tbl_product_category limit $start,$no_of_record";
        $this->openDB();
        $this->prepareQuery($sql);
        $result=$this->executeQuery();
        return $result;
    }
    
    public function getAllCategory(){
        $sql="select * from tbl_product_category";
        $this->openDB();
        $this->prepareQuery($sql);
        $result=$this->executeQuery();
        return count($result);
    }
    
    public function editProductCategory(){
        $producteditname=$_POST['producttype'];
        $producteditunit=$_POST['unittype'];
        $id=$_POST['productid'];
        $productquantity=$_POST['quantity'];      
        $sql="update tbl_product_category set product_category_name=:name,unit_type_name=:unit,minimum_quantity=:quantity where product_category_id=:id";
        $this->openDB();
       
        $this->prepareQuery($sql);
        
        $this->bindQueryParam(":name", $producteditname);
        $this->bindQueryParam(":unit", $producteditunit);
        $this->bindQueryParam(":quantity", $productquantity);        
        $this->bindQueryParam(":id", $id);
        
        
        $this->beginTrans();
        $result=$this->executeUpdate();
        if ($result) {
            $this->commitTrans();
        }else {
            $this->rollbackTrans();
        }
    }
    
    public function insertProductCategory(){
        $product_type_name=$_POST['producttypename'];
        $unit_type_name=$_POST['unittypename'];
        $minimum_quantity=$_POST['minimumquantity'];
        //$delete_status=$_POST['deletestatus'];
      
        $sql="INSERT INTO tbl_product_category VALUES(NULL,:producttypename,:unittypename,:minimumquantity,:deletestatus)";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam("producttypename", $product_type_name);
        $this->bindQueryParam("unittypename", $unit_type_name);
        $this->bindQueryParam("minimumquantity", $minimum_quantity);
        $this->bindQueryParam("deletestatus", 0);
        
       
        $this->beginTrans();
        $result=$this->executeUpdate();
        if ($result) {
            $this->commitTrans();
        }else {
            $this->rollbackTrans();
        }
    }
//admin end

	
}