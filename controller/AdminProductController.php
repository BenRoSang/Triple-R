<?php
/**
 * 
 */
class AdminProductController 
{	
public function renderAdminProductList()
	{
		$_SESSION["page_title"]="Product List";
		$productDao=new ProductDao();
		if(isset($_POST["btnApproveStatus"]) && $_POST["approvedProductId"] != "")
		{
			$productDao->approvedProduct($_POST["approvedProductId"]);
		}
		$productCategoryDao=new ProductCategoryDao();
		$productCategory=$productCategoryDao->getAllProductCategory();
		if(isset($_POST["selectedApprovedStatus"])){
			$_SESSION["approved_status"]=$_POST["selectedApprovedStatus"];
		}/*
		if(@$_POST["txtAdminProductSearch"]!=""){
			$_SESSION["product_search"]=$_POST["txtAdminProductSearch"];
		}
		if(isset($_POST["selectedProductCategory"])){
			if(@$_POST["selectedProductCategory"]!="")
				$_SESSION["product_category"]=$_POST["selectedProductCategory"];
		}*/
		$maxpage=ceil(count($productDao->getAllProductList())/LIMIT_ROWS);
		if(@$_POST["hddProductPageList"]<1)$page=1;
		elseif(@$_POST["hddProductPageList"]>$maxpage)$page=$maxpage;
		else $page=$_POST["hddProductPageList"];
		$_SESSION['page']=$page;
		$start_from=($page-1)*LIMIT_ROWS;
		$product=$productDao->getAllProductListByRows($start_from,LIMIT_ROWS);
		return new AdminProductListView($productCategory,$product);
	}
}