<?php
class PostProductController{
	public function renderPostProductCreate(){
		return new PostProductCreateView();
	}
	public function renderPostProduct(){
		return new PostProductView();
	}
	public function renderPostProductUpdate(){
		return new PostProductUpdateView();
	}
	public function renderMerchantPostProduct(){
		return new PostProductMerchantView();
	}
}