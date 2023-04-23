<?php 

class ProductEditController{
	public function renderProductEdit(){
		$_SESSION["page_title"]="Update Product";
		return new ProductEditView();
	}
	
	public function renderProductEditCheck(){
		
	if($_POST['p_name'] == "" && $_POST['cat_id'] =="" && $_POST['p_quantity'] == ""){
			$errors['all_null'] = "Please enter all required fills!";
		}else{
			if($_POST['p_name'] == ""){
				$errors['p_name_null'] = "Please enter product name!";
			}
			

			if($_POST['cat_id'] == ""){
				$errors['cat_id_null'] = "Please choose product type!";
			}

			if($_POST['p_quantity'] == ""){
				$errors['p_quantity_null'] = "Please enter quantity!";
			}
			elseif($_POST['p_quantity']<$_POST["hddminimum_quantity"]){
				$errors['p_minimum_quantity'] = "Your quantity is lower than minimum quantity!";
			}
			
		}
		if (isset($errors)){
			return new ProductEditView($errors);
		}else{
			
			$editProductDao = new ProductDao();
			$editedProduct = $editProductDao->saveEditProduct();
			$_SESSION["page_title"]="Product List";
			return new SupplierView();
		}		
	}
}