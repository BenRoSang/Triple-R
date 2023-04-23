<?php
class SupplierUpdateProfileConfirmView extends View{
	public function displayBody(){?>
		<div class="container-fluid p-0">
			
		    <div class="col-md-6 offset-md-3">
		    	<div class="card reg-card">
				  <div class="card-header login-card-header">
				   	<h3 class="text-center text-white">Supplier Update Confirmation</h3>
				  </div>
				  <div class="card-body">
				    <form class="m-2" method="post">
					 <div class="form-group">
					    <label for="lblsuppliername" class="text-muted">Supplier Name</label>
					    <input type="text" name="updSName" value="<?php echo $_POST["updSName"]?>" disabled="disabled" class="form-control form-control-lg rounded-pill" id="lblsuppliername">
					    <input type="hidden" name="updSName" value="<?php echo $_POST["updSName"]?>">
					  </div>
					<div class="form-group">
					    <label for="lbladdress" class="text-muted">Email address</label>
					    <input type="text" name="updSEmail" value="<?php echo @$_POST["updSEmail"]?>" disabled="disabled" class="form-control form-control-lg rounded-pill" id="lbladdress">
					  	<input type="hidden" name="updSEmail" value="<?php echo @$_POST["updSEmail"]?>">
					  </div>
					 <div class="form-group">
					    <label for="lblphone" class="text-muted">Password</label>
					    <input type="password" name="updSPass" value="<?php echo @$_POST["updSPass"]?>" disabled="disabled" class="form-control form-control-lg rounded-pill" id="lblphone">
					  	<input type="hidden" name="updSPass" value="<?php echo @$_POST["updSPass"]?>">
					  </div>
					  <div class="form-group">
					    <label for="lblemail" class="text-muted">Confirm Password</label>
					    <input type="password" name="updSCPass" value="<?php echo @$_POST["updSCPass"]?>" disabled="disabled" class="form-control form-control-lg rounded-pill" id="lblemail" aria-describedby="emailHelp" >
					  	<input type="hidden" name="updSCPass" value="<?php echo @$_POST["updSCPass"]?>">
					  </div>
					   
					 <div class="form-group">
					    <label for="lblcnfpassword" class="text-muted">Address</label>
					    <textarea name="updSAddress" disabled="disabled" class="form-control form-control-lg rounded-pill" id="address"><?php echo @$_POST["updSAddress"]?></textarea>
					  	<input type="hidden" name="updSAddress" value="<?php echo @$_POST["updSAddress"]?>">
					  </div>

					  <div class="text-center">
					  		<button type="submit" class="btn btn-color rounded-pill" name="btnSupplierUpdateConfirm" style="width: 120px">CONFRIM</button>
					  		<a href="index.php?usecase=<?php  ?>" class="btn btn-secondary rounded-pill text-white" style="width: 120px">CANCEL</a>
					  </div>
					</form>
				  </div>
				</div>
		   	 </div>	
		   	 </div>	
<?php }
}
?>