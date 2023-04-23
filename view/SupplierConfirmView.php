<?php
class SupplierConfirmView extends View{
	public function displayBody(){?>
		<div class="container-fluid p-0">
			
		    <div class="col-md-6 offset-md-3">
		    	<div class="card reg-card">
				  <div class="card-header login-card-header">
				   	<h2 class="text-center text-white">Supplier Confirmation</h2>
				  </div>
				  <div class="card-body">
				    <form class="m-2" method="post">
					 <div class="form-group">
					    <label for="lblsuppliername" class="text-muted">Supplier Name</label>
					    <input type="text" name="regSupplierName" class="form-control form-control-lg rounded-pill" id="lblsuppliername" value="<?php echo $_POST["regSupplierName"]?>" disabled="disabled">
					  </div>
					<div class="form-group">
					    <label for="lbladdress" class="text-muted">Email address</label>
					    <input type="text" name="regSupplierEmail" class="form-control form-control-lg rounded-pill" id="lbladdress" value="<?php echo @$_POST["regSupplierEmail"]?>" disabled="disabled">
					  </div>
					<div class="form-group">
					    <label for="lblphone" class="text-muted">Password</label>
					    <input type="password" name="regSupplierPass" class="form-control form-control-lg rounded-pill" id="lblphone" value="<?php echo @$_POST["regSupplierPass"]?>" disabled="disabled">
					  </div>
					  <div class="form-group">
					    <label for="lblemail" class="text-muted">Confirm Password</label>
					    <input type="password" name="regSupplierCPass" class="form-control form-control-lg rounded-pill" id="lblemail" aria-describedby="emailHelp" value="<?php echo @$_POST["regSupplierCPass"]?>" disabled="disabled">
					  </div>
					  <div class="form-group">
					    <label for="lblpassword" class="text-muted">Phone</label>
					    <input type="text" name="regSupplierPhone" class="form-control form-control-lg rounded-pill" id="lblpassword" value="<?php echo @$_POST["regSupplierPhone"]?>" disabled="disabled">
					  </div>
					 <div class="form-group">
					    <label for="lblcnfpassword" class="text-muted">Address</label>
					    <!-- <input type="password" name="l_cpassword" class="form-control form-control-lg rounded-pill" id="lblcnfpassword"> -->
					    <textarea name="regSupplierAddress" rows="3" cols="20" class="form-control" id="lblcnfpassword" disabled="disabled"><?php echo @$_POST["regSupplierAddress"]?></textarea>
					  </div>

					  <!-- <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill font-weight-bold" name="btnMerchantConfirm">CONFRIM</button> -->
						<div class="form-group" style="text-align: center;">
					  <input type="submit" class="btn btn-color rounded-pill" value="Confirm" name="btnSupplierRegisterConfirm">
						<input type="submit" class="btn btn-secondary rounded-pill" value="Cancel">
						</div>
						<?php if(isset($this->errors["all_null"]))
								echo $this->errors["all_null"];
								
							if(isset($this->errors["user_exist"]))
								echo $this->errors["user_exist"];
						?>
					</form>
				  </div>
				</div>
		   	 </div>
		   	 </div>	
<?php }
}
?>