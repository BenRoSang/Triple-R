<?php

class HomeView extends View{
	public function displayBody() {?>

	<section class="jumbotron jumbotron-fluid ">
		<div class="row no-gutters">
			<div class="col-md-4 offset-md-2   text-center">
				<h1 class="text-center">What is Triple R?</h1>
				<hr>
				<p class="text-justify">At Tripple R, we’re committed to providing environmentally
					friendly recycling solutions to Yangon, Myanmar. We believe in
					promoting smart recycling habits in order to achieve long-lasting
					results and thousands of people around Myanmar to take action on
					waste in their communities, change their everyday behaviour and
					reduce their dependency on single use plastic.We can available post
					in this website.</p>
				<!-- <a href="details.html" class="btn btn-color text-white mt-3">Read More</a> -->
			</div>
			<div class="col-md-6">
				<div class="col-md-8 offset-md-2">
					<div id="carouselExampleSlidesOnly" class="carousel slide"
						data-ride="carousel" data-interval="2000">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="images/carousel/c1.jpg" class="d-block my_slide_img aa"
									alt="...">
							</div>
							<div class="carousel-item">
								<img src="images/carousel/c2.jpg" class="d-block  my_slide_img aa"
									alt="...">
							</div>
							<div class="carousel-item">
								<img src="images/carousel/c3.jpg" class="d-block  my_slide_img aa"
									alt="...">
							</div>
							<div class="carousel-item">
								<img src="images/carousel/c4.jpg" class="d-block  my_slide_img aa"
									alt="...">
							</div>
							<div class="carousel-item">
								<img src="images/carousel/c5.jpg" class="d-block  my_slide_img aa"
									alt="...">
							</div>
							<div class="carousel-item">
								<img src="images/carousel/c6.jpg" class="d-block  my_slide_img aa"
									alt="...">
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section-data section">
		<div class="container">
			<div class="row justify-content-center ">
				<h1 class="col-md-5 text-center">
					Our Activities
					</hr>
				</h1>
			</div>
			<div class="row my-5">
				<div class="col-md-6 text-center">
					<img src="assets/imgs/3r.jpg" width="300" height="300">
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-1">
							<span class="fa fa-mail-forward"></span>
						</div>
						<div class="col-md-11">
							<p class="eng text-justify">Action and Awareness. We pick up trash. At
								beach – if we see trash, we clean it! And we motivate others to
								do the same. By spending a few hours together picking up trash,
								people gain a profound understanding of the consequences of
								being careless about waste.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<span class="fa fa-mail-forward"></span>
						</div>
						<div class="col-md-11">
							<p class="eng text-justify">We create long-term programmes that help
								communities to reduce and better manage existing waste, and
								strategies that will prevent future waste.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<span class="fa fa-mail-forward"></span>
						</div>
						<div class="col-md-11">
							<p class="eng text-justify">We actively engage children through our
								multilingual kids’ programme, connecting environmental values
								with hands-on experience of the impact that trash has on the
								local and global environment. Adults also learn experientially,
								backed up with information and workshops provided by our
								volunteers</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php }
			
}