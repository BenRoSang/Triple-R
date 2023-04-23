<?php
class PostProductUpdateView extends View{
	public function displayBody(){?>
		<div class="container-fluid p-0">
		<div class="login-bg-img"></div>
		<div class="row">
			
		    <div class="col-md-7">
		    	<div class="card">
				  <div class="card-header">
				   	<h2 class="text-center text-white">Update Post Product</h2>
				  </div>
				  <div class="card-body">
				    <form class="m-2">
					 <div class="form-group" align="center">
						    <label for="ImageID"><img src="ImageURL"></label>
						    <input type="file" id="ImageID"/>
					  </div>
					 <div class="form-group">
					    <label for="productcategoryid[]" class="text-muted">Product Category Name</label>
					    <select name="productcategoryid[]" class="form-control form-control-lg rounded-pill" id="productcategoryid">
						<option value="glass">Glass</option>
						<option value="plastic">Plastic</option>
					    </select>
					  </div>
					 <div class="form-group">
					    <label for="lblunittypename" class="text-muted">Unit Type Name</label>
					    <input name="lblunittypename" class="form-control form-control-lg rounded-pill" id="lblunittypename" disabled>
					  </div>
					<div class="form-group">
					    <label for="lblquantity" class="text-muted">Quantity</label>
					    <input type="text" name="l_quantity" class="form-control form-control-lg rounded-pill" id="lbladdress">
					  </div>
					

					  <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill font-weight-bold">UPDATE</button>
					</form>
				  </div>
				</div>
		   	 </div>
		   	 </div>
		   	 </div>
<?php }
}
?>