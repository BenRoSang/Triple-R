<?php
class ProductCreateController{
	public function renderProductCreate(){
		$_SESSION["page_title"]="New Product";
		return new ProductCreateView();
	}

	public function renderProductCreateCheck(){

		if($_POST['p_name'] == "" && $_FILES['p_file']['name'] == "" && $_POST['cat_id']=="" && $_POST['p_quantity'] == ""){
			$errors['all_null'] = "Please enter all required fills!";
		}else{
			if($_POST['p_name'] == ""){
				$errors['p_name_null'] = "Please enter product name!";
			}
			
			if ($_FILES['p_file']['name']=="") {
				$errors["p_file_null"] = "Please choose file";
			}

			if($_POST['cat_id'] == ""){
				$errors["cat_id_null"] = "Please choose product type!";
			}

			if($_POST['p_quantity'] == ""){
				$errors['p_quantity_null'] = "Please enter quantity!";
			}
			
			elseif((int)$_POST['p_quantity']<(int)$_POST['min_quantity']){
				$errors['p_quantity_need'] = "Your quantity is lower than minimum quantity!";
			}

		}
		if(!empty($errors)){
			return new ProductCreateView($errors);
		}else{
			$saveProduct = new ProductDao();
			$saveProduct->saveProduct();
			$_SESSION["page_title"]="Product List";
			return new SupplierView();
		}		
	}
}