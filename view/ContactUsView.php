<?php
class ContactUsView extends View{
	
private $errors;
	public function __construct($errors=null)
	{
		$this->errors=$errors;
	}
	
	public function displayBody(){?>
		<section class="py-4">
		<div class="container">
			<div class="row justify-content-between">
		    	<div class="col-4">
		      		<h2>Contact Us</h2>
		    	</div>
		    	<div class="col-4">
		      		<h2>Group Member</h2>
		   	 	</div>
		  	</div>
			<div class="row">
				
				<div class="col-md-12">
					<div class="row py-3">
						<div class="col-md-7">
							<form method="post">

								<input type="hidden" name="_token">

								<div class="form-group">
									<label for="name">Your Name</label> <input type="text"
										name="name" class="form-control" placeholder="Enter your name" value="<?php 
						if(isset($_SESSION["contact_user"]))
							echo $_SESSION["contact_user"]->getSuggestionName();
						else
							echo @$_POST["name"]?>">
						<font color="red">
						<?php
							if(isset($this->errors["name_null"]))
								echo $this->errors["name_null"];
						?>
					</font>
								</div>
								<div class="form-group">
									<label for="email">Your Email</label> <input type="text"
										name="email" class="form-control"
										placeholder="Enter your email" value="<?php 
						if(isset($_SESSION["contact_user"]))
							echo $_SESSION["contact_user"]->getSuggestionEmail();
						else
							echo @$_POST["email"]?>">
						<font color="green">eg.(xxx@gmail.com)</font>
						<font color="red">
						<?php
							if(isset($this->errors["email_null"]))
								echo $this->errors["email_null"];
							if(isset($this->errors["invalid_email"]))
								echo $this->errors["invalid_email"];
						?>
					</font>
					</div>

						<div class="form-group">
							<label for="Subject">Subject</label>
							<textarea class="form-control" type="text" name="subject"
								rows="3"><?php
								if(isset($_SESSION["contact_user"]))
								echo $_SESSION["contact_user"]->getSuggestionSubject();
								else
								echo @$_POST["subject"]?></textarea>
							<font color="red">
						<?php
							if(isset($this->errors["subject_null"]))
								echo $this->errors["subject_null"];
						?>
					</font>
						</div>
						<div class="form-group">
									<label for="message">Your Message</label>
							<textarea class="form-control" name="message" rows="3"><?php
								if(isset($_SESSION["contact_user"]))
								echo $_SESSION["contact_user"]->getSuggestionMessage();
								else
								echo @$_POST["message"]?></textarea>
							<font color="red">
						<?php
							if(isset($this->errors["message_null"]))
								echo $this->errors["message_null"];
						?>
					</font>
						</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-color" name="btnContactUsConfirm">Send</button>
								</div>
								<font color="red">
								<?php if(isset($this->errors["all_null"]))
								echo $this->errors["all_null"];
								?>
								</font>
							</form>
						</div>
						<div class="col-md-5 pt-3">
							<div class="row">
									<div style="line-height: 35px; font-size:20px; margin-left:90px">
										<ul>
											<li>May Thu Naing</li>
											<li>Zar Hlei Sang</li>
											<li>Phyo Zaw</li>
											<li>Lwin Mg Mg</li>
											<li>Hsu Myat Thwe</li>
											<li>Chue Thazin Hlaing</li>
											<li>La Pyae Oo</li>
											<li>Eaindra Htet Htet Htun</li>
											<li>Yin Yin Nwe</li>
											<li>Khaing Zar Thwe</li>
											<li>Ei Thet Mon</li>
											<li>Hlaing May Myo</li>
											<li>Nwe Nwe Tun</li>
										</ul>
									</div>
							</div>
						</div>
						<div class="col-md-12 pt-3">
						
							<div id="map-wrapper" class="no-padding">
								<div class="image-responsive">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.4423593823753!2d96.133450314869!3d16.853998188400343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c194926b08ebef%3A0x9936075ecb6cc22b!2sICTTI!5e0!3m2!1sen!2smm!4v1568656490003!5m2!1sen!2smm"
											width="600" height="450" frameborder="0" style="border: 0;" allowfullscreen=""></iframe>
								</div>
							</div>
				
						</div>
					</div>
					



				</div>
			</div>
	</section>
	<?php }
}
?>