<?php
class AdminSuggestionView extends AdminView{
	private $suggestion;
	public function __construct($suggestion=NULL){
		$this->suggestion=$suggestion;
	}
	public function displayBody(){
		?>
<style type="text/css">
	th{text-align: center;}
</style>
<script>
	$(document).ready(function(){
		$("#suggestionSearch").keyup(function(){
			$.ajax({
			type: "POST",
			url: "view/suggestion_search.php",
			data:'keyword='+$(this).val(),
			beforeSend: function(){
				$("#suggestionSearch").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
			},
			success: function(data){
				$("#suggestion").show();
				$("#suggestion").html(data);
				$("#suggestionSearch").css("background","#FFF");
			}
			});
		});
	});
	
	function selectCountry(val) {
	$("#suggestionSearch").val(val);
	$("#suggestion").hide();
	}
</script>
<div class="col-md-12">
	<h3 class="text-center ">Suggestion List</h3>
</div>
<div class="container">
<form method="post" id="suggestionForm">
<input type="hidden" name="hddSuggestionPageList" id="hddPageList">
<div class="row">
	 <div class="col-md-4">
	 	<input type="text" name="txtAdminSuggestionSearch" placeholder="Enter Name" class="form-control" value="<?php echo @$_POST['txtAdminSuggestionSearch'];?>" id="suggestionSearch">
	 <div id="suggestion"></div>
	 </div>
	 	<div class="col-md-2">
	 		<button type="submit" name="btnAdminSuggestionSearch" class="btn btn-primary" value="search"><i class="fas fa-search"></i>&nbsp;Search</button>
	 	</div>
</div>
<br>
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<table class="table table-hover table-bordered">
			<thead class="bg-gradient-primary text-white">
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Email</th>
					<th>Subject</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if(count($this->suggestion)>0){
				foreach ($this->suggestion as $key => $value){?>
				<tr>
					<td><?php echo $key+1;?></td>
					<td><?php echo $value["name"]?></td>
					<td><?php echo $value["email"]?></td>
					<td><?php echo $value["subject"]?></td>
					<!-- <td><?php echo $value["message"]?></td> -->
					<td>
						<a href="mailto:<?php echo $value["email"];?>" class="btn btn-primary"><i class="fa fa-reply"></i>&nbsp;Reply</a>
						<button type="button" class="btn btn-primary detailsSuggestion" data-target="#DetailsSuggestion" data-toggle="modal" data-details="<?php echo $key+1,",",$value["name"],",",$value["email"],",",$value["subject"],",",$value["message"]; ?>"><i class="fa fa-info-circle"></i>&nbsp;Details</button>
					</td>
				</tr>
			<?php 
				} }else {?>
					<tr>
						<td colspan="5" align="center">No data available</td>
					</tr>
				<?php 	}?>
			</tbody>
		</table>
	</div>
			<input type="hidden" id="hddPage" value="<?php if(isset($_SESSION["page"]))echo $_SESSION["page"];else echo "";?>">
			<a id="previous" href="javascript:Previous();"> Previous </a>&nbsp;|&nbsp; 
			<a id="next" href="javascript:Next();"> Next </a>
<!-- Modal -->
	 	<div class="modal fade"id="DetailsSuggestion">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-gradient-primary text-white">
						<h5>Suggestion Details</h5>
						<button type="button" class="close" data-dismiss="modal">
							<span>&times;</span>
						</button>
					</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="col-md-12">
							<label class="bold">Name:&emsp;</label><label
								id="detailsName" class="text-muted"></label>
						</div>
						<div class="col-md-12">
							<label class="bold">Email:&emsp;</label><label
								id="detailsEmail" class="text-muted"></label>
						</div>
						<div class="col-md-12">
							<label class="bold">Subject:&emsp;</label><label
								id="detailsSubject" class="text-muted"></label>
						</div>
						<div class="col-md-12">
							<label class="bold">Message:&emsp;</label> 
							<label	id="detailsMessage" class="text-muted"></label>						</div>
						</div>
				</div>
				<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					</div>
				</div>
				
			</div>
		</div>
		<!-- Modal -->
</form>
</div>
<script type="text/javascript">
		    $(function () {
		        $(".detailsSuggestion").click(function () {
		        	var details=$(this).data('details');
		        	var res = details.split(",");
		            $(".modal-body #detailsName").text(res[1]);
		            $(".modal-body #detailsEmail").text(res[2]);
		            $(".modal-body #detailsSubject").text(res[3]);
		            $(".modal-body #detailsMessage").text(res[4]);
		        })
		    });
		    function Next(){
			    var page=document.getElementById("hddPage").value;
			    document.getElementById("hddPageList").value=parseInt(page)+1;
			    document.forms["suggestionForm"].submit();
		    }
		    function Previous(){
		    	 var page=document.getElementById("hddPage").value;
				 document.getElementById("hddPageList").value=parseInt(page)-1;
				 document.forms["suggestionForm"].submit();
		    }
		    
</script>
<?php
	}
}