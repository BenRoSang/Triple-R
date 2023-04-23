<?php 
class MerchantUpdateProfileConfirmView extends View{
	public function displayBody(){?>
		<div class="container-fluid p-0">
		
			
		    <div class="col-md-6 offset-md-3">
		    	<div class="card reg-card">
				  <div class="card-header login-card-header">
				   	<h2 class="text-center text-white">Customer Update Confirmation</h2>
				  </div>
				  <div class="card-body">
				    <form class="m-2" method="post">
					 <div class="form-group">
					    <label for="lblsuppliername" class="text-muted">Customer Name</label>
					    <input type="text" name="updName" value="<?php echo $_POST["updName"]?>" disabled="disabled" class="form-control form-control-lg rounded-pill" id="lblsuppliername">
					    <input type="hidden" name="updName" value="<?php echo $_POST["updName"]?>">
					  </div>
					<div class="form-group">
					    <label for="lbladdress" class="text-muted">Email address</label>
					    <input type="text" name="updEmail" value="<?php echo @$_POST["updEmail"]?>" disabled="disabled" class="form-control form-control-lg rounded-pill" id="lbladdress">
					  	<input type="hidden" name="updEmail" value="<?php echo @$_POST["updEmail"]?>">
					  </div>
					<!-- <div class="form-group">
					    <label for="lblphone" class="text-muted">Password</label>
					    <input type="password" name="updPass" value="<?php echo @$_POST["updPass"]?>" disabled="disabled" class="form-control form-control-lg rounded-pill" id="lblphone">
					  	<input type="hidden" name="updPass" value="<?php echo @$_POST["updPass"]?>">
					  </div>
					  <div class="form-group">
					    <label for="lblemail" class="text-muted">Confirm Password</label>
					    <input type="password" name="updCPass" value="<?php echo @$_POST["updCPass"]?>" disabled="disabled" class="form-control form-control-lg rounded-pill" id="lblemail" aria-describedby="emailHelp" >
					  	<input type="hidden" name="updCPass" value="<?php echo @$_POST["updCPass"]?>">
					  </div>
					   -->
					 <div class="form-group">
					    <label for="lblcnfpassword" class="text-muted">Address</label>
					    <textarea name="updAddress" disabled="disabled" class="form-control form-control-lg rounded-pill" id="add"><?php echo @$_POST["updAddress"]?></textarea>
					  	<input type="hidden" name="updAddress" value="<?php echo @$_POST["updAddress"]?>">
					  </div>
						<div class="text-center">
						<button type="submit" class="btn btn-color  rounded-pill" name="btnMerchantUpdateConfirm">CONFIRM</button>
						<a href="index.php?usecase=<?php echo UC_HOME;?>" class="btn btn-secondary rounded-pill text-white">CANCEL</a>
						</div>
					  
					</form>
				  </div>
				</div>
		   	 </div>	
		   	 </div>
<?php }
}
?>