<?php
class ProgramDetailsView extends View{

	private $allProgramDetail;
	public function __construct($all_program_Detail){
		$this->allProgramDetail=$all_program_Detail;
	}
	public function displayBody(){ ?>
	<?php if (isset($_GET['programme_cat_name'])){
		echo "<h2 class='text-center margin-t'>".$_GET['programme_cat_name']."</h2>";
	}
	?><?php ?>
		<div class="container">
			<div class="row">
		<?php foreach ($this->allProgramDetail as $value=>$program){
			if($program['programme_category_id']==2){?>
				
						<div class="col-md-4 my-4">
							<div class="card">
  								<div class="card-header text-center">
  									<img src="<?= $program['image']?>" class="card-img-top" alt="Catoon Image" style="width: 200px; height: 240px;">
  								</div>
  								<div class="card-body">
    								<p class="card-text" style="font-size: 20px">
    									Name: <span class="text-muted"><?php echo $program['programme_name']?></span>
    								</p>
  								</div>
							</div>
						</div>
					

			<?php }else{ ?>

		<div class="jumbotron jumbotron-fluid">
		<div class="container">
		  <div class="row">		  
				<div class="col-md-6">
					<div class="col-md-8 offset-md-2">
					<?php if($program["video"]!=""){?>
					<?php $array=explode('.',$program["video"]);
					$type="video/".$array[2];?>
					<video width="400" height="300" controls> <source
						src="<?php echo $program["video"];?>" type="<?php echo $type;?>"></video>
					<?php }else { ?>
					<img src="<?php $picturePath=$program["image"]; echo $picturePath;?>" width="400" height="300">
					<?php }?>						
					</div>
				</div>
				<div class="col-md-6">
				<h1 class="text-center text-info"><?php echo $program['programme_name']?></h1>
				<div class="card-text comment more">
						<?php echo $program['description']?>
				</div>
				</div>
			</div>
		</div>
		</div>				
			<?php }}	?>
			</div>
				</div>
		<div class="container">
			<div class="text-left my-4">
				<a href="index.php?usecase=<?php echo UC_PROGRAM?>" class="btn btn-secondary ">&lt&ltBack</a>
			</div>
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
	width: 500px;
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
.margin-t {
	margin: 110px 0px 20px 0px;
}
</STYLE>
<SCRIPT>
$(document).ready(function() {
	var showChar = 300;
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
