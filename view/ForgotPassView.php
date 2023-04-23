<?php
class ForgotPassView extends View{
private $errors;
	
	public function __construct($errors = null) {
		$this->errors = $errors;
	}
	public function displayBody(){?>


<div class="container-fluid p-0">
	<div class="col-md-4 offset-md-4" >
		<div class="card merchant-card" style="margin: 245px 2px 150px 4px">
			<h5 class="card-header text-center">Password Reset</h5>
			<div class="card-body">
				
				<p class="card-text">
				
				
				<form class="m-2" method="post">
					<div class="form-group m-0">
						<label for="InputUsername" class="text-muted">Email</label> 
						<input
							type="text" name="forgot_email"
							class="form-control form-control-sm rounded-pill mb-4"
							id="forgot_email_pass">
							<font color="red">
							<?php if (isset($this->errors['for_email_null'])) echo $this->errors['for_email_null']?>
							<?php if (isset($this->errors['email_not_correct'])) echo $this->errors['email_not_correct']?>
							<?php if(isset($this->errors['invalid_email'])){
								echo $this->errors['invalid_email'];
								
							}?>
							<?php if(isset($this->errors['Not_Correct_email'])){
								echo $this->errors['Not_Correct_email'];
								
							}?>
							</font>
					</div>
					<div class="text-center">
							<input type="submit" name="btnRequestPass" class="btn btn-color rounded-pill" value="REQUEST">
							<a href="index.php?usecase=<?= UC_HOME; ?>" class="btn btn-secondary text-white rounded-pill">CANCEL</a>
						</div>
					<!-- <button type="submit" class="btn btn-primary btn-block rounded-pill font-weight-bold" name="btnRequestPass">Request</button> -->
				</form>
				
			</div>
		</div>
	</div>
	</div>
</div>
	<?php
	}
}