<?php
class MerchantUpdateProfileView extends View{
	private $errors;
	public function __construct($errors=null)
	{
		$this->errors=$errors;
	}
	public function displayBody(){?>
		<div class="container-fluid p-0" style="display:inline-block;">
		
			
		    <div class="col-md-6 offset-md-3">
		    	<div class="card reg-card">
				  <div class="card-header login-card-header">
				   	<h2 class="text-center text-white">Update Profile</h2>
				  </div>
				  <div class="card-body">
				    <form class="m-2" method="post">
					 <div class="form-group">
					   <label for="InputUsername" class="text-muted">Customer Name</label>
					    <input type="text" name="updName" value="<?php 
							if(isset($_POST["updName"]))
								echo $_POST["updName"];
							//elseif (isset($_SESSION["update_user"]))
							//	echo $_SESSION["update_user"][0]["name"];
							else
								echo $_SESSION['loginUser'][0]['name']?>" class="form-control form-control-lg rounded-pill" id="InputUsername">
							<font color="red">***
								<?php 
								if(isset($this->errors["name_null"]))
									echo $this->errors["name_null"];
								if(isset($this->errors["nameUpdateLen_null"]))
									echo $this->errors["nameUpdateLen_null"];
								?>
							</font>
							 
					  </div>
					<div class="form-group">
					    <label for="InputEmail1" class="text-muted">Email address</label>
					    <input type="text" name="updEmail" value="<?php 
							if(isset($_POST["updEmail"]))
								echo $_POST["updEmail"];
							else
								echo $_SESSION['loginUser'][0]['email']?>" class="form-control form-control-lg rounded-pill" id="InputAddress">
							<font color="red">***
								<?php
								if(isset($this->errors["email_null"]))
									echo $this->errors["email_null"];
								if(isset($this->errors["emailUpdateLen_null"]))
									echo $this->errors["emailUpdateLen_null"];
								if(isset($this->errors["invalid_email"]))
									echo $this->errors["invalid_email"];
								?>
							</font>
					  </div>
					  <!-- Default unchecked disabled -->
					<!-- <div class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" id="defaultUncheckedDisabled2" onclick="myfunction()">
					  <label class="custom-control-label" for="defaultUncheckedDisabled2">Change Password</label>
					  </div>
					  	<script type="text/javascript">
					  		function myfunction	(){
					  			var checkbox=document.getElementById("defaultUncheckedDisabled2");
					  			var text1=document.getElementById("showpwd");
					  			var text2=document.getElementById("showcfmpwd");
					  			if(checkbox.checked == true){
					  				text1.style.display= "block";
					  				text2.style.display="block";
					  			}
					  			else{
					  				text1.style.display="none";
					  				text2.style.display="none";
					  			}
					  			
					  		}
					  	</script>
					  <div class="form-group" id="showpwd" style="display:none">
					    <label for="Inputpass" class="text-muted">Password</label>
					    <input type="password" name="updPass" value="<?php 
							if(isset($_POST["updPass"]))
								echo $_POST["updPass"];
							else
								echo $_SESSION['loginUser'][0]['password']?>" class="form-control form-control-lg rounded-pill" id="InputPhone">
							<font color="red">***
								<?php
								if(isset($this->errors["pass_null"]))
									echo $this->errors["pass_null"];
								?></font>
					  </div>
					  <div class="form-group" id="showcfmpwd" style="display:none">
					    <label for="Input Confirm Password" class="text-muted">Confirm Password</label>
					    <input type="password" name="updCPass" value="<?php 
							if(isset($_POST["updCPass"]))
								echo $_POST["updCPass"];
							else
								echo $_SESSION['loginUser'][0]['password']?>" class="form-control form-control-lg rounded-pill" id="InputEmail1" aria-describedby="emailHelp" >
							<font color="red">***								
								<?php
								if(isset($this->errors["cpass_null"]))
									echo $this->errors["cpass_null"];
								if(isset($this->errors["pass_notMatched"]))
									echo $this->errors["pass_notMatched"];
								?>
							</font>
					  </div>
						 -->
	
					

					
					  
					 <div class="form-group">
					    <label for="InputAddress" class="text-muted">Address</label>
					    <textarea name="updAddress" class="form-control form-control-lg rounded-pill" id="address"><?php 
							if(isset($_POST["updAddress"]))
								echo $_POST["updAddress"];
							else
								echo $_SESSION['loginUser'][0]['address']?></textarea>
							<font color="red">***
								<?php
								if(isset($this->errors["name_null"]))
									echo $this->errors["name_null"];
								?>
							</font>
					  </div>
						<div class="text-center">
						 <button type="submit" class="btn btn-color rounded-pill" name="btnMerchantUpdate">UPDATE</button>
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