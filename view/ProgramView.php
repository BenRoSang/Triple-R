<?php
class ProgramView extends View{

	private $allProgram;
	public function __construct($all_program){
		$this->allProgram=$all_program;
			
	}

	public function displayBody(){?>

<div class="container py-5">
	<div class="text-center">
		<h2>Programme</h2>
	</div>
	<form class="m-2" method="post" >
		<div class="row">
			
		<?php
		  foreach ($this->allProgram as $key=>$program){?>
			<div class="col-md-4 my-4">
				<div class="card text-center">
				 	<div class="card-header text-center border-bottom-0 bg-white ">
				 		<img src="<?php $picturePath=$program["image"]; echo $picturePath;?>" class="card-img-top rounded-circle img-thumbnail aa">
				 	</div>

				 	<div class="card-body pt-0">
				 		<h4 class="card-title text-muted">
				 			<?php echo $program["programme_category_name"];?>
				 		</h4>
						<div class="card-text comment more">
							<?php echo $program["description"];?>
						</div>
						<a href="index.php?usecase=<?php echo UC_PROGRAM_DETAILS?>&programme_category_id=<?php echo $program['programme_category_id']?>&&programme_cat_name=<?php echo $program['programme_category_name']?>" class="btn btn-color rounded-pill">More</a>
					</div>

				</div>
			</div>

			<?php  }?>

		</div>	
	</form>

</div>
<STYLE>
body, input{
	font-family: Calibri, Arial;
	margin: 0px;
	padding: 0px;
}
a {
	color: #0254EB
}
a:visited {
	color: #0254EB
}
#header h2 {
	color: white;
	/*background-color: #00A1E6;*/
	margin:0px;
	padding: 5px;
}
.comment {
	width: 270px;
	/*background-color: #f0f0f0;*/
	margin: 20px;
	text-align:justify;
	text-justify:inter-word;
	text-indent:25px;
}
a.morelink {
	text-decoration:none;
	outline: none;
}
.morecontent span {
	display: none;

}
</STYLE>
<SCRIPT>
$(document).ready(function() {
	var showChar = 100;
	var ellipsestext = "...";
	var moretext = "more";
	var lesstext = "less";
	$('.more').each(function() {
		var content = $(this).html();

		if(content.length > showChar) {

			var c = content.substr(0, showChar);
			var h = content.substr(showChar-1, content.length - showChar);

			var html = c + '<span class="moreelipses">'+ellipsestext+'</span>&nbsp;<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">'+moretext+'</a></span>';

			$(this).html(html);
		}

	});

	$(".morelink").click(function(){
		if($(this).hasClass("less")) {
			$(this).removeClass("less");
			$(this).html(moretext);
		} else {
			$(this).addClass("less");
			$(this).html(lesstext);
		}
		$(this).parent().prev().toggle();
		$(this).prev().toggle();
		return false;
	});
});
</SCRIPT>
<?php }
}