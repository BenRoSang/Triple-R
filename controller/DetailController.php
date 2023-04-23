<?php
class DetailController{

	public function renderPostProductDetail(){//for detail data
		$_SESSION["page_title"]="Product Detail";
		$productDao=new ProductDao();
		$Product=$productDao->getProductById($_GET["productId"]);
		return new PostProductDetailView($Product);
	}

	public function renderBack(){
		$limit_no_of_record=3;//no of record per page
		$productdao=new ProductDao();
		$no_of_all_records=$productdao->getAllPost();//total no of records
		$maxpage=ceil($no_of_all_records/$limit_no_of_record); // total page
		//control
		if(@$_GET["page"]<1) $page=1;
		elseif(@$_GET["page"]>$maxpage) $page=$maxpage;
		else $page=$_GET["page"];
		$_SESSION['page']=$page;

		$start_from = ($page-1) * 3;
		$productbylimit=$productdao->getAllPostByRows($start_from,$limit_no_of_record);
		$_SESSION["page_title"]="Product List";
		return new PostProductMerchantView($productbylimit,$no_of_all_records,$start_from);
	}

}