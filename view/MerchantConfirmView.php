<?php
class MerchantConfirmView extends View{
	public function displayBody(){?>
		<div class="container-fluid p-0">
		
			
		    <div class="col-md-6 offset-md-3">
		    	<div class="card reg-card">
				  <div class="card-header login-card-header">
				   	<h2 class="text-center text-white">Customer Confirmation</h2>
				  </div>
				  <div class="card-body">
				    <form class="m-2" method="post">
					 <div class="form-group">
					    <label for="lblsuppliername" class="text-muted">Customer Name</label>
					    <input type="text" name="regName" class="form-control form-control-lg rounded-pill" id="lblsuppliername" value="<?php echo $_POST["regName"]?>" disabled="disabled">
					  </div>
					<div class="form-group">
					    <label for="lbladdress" class="text-muted">Email address</label>
					    <input type="text" name="regEmail" class="form-control form-control-lg rounded-pill" id="lbladdress" value="<?php echo @$_POST["regEmail"]?>" disabled="disabled">
					  </div>
					<div class="form-group">
					    <label for="lblphone" class="text-muted">Password</label>
					    <input type="password" name="regPass" class="form-control form-control-lg rounded-pill" id="lblphone" value="<?php echo @$_POST["regPass"]?>" disabled="disabled">
					  </div>
					  <div class="form-group">
					    <label for="lblemail" class="text-muted">Confirm Password</label>
					    <input type="password" name="regCPass" class="form-control form-control-lg rounded-pill" id="lblemail" aria-describedby="emailHelp" value="<?php echo @$_POST["regCPass"]?>" disabled="disabled">
					  </div>
					  <div class="form-group">
					    <label for="lblpassword" class="text-muted">Phone</label>
					    <input type="text" name="regPhone" class="form-control form-control-lg rounded-pill" id="lblpassword" value="<?php echo @$_POST["regPhone"]?>" disabled="disabled">
					  </div>
					 <div class="form-group">
					    <label for="lblcnfpassword" class="text-muted">Address</label>
					    <!-- <input type="password" name="l_cpassword" class="form-control form-control-lg rounded-pill" id="lblcnfpassword"> -->
					    <textarea name="regAddress" rows="3" cols="20" class="form-control" id="lblcnfpassword" disabled="disabled"><?php echo @$_POST["regAddress"]?></textarea>
					  </div>

						<div class="form-group" style="text-align: center;">
					  <input type="submit" class="btn btn-color rounded-pill" value="CONFIRM" name="btnMerchantRegisterConfirm">
						<input type="submit" class="btn btn-secondary rounded-pill text-white" value="CANCEL">
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