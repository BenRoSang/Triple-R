<?php
class ContactUsSendView extends View{
	public function displayBody(){?>
		<section class="py-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="contact-title">
						<h2>Contact Us</h2>
					</div>
					<div class="row py-3">
						<div class="col-md-7">
							<form method="post">

								<input type="hidden" name="_token">

								<div class="form-group">
									<label for="name">Your Name</label> <input type="text"
										name="name" class="form-control" placeholder="Enter your name" value="<?php echo @$_POST["name"]?>" disabled="disabled">
								</div>
								<div class="form-group">
									<label for="email">Your Email</label> <input type="text"
										name="email" class="form-control"
										placeholder="Enter your email" value="<?php echo @$_POST["email"]?>" disabled="disabled">
								</div>

						<div class="form-group">
							<label for="Subject">Subject</label>
							<textarea class="form-control" type="text" name="subject" rows="3" disabled="disabled">
								<?php echo @$_POST["subject"]?>
							</textarea>
						</div>
						<div class="form-group">
									<label for="message">Your Message</label>
							<textarea class="form-control" name="message" rows="3" disabled="disabled">
								<?php echo @$_POST["message"]?>
							</textarea>
						</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary" name="btnContactUsSend">Confirm</button>
								</div>
								<font color="red">
								<?php if(isset($this->errors["all_null"]))
								echo $this->errors["all_null"];
								?>
								</font>
							</form>
						</div>
						<div class="col-md-5 pt-5">
							<div class="row text-center">

								<div id="map-wrapper" class="no-padding">
									<div class="image-responsive">
										<iframe
											src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.4423593823753!2d96.133450314869!3d16.853998188400343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c194926b08ebef%3A0x9936075ecb6cc22b!2sICTTI!5e0!3m2!1sen!2smm!4v1568656490003!5m2!1sen!2smm"
											width="600" height="450" frameborder="0" style="border: 0;"
											allowfullscreen=""></iframe>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 pt-3">
							<ul class="contact-list">
								<li>Parami Road, Yangon , Myanmar</li>
								<li>+959 999 999 999</li>
								<li>+959 777 777 777</li>
								<li>www.ictti.com</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-12">
						<div class="container left-bg pb-4"></div>

						<div class="container left-bg mt-4"></div>
					</div>



				</div>
			</div>
	</section>
	<?php }
}