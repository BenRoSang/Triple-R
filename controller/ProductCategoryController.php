<?php
class ProductCategoryController{
   
    
    public function renderAllProductCategory(){
            $_SESSION["page_title"]="Product Category";
            $limit_no_of_record=5;//no of record per page
            $productCategorydao=new ProductCategoryDao();
            $no_of_all_records=$productCategorydao->getAllCategory();//total no of records
            
            //$allCategory=$ProgrammeCategorydao->getAllCategory();
            $maxpage=ceil($no_of_all_records/$limit_no_of_record); // total page
            if(@$_GET["page"]<1) $page=1;
            elseif(@$_GET["page"]>$maxpage) $page=$maxpage;
            else $page=$_GET["page"];
            $_SESSION['page']=$page;
            $start_from = ($page-1) * $limit_no_of_record ;
            $categorybylimit=$productCategorydao->getAllCategoryByRows($start_from,$limit_no_of_record);
            
            
            return new AllProductCategoryView($categorybylimit,$no_of_all_records,$start_from);
        }
        
        public function renderAllProductCategoryUpload(){
            
            $uploaddao=new ProductCategoryDao();
            $uploaddao->insertProductCategory();
            $_SESSION["page_title"]="Product Category";
            return $this->renderAllProductCategory();
            
        }
        
        public function renderAllProductCategoryDelete(){
            $_SESSION["page_title"]="Product Category";
            if(isset($_GET['prod_cat_id'])){
                $deletedao=new AdminDao();
                $deletedao->deleteProductCategory();
            }
            
            return $this->renderAllProductCategory();
        }
        public function renderAllProductCategoryEdit(){
            $_SESSION["page_title"]="Product Category";
            $editdao=new ProductCategoryDao();
            $editdao->editProductCategory();
            return $this->renderAllProductCategory();
            }
            
          
        }
      

        
	
	