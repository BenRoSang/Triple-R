<?php

class ProductCategory{
    private $product_category_id;
    private $product_type_name;
    private $unit_type_name;
    private $minimum_quantity;
    private $delete_status;
    
    public function getProduct_category_id(){
        return $this->product_category_id;
    }
    public function setProduct_category_id($product_category_id){
        $this->product_category_id=$product_category_id;
    }
    
    public function getProduct_type_name(){
        return $this->product_type_name;
    }
    public function setProduct_type_name($product_type_name){
        $this->product_type_name=$product_type_name;
    }
    
    public function getUnit_type_name(){
        return $this->unit_type_name;
    }
    public function setUnit_type_name($unit_type_name){
        $this->unit_type_name=$unit_type_name;
    }
    
    public function getMinimum_quantity(){
        return $this->minimum_quantity;
    }
    public function setMinimum_quantity($minimum_quantity){
        $this->minimum_quantity=$minimum_quantity;
    }
    
    public function getDelete_status(){
        return $this->delete_status;
    }
    public function setDelete_status($delete_status){
        $this->delete_status=$delete_status;
    }
    
    
}