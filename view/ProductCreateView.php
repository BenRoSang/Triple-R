<?php
class ProductCreateView extends View{
	
	private $errors;
	public function __construct($errors = null){
		
		$this->errors = $errors;
	}
	
	public function displayBody(){
		if(isset($_POST['cat_id'])){
			$catDao=new ProductCategoryDao();
			$cat_row = $catDao->getProductCategoryUnit($_POST['cat_id']);
		}

		$all_Cat_dao = new ProductCategoryDao();
		$all_cat = $all_Cat_dao->getAllProductCategory();
		
	?>

<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3 my-5">
			<h3 class="text-center">Create New Product</h3>
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="InputUsername" class="text-muted">Product Name<span style="color: red" class="ml-2">***</span></label> 
					<input
						type="text" name="p_name"
						class="form-control form-control-lg rounded-pill"
						id="InputUsername" value="<?php if (isset($_POST['cat_id']))echo $_POST['p_name'];?>">
						<?php if (isset($this->errors["p_name_null"])) {
							echo "<span class='text-danger'>".$this->errors["p_name_null"]."</span>";
						} ?>
				</div>
				
				<div class="form-group">
					<label class="text-muted">Product Type<span style="color: red" class="ml-2">***</span></label> 
						<select class="form-control form-control-lg" name="cat_id" onchange="form.submit()">
						<option value="">--Select--</option>
						<?php 
							foreach ($all_cat as $key=>$value){
								if ($_POST['cat_id'] == $value['product_category_id']) {?>
									<option value="<?= $value['product_category_id']?>" selected="selected"><?= $value['product_category_name']?></option>

								<?php }else{?>
								<option value="<?= $value['product_category_id']?>"><?= $value['product_category_name']?></option>
						<?php 
							}
						}
						?>	
					</select>
					<?php if (isset($this->errors["cat_id_null"])) {
							echo "<span class='text-danger'>".$this->errors["cat_id_null"]."</span>";
						} ?>
				</div>

				<div class="form-group">
					<label class="text-muted">Choose Image<span style="color: red" class="ml-2">***</span></label><br>
					<div class="custom-file">

						<input type="file" name="p_file" value="<?php if (isset($_FILES['p_file']))echo $_FILES['p_file'];?>">
						
						<?php if (isset($this->errors["p_file_null"])) {
							echo "<span class='text-danger'>".$this->errors["p_file_null"]."</span>";
						} ?>
					</div>

				</div>

				<div class="form-group">
					<label for="InputQuantity" class="text-muted">Quantity<span style="color: red" class="ml-2">***</span></label> 
					<div class="d-flex">
						<input type="number" name="p_quantity" class="form-control form-control-lg rounded-pill col-8" id="InputQuantity" value="<?php if(isset($_POST['p_quantity'])){
							echo $_POST['p_quantity'];
						} ?>">

						<?php if (isset($cat_row)) {
							foreach ($cat_row as $key => $value) {?>
								<input type="hidden" name="min_quantity" value="<?= $value['minimum_quantity'] ?>">
								<span class="col-4 text-uppercase mt-2 text-muted"><?php  echo $value["unit_type_name"]." Minimum is ". $value["minimum_quantity"] ?></span>
								
						<?php }
						} ?>
					</div>


					<?php if (isset($this->errors["p_quantity_null"])) {
							echo "<span class='text-danger'>".$this->errors["p_quantity_null"]."</span>";
						} ?>
					<?php if (isset($this->errors["p_quantity_need"])) {
							echo "<span class='text-danger'>".$this->errors["p_quantity_need"]."</span>";
						} ?>
					

				</div>
				
				<?php if (isset($this->errors["all_null"])) {
					echo "<span class='text-danger'>".$this->errors["all_null"]."</span>";
				} ?>
				<br>
				<button type="submit" class="btn btn-color rounded-pill mt-2" style="width: 150px" name="btnProductCreate">CREATE</button>
				<a href="index.php?usecase=<?= UC_SUPPLIER ?>" style="width: 150px" class="btn btn-secondary rounded-pill mt-2">CANCEL</a>
			</form>
		</div>
	</div>
</div>
	<?php }
}