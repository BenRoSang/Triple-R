<?php 

class ProductEditView extends View{
	
	private $errors;
	public function __construct($errors = null){
		
		$this->errors = $errors;
	}
	
	public function displayBody(){

		$productEditDao = new ProductDao();
		$getProduct = $productEditDao->EditProduct();

		$all_Cat_dao = new ProductCategoryDao();
		$all_cat = $all_Cat_dao->getAllProductCategory();

		?>


    <div class="jumbotron jumbotron-fluid mb-3">
        <div class="container-fluid">
            <div class="d-flex ml-5 pl-2">
                <div>
                    <img src="images/logo/avatar2.png" class="mb-3" alt="Avatar Image" style="width: 80px; height: 80px; border-radius: 50%;">
                </div>

                <div style="margin: 20px 0 0 15px; text-transform: uppercase;">
                    <span style="font-size: 20px; margin: 50px 0px 0px 0px" class="text-muted  border-bottom border-primary font-weight-bold"><?php echo $_SESSION['loginUser'][0]['name']?></span>
                </div>
            </div>
        </div>
    </div>

<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3 my-5">
			<h3 class="text-center">Edit Product</h3>
			<form method="post" enctype="multipart/form-data">

				<?php foreach ($getProduct as $key => $editProduct) {?>
					
				<div class="form-group">
					<label for="InputUsername" class="text-muted">Product Name</label> 
					<input
						type="text" name="p_name"
						class="form-control form-control-lg rounded-pill"
						id="InputUsername"
						 value="<?php echo $editProduct['product_name'] ?>">


						<?php if (isset($this->errors["p_name_null"])) {
							echo "<span class='text-danger'>".$this->errors["p_name_null"]."</span>";
						} ?>
				</div>
				
				<div class="form-group">
					<label class="text-muted">Product Type</label> 
						<select class="form-control form-control-lg" name="cat_id" onchange="form.submit()">
						<option value="">--Select--</option>
						<?php 
							foreach ($all_cat as $key=>$value){
								if ($editProduct['product_category_id'] == $value['product_category_id']) {?>
									<option value="<?= $value['product_category_id']?>" selected="selected"><?= $value['product_category_name']?></option>

								<?php }else{?>
								<option value="<?= $value['product_category_id']?>"><?= $value['product_category_name']?></option>
						<?php 
							}
						}
						?>
						<?php if (isset($this->errors["cat_id_null"])) {
							echo "<span class='text-danger'>".$this->errors["cat_id_null"]."</span>";
						} ?>
						
					</select>
				</div>

				<div class="form-group">
					<label class="text-muted">Choose Image</label><br>
					
						<img src="<?php echo $editProduct['image'] ?>" width="200" height="200">
						
						<input type="hidden" name="old_p_file" value="<?php echo $editProduct['image'] ?>">
						
						<input type="hidden" name="p_id" value="<?php echo $editProduct['product_id'] ?>">	
						
						
						<input type="file" name="new_p_file" id="inputGroupFile02">
						
						<?php if (isset($this->errors["p_file_null"])) {
							echo "<span class='text-danger'>".$this->errors["p_file_null"]."</span>";
						} ?>

				</div>

				<div class="form-group">
					<label for="InputQuantity" class="text-muted">Quantity</label> 
					<div class="d-flex">
						<input type="number" name="p_quantity" class="form-control form-control-lg rounded-pill col-8" id="InputQuantity" value="<?php echo $editProduct['quantity'] ?>">
						<input type="hidden" name="hddminimum_quantity" value="<?php echo $editProduct['minimum_quantity'] ?>">
						<span class="col-4 mt-2 text-muted"><?php  echo $editProduct["unit_type_name"]." Minimum is ". $editProduct["minimum_quantity"] ?></span>
						<?php if (isset($cat_row)) {
							foreach ($cat_row as $key => $value) {?>
								<input type="hidden" name="unit_type" value="<?= $value['unit_type_name'] ?>">
								<span class="col-4 text-uppercase mt-2 text-muted"><?php  echo $value["unit_type_name"]." Minimum ". $value["minimum_quantity"] ?></span>
								
						<?php }
						} ?>
					</div>


					<?php if (isset($this->errors["p_quantity_null"])) {
							echo "<span class='text-danger'>".$this->errors["p_quantity_null"]."</span>";
						} 
						if (isset($this->errors["p_minimum_quantity"])) {
							echo "<span class='text-danger'>".$this->errors["p_minimum_quantity"]."</span>";
						}?>
					

				</div>

				<?php }//foreach for editProduct ?>
				<div class="text-center">
					<button type="submit" class="btn btn-color rounded-pill" name="btnProductEdit">UPDATE</button>
					<a href="index.php?usecase=<?php echo UC_SUPPLIER;?>" class="btn btn-secondary rounded-pill text-white">CANCEL</a>
				</div>
				
				<?php if (isset($this->errors["all_null"])) {
							echo "<span class='text-danger'>".$this->errors["all_null"]."</span>";
						} ?>
			</form>
		</div>
	</div>
</div>

<style>
	.jumbotron { padding: 2rem 2rem 0rem 0rem; }
</style>

	<?php }
}