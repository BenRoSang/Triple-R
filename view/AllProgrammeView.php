<?php
class AllProgrammeView extends AdminView{
	private $errors;
	private $programme;
	private $category;
	public function __construct($errors=NULL,$programme=NULL,$category=NULL){
		$this->errors=$errors;
		$this->programme=$programme;
		$this->category=$category;
	}
	public function displayBody(){
		?>
		<style type="text/css">
			th{text-align: center;}
		</style>
	<script>
		$(document).ready(function(){
			$("#ProgrammeSearch").keyup(function(){
				var productCategory=$("#programme_cat_id").val();
				$.ajax({
					type: "POST",
					url: "view/programme_search.php",
					data: {
				        'keyword': $(this).val(),
				        'programmeCategory': productCategory
				    },
					beforeSend: function(){
						$("#ProgrammeSearch").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
					},
					success: function(data){
						$("#programmeSuggestion").show();
						$("#programmeSuggestion").html(data);
						$("#ProgrammeSearch").css("background","#FFF");
					}
				});
			});
			$('#programme_cat_id').on('change', function() {
				$("#ProgrammeSearch").val("");
				$('#adminUpdateProg').submit();
				});	
		});
		function selectCountry(val) {
			$("#ProgrammeSearch").val(val);
			$("#programmeSuggestion").hide();
		}
	</script>
<style>
	#p{color:red;}
	#p1{color:red;}
	#p2{color:red;}
	#addP{color:red;}
	#addP1{color:red;}
	#addP2{color:red;}
</style>
<div class="container">
	<div class="col-md-12">
		<h3 class="text-center mb-4">Programme List</h3>
	</div>
	<!-- hsu myat thwe start -->

	<div class="modal fade" id="adminProgrammeAdd" aria-hidden="true">
		<div class="modal-dialog">
			<form method="post" name="adminProgrammeSave" id="adminProgrammeSave" enctype="multipart/form-data">
				<input type="hidden" name="adminProgrammeSave" value="adminProgrammeSave">
				<div class="modal-content">
					<div class="modal-header bg-gradient-primary text-white">
						<h5>New Programme</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					
					<div class="modal-body">
						<div class="form">
							<div class="col-12">
								Programme Name:<span style="color:red">***</span>
							</div>
							<div class="col-12">
								<input type="text" name="adminProgrammeName" id="adminProgrammeName" class="form-control"><br><p id="addP"></p> 
							</div>
							<div class="col-12">
								Category Name:<span style="color:red">***</span>
							</div>
							<div class="col-12">
								<select name="categoryName" class="form-control">									
									<?php foreach($this->category as $key=>$value){?>										
										<option value="<?php echo $value["programme_category_id"];?>"><?php echo $value['programme_category_name'];?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-12">
								Organization:<span style="color:red">***</span>
							</div>
							<div class="col-12">
								<input type="text" name="adminProgrammeOrganization" id="adminProgrammeOrganization" class="form-control"><br><p id="addP1"></p>
							</div>
							<div class="col-4">
								Description:
							</div>
							<div class="col-12">
								<textarea name="adminProgrammeDescription" class="form-control" id="adminProgrammeDescription"></textarea><br><p id="addP2"></p>
							</div>							
							<div class="col-4">
								Photo:
							</div>
							<div class="col-12">
								<input type="file" name="<?php echo IMAGE;?>" id="photo"><br><p id="addP3"></p>
							</div>
							<!-- Video	 -->
							<div class="col-4">
								Video:
							</div>
							<div class="col-12">
								<input type="file" name="<?php echo VIDEO;?>" id="saveVideo"><br>
							</div>
							<!-- Video -->					
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" id="btnAdminAddProgramme" name="btnAdminAddProgramme"><i class="fas fa-save"></i>&nbsp;Save</button>
						<button type="button" class="btn btn-primary" id="btnSaveCancel"><i class="fa fa-ban"></i>&nbsp;Cancel</button>
					</div>
				</div>
			</form>

		</div>
	</div>
	<!-- hsu myat thwe end -->
	<form method="post" id="adminUpdateProg" name="adminUpdateProg"  enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-2 p-0">
				<label class="ml-3">Programme Category:</label>
			</div>
			<div class="col-md-4">				
				<select class="form-control" name="programme_cat_id" id="programme_cat_id">
					<option value="">--Select Programme Category--</option>							
					<?php foreach($this->category as $key=>$value){
						if($value["programme_category_id"]==@$_POST["programme_cat_id"]){?>
							<option value="<?php echo $value["programme_category_id"];?>" selected="selected"><?php echo $value['programme_category_name'];?></option>
						<?php }if($value["programme_category_id"]!=@$_POST["programme_cat_id"]) { ?>								
							<option value="<?php echo $value["programme_category_id"];?>"><?php echo $value['programme_category_name'];?></option>
						<?php }}?>
				</select>					
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-2">
				<label>Programme Name:</label>
			</div>
			<div class="col-md-4">
				<input type="text" name="txtAdminProgrammeSearch"
					placeholder="Enter Programme Name" class="form-control"
					value="<?php echo @$_POST['txtAdminProgrammeSearch'];?>"
					id="ProgrammeSearch">
				<div id="programmeSuggestion"></div>
			</div>
			<div class="col-md-2 pl-0">
				<button type="submit" name="btnAdminProgrammeSearch"
					class="btn btn-primary" value="search">
					<i class="fas fa-search"></i>&nbsp;Search
				</button>
			</div>
			<!-- <div class="col-md-2 p-0"></div> -->
			<div class="col-md-4">
				<button type="button" class="btn btn-primary" style="margin-left: 156px" data-toggle="modal" data-target="#adminProgrammeAdd" name="btnAddProgramme"><i class="fas fa-plus"></i>Add Programme</button>
			</div>
		</div>
		<br>
		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<table class="table table-hover table-bordered" id="sampleTable">
				<thead class="bg-gradient-primary text-white">
					<tr>
						<th> No. </th>
						<th> Programme Name </th>
						<th nowrap="nowrap">Programme Category Name</th>
						<th>Organization</th>
						<!-- <th> Description </th> -->
						<th>Photo</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
	<?php 
	if (count($this->programme)>0){
		$no=($_SESSION["page"]-1)*LIMIT_ROWS;              	 
		foreach ($this->programme as $key => $value){
		$type="";                	
			?>
			<tr>
				<td><?php echo ($key+1)+$no;?></td>
				<td><?php echo $value["programme_name"]?></td>
				<td nowrap="nowrap"><?php echo $value["programme_category_name"]?></td>						
				<td><?php echo $value["organization"]?></td>
				<!-- <td><?php echo $value["description"]?></td> -->
				<td>
					<?php if($value["image"]!=""){?>
					<img src="<?php echo $value['image']?>" class="img-fluid" width="100" height="50">
					<?php } ?>
				</td>
				<td>
					<?php if($value["video"]!=""){
					$array=explode('.',$value["video"]);
					$type="video/".$array[2];?>
					<!-- <video width="100" height="100" controls>
						<source src="<?php echo $value["video"];?>" type="<?php echo $type;?>">
					</video> -->
				<?php }?>
				<?php echo ($value["delete_status"]==0)?"Available":"Unavailable";?>
				</td>
				<td align="center" nowrap>
					<a href="index.php?usecase=<?php echo UC_VIEW_DETAIL?>&p_id=<?php echo $value['programme_id']?>" class="btn btn-primary"><i class="fa fa-info-circle"></i> Details</a>
					<button type="button" class="btn btn-primary editProgramme" data-toggle="modal" data-target="#Modal3" data-id="<?php  echo $value['programme_id'];?>" data-programmecategoryid="<?php  echo $value['programme_category_id'];?>" data-programmename="<?php echo $value['programme_name']?>" data-programmecategory="<?php echo $value['programme_category_name']?>" data-organization="<?php echo $value['organization']?>" data-description="<?php echo $value['description']?>" data-image="<?php echo ($value['image']!="")? $value['image']:"blank";?>" data-video="<?php echo ($value['video']!="")? $value['video']:"blank";?>" data-type="<?php echo ($value['video']!="")? $type:"blank";?>"><i class="fas fa-edit"></i> Edit</button>
					<a class="programme_delete btn btn-danger" href="index.php?usecase=<?php echo UC_ADMIN_PROGRAM ?>&prog_id=<?= $value['programme_id'] ?>"><i class="fas fa-trash-alt"></i> Delete</a>       
				</td>
			</tr>
						<?php 
					}}else{?>  
					<tr>
						<td colspan="7" align="center">No data available</td>
					</tr>                    
					<?php } ?>
				</tbody>
			</table>
		</div> 
		<input type="hidden" id="hddPage" value="<?php if(isset($_SESSION["page"]))echo $_SESSION["page"];else echo "";?>">
		<input type="hidden" id="hddPageList" name="hddProgrammePageList">
		<a id="previous" href="javascript:Previous();"> Previous </a> |  
		<a id="next" href="javascript:Next();"> Next</a>
<!-- edit modal -->
					<div class="modal fade" id="Modal3" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-gradient-primary text-white">
									<h5>Update Programme</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<!-- <form role="form" id="adminUpdateProg" name="adminUpdateProg" method="post" enctype="multipart/form-data"> -->
									<input type="hidden" name="adminUpdateProg" value="adminUpdateProg">
									<div class="modal-body">
										<div class="form">
											<input type="hidden" name="programmeUpdateId" id="programmeUpdateId">
											<div class="col-12">
												Programme Name:<span style="color:red">***</span>
											</div>
											<div class="col-12">
												<input type="text" name="adminProgrammeNameEdit" id="adminProgrammeNameEdit" class="form-control"><p id="p"></p><br>
											</div>
											<div class="col-12">
												Programme Category Name:<span style="color:red">***</span>
											</div>
											<div class="col-12">
												<!-- <input type="hidden" name="hddProCate" id="hddProCate"> -->
												<select name="categoryEditName" id="categoryEditName" class="form-control">

													<?php foreach($this->category as $key=>$value){
														?>

													<option value="<?php echo $value['programme_category_id'];?>" ><?php echo $value['programme_category_name'];?></option>
													<?php } ?>
												</select><p id="p2"></p><br>
											</div>
											<div class="col-4">
												Organization:<span style="color:red">***</span>
											</div>
											<div class="col-12">
												<input type="text" name="organizationEdit" id="organizationEdit" class="form-control"><p id="p1"></p><br>
											</div>
											<div class="col-4">
												Description:
											</div>
											<div class="col-12">
												<textarea name="descriptionEdit" id="descriptionEdit" class="form-control"></textarea>
											</div>
											<div class="col-4">
												Photo:
											</div>
											<div class="col-12" id="imgDiv">
												<input type="hidden" name="imgEdit" id="imgEdit">
												<!-- <input type="file" name="<?php echo UPDATE_IMAGE;?>" id="updateImage"><br> -->
												<!-- <img src="" id="photoEdit" class="img-fluid width='50' height='100' "> -->
											</div>
											<!-- Update Video	 -->
											<div class="col-4">
												Video:
											</div>
											<div class="col-12" id="videoDiv">
												<input type="hidden" name="videoEdit" id="hddVideoEdit">
												<!-- <input type="file" name="<?php echo UPDATE_VIDEO;?>" id="updateVideo"><br> -->
<!-- 												<video id="videoEdit" width="300" height="200" controls >
													<source src="" type="">
												</video> -->
											</div>
												<!-- Update Video -->

											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary" id="adminProgrammeUpdate" name="adminProgrammeUpdate"><i class="fas fa-edit"></i> Update</button>
											<button type="button" class="btn btn-primary" id="btnCancel">Cancel</button>
										</div>
									<!-- </form> -->
								</div>

							</div>
						</div>
						<!-- edit modal -->
	</form>
	
</div>
<!-- edit modal -->


<script type="text/javascript">	
	document.getElementById("btnAdminAddProgramme").onclick=function(){
		var form1=document.getElementById('adminProgrammeSave');
		var text5=form1.elements["adminProgrammeName"].value;
		var text6=form1.elements["adminProgrammeOrganization"].value;
		//var text7=form1.elements["adminProgrammeDescription"].value;
		document.getElementById("addP").innerHTML="";
		document.getElementById("addP1").innerHTML="";
		document.getElementById("addP2").innerHTML="";
		if(text5 && text6){
			this.disabled=true;
			document.forms["adminProgrammeSave"].submit();				
			}else{
				if(text5=="")
					document.getElementById("addP").innerHTML="Please Enter This Field";
				if(text6=="")
					document.getElementById("addP1").innerHTML="Please Enter This Field";
				//if(text7=="")
					//document.getElementById("addP2").innerHTML="Please Enter This Field";				
				return false;
			}
		};
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.programme_delete').click(function(){
				return confirm("Are you sure you want to delete?");
			})
		});
		$(document).ready(function(){
			$('#btnCancel').click(function(){
				$("p").empty();
				$("#p1").empty();
				$("#p2").empty();
				$("#Modal3").modal("hide");
			});
			$('#btnSaveCancel').click(function(){
				$("#addP").empty();
				$("#addP1").empty();
				//$("#addP2").empty();
				$("#adminProgrammeName").val("");
				$("#adminProgrammeOrganization").val("");
				$("#adminProgrammeDescription").val("");
				$("#photo").val("");
				$("#saveVideo").val("");
				$("#adminProgrammeAdd").modal("hide");
			});

		});
		$(function () {
			$(".editProgramme").click(function () {
				var images=$(this).data('image');
				var video=$(this).data('video');
				var imageId="fileInput"+$(this).data('id');
				var videoId="videoInput"+$(this).data('id');
				$('#videoEdit').remove();
				$('#photoEdit').remove();
				$("input").remove(".imageFile");
				$("input").remove(".videoFile");
				var imagefile = $('<input />',{
					type: 'file',
					name: '<?php echo UPDATE_IMAGE;?>',
					id:imageId,
					class:'imageFile'
				});
				imagefile.appendTo($("#imgDiv"));
				var videofile = $('<input />',{
					type: 'file',
					name: '<?php echo UPDATE_VIDEO;?>',
					id:videoId,
					class:'videoFile'
				});
				videofile.appendTo($("#videoDiv"));
				if(video!="blank")
				{
					var type=$(this).data('type');
					var video1 = $('<video />', {
						id: 'videoEdit',
						src: video,
						type: type,
						controls: true,
						width:'300',
						height:'200'
					});
					video1.appendTo($('#videoDiv'));
					//$(".modal-body #videoEdit").prop("src",video);
					//$(".modal-body #videoEdit").prop("type",type);
				}
				if(images!="blank")
				{
					var image=$('<img />',{id:'photoEdit',src:images,width:'300',height:'200'});
					// imageFile.appendTo($("#imgDiv"));
					image.appendTo($('#imgDiv'));
					//$(".modal-body #photoEdit").prop("src",images);
				}
				var pro=$(this).data("programmecategoryid");
				$(".modal-body #categoryEditName").val(pro);
				$(".modal-body #programmeUpdateId").val($(this).data('id'));
				$(".modal-body #adminProgrammeNameEdit").val($(this).data('programmename'));
				$(".modal-body #organizationEdit").val($(this).data('organization'));				
				$(".modal-body #descriptionEdit").val($(this).data('description'));
				$(".modal-body #hddVideoEdit").val($(this).data('video'));
				$(".modal-body #imgEdit").val(images);
			})
		});

	</script>
	<script type="text/javascript">
document.getElementById("adminProgrammeUpdate").onclick=function(){
			var form1=document.getElementById('adminUpdateProg');
			var text=document.getElementById("adminProgrammeNameEdit").value;
			var text1=document.getElementById("organizationEdit").value;
			var text2=document.getElementById("categoryEditName").value;
			if(text && text1 && text2){
				this.disabled=true;				
				document.forms["adminUpdateProg"].submit();
			}else{
				if(text=="")
					document.getElementById("p").innerHTML="Please Enter This Field";
				if(text1=="")
					document.getElementById("p1").innerHTML="Please Enter This Field";
				if(text2=="")
					document.getElementById("p2").innerHTML="Please Enter This Field";
				return false;
			}
		};
		// $(document).ready(function(){
		// 	$('#adminProgrammeUpdate').click(function(){
		// 		var programmename=$("#adminProgrammeNameEdit").val();
		// 		var organization=$("#organizationEdit").val();
		// 		var categoryEditName=$("#categoryEditName").val();
		// 		if(programmename && organization && categoryEditName){
		// 			this.disabled=true;
		// 			document.forms["adminUpdateProg"].submit();
		// 		}
		// 		else{
		// 			if(programmename=="")$("#p").text("Please enter this Field");
		// 			if(organization=="")$("#p1").text("Please Enter This Field");
		// 			if(categoryEditName=="")$("#p2").text("Please Enter This Field");
		// 		}
		// 	})
		// });

	</script>
	<script type="text/javascript">
		function Next(){
			var page=document.getElementById("hddPage").value;
			document.getElementById("hddPageList").value=parseInt(page)+1;
			document.forms["adminUpdateProg"].submit();
		}
		function Previous(){
			var page=document.getElementById("hddPage").value;
			document.getElementById("hddPageList").value=parseInt(page)-1;
			document.forms["adminUpdateProg"].submit();
		}
	</script>

	<?php 		
}
}