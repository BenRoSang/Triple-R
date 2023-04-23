<?php
class ProductDao extends DAO{

	public function saveProduct(){
		$supplier_id = $_SESSION['loginUser'][0]['supplier_id'];
		$product_name = $_POST['p_name'];
		$product_cat_id = $_POST['cat_id'];
		$product_quantity = $_POST['p_quantity'];
		$path = store_uploaded_img($_FILES['p_file'],"./images/product/"); 
		$sql = "insert into tbl_product values (null, '$product_name','$path' , '$product_quantity', 0, 0,'$product_cat_id', '$supplier_id')";

		$this->openDB();
		$this->prepareQuery($sql);
		$this->bindQueryParam(":product_name", $product_name);
		$this->bindQueryParam(":product_file_name", $path);
		$this->bindQueryParam(":product_cat_id", $product_cat_id);
		$this->bindQueryParam(":product_quantity", $product_quantity);
		$this->beginTrans();
		$result = $this->executeUpdate();


		if($result){
			$this->commitTrans();
		}else{
			$this->rollbackTrans();
		}

	}

	public function getAllProduct(){
		$supplier_id = $_SESSION['loginUser'][0]['supplier_id'];
		//$sql = "select * from tbl_product where approve_status=0 and delete_status=0 and supplier_id=".$supplier_id;
		$sql = "select tbl_product.*,tbl_product_category.unit_type_name,tbl_product_category.minimum_quantity from tbl_product,tbl_product_category where tbl_product.product_category_id=tbl_product_category.product_category_id and tbl_product.delete_status=0 and tbl_product.supplier_id=".$supplier_id;

		$this->openDB();
		$this->prepareQuery($sql);
		$result = $this->executeQuery();
		return $result;
	}

	public function DeleteProduct(){
		$sql = "update tbl_product set delete_status=1 where product_id=".$_GET['p_id'];
		$this->openDB();
		$this->prepareQuery($sql);
		$this->executeQuery();
	}

	public function EditProduct(){
		$sql = "select tbl_product.*,tbl_product_category.unit_type_name,tbl_product_category.minimum_quantity from tbl_product,tbl_product_category where tbl_product.product_category_id= tbl_product_category.product_category_id and product_id=".$_GET['p_id'];
		$this->openDB();
		$this->prepareQuery($sql);
		$result = $this->executeQuery();
		return $result;
	}

	public function saveEditProduct(){

		$product_id = $_POST['p_id'];
		$product_name = $_POST['p_name'];
		$product_cat_id = $_POST['cat_id'];
		$product_quantity = $_POST['p_quantity'];

		if (!empty($_FILES['new_p_file']['name'])){
			// $product_file = $_FILES['new_p_file'];
			// $product_file_name = $product_file['name'];
			// $product_file_tmp_name = $product_file['tmp_name'];
			// $product_file_destination = "images/".$product_file_name;
			// move_uploaded_file($product_file_tmp_name, $product_file_destination);

			$product_file_name=store_uploaded_img($_FILES['new_p_file'], "./images/product/");
		}else{
			$product_file_name = $_POST['old_p_file'];
		}

		$sql = "update tbl_product set product_name='$product_name',quantity='$product_quantity',image='$product_file_name',product_category_id='$product_cat_id' where product_id=".$_POST['p_id'];

		$this->openDB();
		$this->prepareQuery($sql);
		$this->beginTrans();
		$result = $this->executeUpdate();


		if($result){
			$this->commitTrans();
		}else{
			$this->rollbackTrans();
		}
	}
	//for foreach data
	public function getAllPostByRows($start,$no_of_record){		
		$sql="select tbl_product.*,tbl_product_category.product_category_name from tbl_product,tbl_product_category WHERE tbl_product.product_category_id=tbl_product_category.product_category_id and tbl_product.approve_status=0 and tbl_product.delete_status=0";
		if(@$_POST["ajax"]!=""){
			$sql.=" AND tbl_product.product_name LIKE '".'%'.@$_POST["ajax"].'%'."'";
		}
		$sql.=" ORDER BY tbl_product.product_id limit $start,$no_of_record";
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		return $result;		
	}
	public function getAllPost(){
		/*$sql="select select tbl_product.image,tbl_product.product_name,tbl_product.quantity,
		 tbl_product_category.product_category_name,tbl_supplier.name as supplier_name,tbl_supplier.phone
		 from tbl_product,tbl_supplier,tbl_product_category where tbl_product.product_category_id=tbl_product_category.product_category_id
		 AND tbl_supplier.supplier_id = tbl_product.supplier_id";*/
		$sql="select tbl_product.* from tbl_product,tbl_product_category
		 WHERE tbl_product.product_category_id=tbl_product_category.product_category_id AND tbl_product.approve_status=1 AND tbl_product.delete_status!=1";
		if(@$_POST["ajax"]!=""){
			$sql.=" AND tbl_product.product_name LIKE '".'%'.@$_POST["ajax"].'%'."'";
		}
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		return count($result);
	}
	//for Detail data
	public function getProductById($productId){
		$sql="select tbl_product.image,tbl_product.product_name,tbl_product.quantity,
tbl_product_category.product_category_name,tbl_supplier.name as supplier_name,tbl_supplier.phone,tbl_product_category.unit_type_name
 from tbl_product,tbl_supplier,tbl_product_category where tbl_product.product_category_id=tbl_product_category.product_category_id 
 AND tbl_supplier.supplier_id = tbl_product.supplier_id
 AND tbl_product.product_id=$productId";
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		return $result;
	}
	//Ajax search
	public function getAllData($search){
		/*$sql="select tbl_product.*,tbl_product_category.product_category_name
		 from tbl_product,tbl_product_category  LIKE '%$_POST[ajax]%'";*/
		$sql="select * from tbl_product,tbl_product_category
		where tbl_product.product_category_id=tbl_product_category.product_category_id
		 and product_name LIKE '%$search%'";
		$this->openDB();
		$this->prepareQuery($sql);
		//$this->bindQueryParam("", $value)
		$result=$this->executeQuery();
		return $result;
	}
	//Admin Start
	public function getAllProductList(){
		$sql="SELECT tbl_product.*,tbl_supplier.*,tbl_product_category.product_category_name FROM tbl_product,tbl_supplier,tbl_product_category WHERE tbl_product.supplier_id=tbl_supplier.supplier_id AND tbl_product.product_category_id = tbl_product_category.product_category_id AND tbl_product.delete_status!=1";		
		if(isset($_POST["selectedApprovedStatus"]) && @$_POST["selectedApprovedStatus"]!=2)
			$sql.=" AND tbl_product.approve_status=".@$_POST["selectedApprovedStatus"];
		if(!isset($_POST["selectedApprovedStatus"]))
			$sql.=" AND tbl_product.approve_status=0";
		if(isset($_POST["selectedProductCategory"]) && @$_POST["selectedProductCategory"]!="")
			$sql.=" AND tbl_product.product_category_id=".@$_POST["selectedProductCategory"];
		if(@$_POST["txtAdminProductSearch"]!="")
			$sql.=" AND tbl_product.product_name LIKE '".'%'.@$_POST["txtAdminProductSearch"].'%'."'";				
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		$this->closeDB();		
		return $result;
	}
	public function getAllProductListByRows($start,$no_of_rows){
		$sql="SELECT tbl_product.*,tbl_supplier.*,tbl_product_category.product_category_name FROM tbl_product,tbl_supplier,tbl_product_category WHERE tbl_product.supplier_id=tbl_supplier.supplier_id AND tbl_product.product_category_id = tbl_product_category.product_category_id AND tbl_product.delete_status!=1";		
		if(isset($_POST["selectedApprovedStatus"]) && @$_POST["selectedApprovedStatus"]!=2)
			$sql.=" AND tbl_product.approve_status=".@$_POST["selectedApprovedStatus"];
		if(!isset($_POST["selectedApprovedStatus"]))
			$sql.=" AND tbl_product.approve_status=0";
		if(isset($_POST["selectedProductCategory"]) && @$_POST["selectedProductCategory"]!="")
			$sql.=" AND tbl_product.product_category_id=".@$_POST["selectedProductCategory"];
		if(@$_POST["txtAdminProductSearch"]!="")
			$sql.=" AND tbl_product.product_name LIKE '".'%'.@$_POST["txtAdminProductSearch"].'%'."'";		
		$sql.=" LIMIT $start,$no_of_rows";				
		$this->openDB();
		$this->prepareQuery($sql);
		$result=$this->executeQuery();
		$this->closeDB();		
		return $result;
	}
	public function approvedProduct($productId){
		$sql="UPDATE tbl_product SET approve_status=1 WHERE product_id=".$productId;
		$this->openDB();
		$this->prepareQuery($sql);
		$this->beginTrans();
		$result=$this->executeUpdate();
		if($result)$this->commitTrans();
		else $this->rollbackTrans();
		$this->closeDB();
	}
 	public function deleteProgrammeCategory(){
        $sql = "update tbl_programme_category set delete_status=1 where programme_category_id=".$_GET['prog_cat_id'];
        $this->openDB();
        $this->prepareQuery($sql);
        $this->executeQuery();
    }
	//Admin End

}

