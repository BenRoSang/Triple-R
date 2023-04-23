<?php
class ProgrammeCategoryView extends AdminView
{

    private $allCategory;
    private $no_of_all_records;
    private $start_from;
    
    
    public function __construct($allcategory=null,$no_of_all_records=null,$start_from=null)
    {
        $this->allCategory = $allcategory;
        $this->no_of_all_records=$no_of_all_records;
        $this->start_from=$start_from;
    }
    public function displayBody()
    {
       ?>
        
<style type="text/css">
	th{text-align: center;}
</style>
<div class="col-md-12">
	<h3 class="text-center mb-4">Programme Category</h3>
</div>


<div class="text-right mb-4" style="margin-right: 19px">
	<button type="button" class="btn btn-primary" data-toggle="modal"
		data-target="#Modal">
		<i class="fas fa-plus"></i>Add Category
	</button>
</div>

<form method="post" enctype="multipart/form-data" id="programmeCategoryForm">
     <input type="hidden" name="programmeCategoryForm" value="programmeCategoryForm">
     
         <div class="modal fade" id="Modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-gradient-primary text-white">
				<h5>Add Program</h5>
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				
					<div class="form">
					<div class="col-12">Programme Category Name:<span style="color: red">***</span></div>
					<div class="col-12">
						<input type="text" name="programme_category_name" id="programme_category_name" class="form-control"> 
						<p id="p"></p><br>
					</div>
					
					<div class="col-12">Programme Category Image:</div>
					<div class="col-12 my-3">
						<input type="file" name="programme_category_image" id="programme_category_image"  >
						
					</div>
					
					<div class="col-4">Description:<span style="color: red">***</span></div>
					<div class="col-12">
						<textarea  name="description" id="description" class="form-control"></textarea>
						<p id="p2"></p><br>
					</div>
					
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="btnCategoryUpload" name="btnCategoryUpload">Upload</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" >Cancel</button>
			</div>
			
		</div>

	</div>
</div>
  
</form>
<div class="container">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<table class="table table-hover table-bordered nowrap" id="sampleTable">
			<thead class="bg-gradient-primary text-white">
				<tr>
					<th>No</th>
					<th nowrap="">Programme Category Name</th>
					<th>Image</th>
					<th>Description</th>
					<th>Status</th>					
					<th>Action</th>
				</tr>
			</thead>
			<tbody>				
				<?php
				foreach ($this->allCategory as $key => $category) {
					?>
					<tr>
						<td align="right"><?php echo ++$this->start_from;?></td>						
						<td ><?php echo $category["programme_category_name"]?>
						<td align="center"><img src="<?php echo  $category['image'];?>" height="150px" width="150px"></td>
						<td><?php echo $category["description"]?></td>
						<td align="center"><?php echo ($category["delete_status"]==0)?"Available":"Unavailable"?></td>
						<td nowrap>
							<button class="btn btn-primary programmeCategoryEdit" type="button" data-toggle="modal" data-target="#Modal2" data-programmecategoryid="<?php echo $category["programme_category_id"]?>"  data-programmecategoryname="<?php echo $category["programme_category_name"]?>"
								data-programmecategoryimage="<?php echo $category["image"]?>" data-programmecategorydescription="<?php echo $category["description"]?>" data-deletestatus="<?php echo $category["delete_status"]?>">
								<i class="fas fa-edit"></i>Edit
							</button>
							<div class="d-inline">
								<!-- <a class="btn btn-primary mx-2" href="index.php?usecase=<?php echo UC_PROGRAMME_CATEGORY_EDT ?>&prog_cat_edit_id=<?= $category['programme_category_id'] ?>">Edit</a>-->
								<a class="programme_category_delete btn btn-danger" href="index.php?usecase=<?php echo UC_PROGRAM_CAT ?>&prog_cat_id=<?= $category['programme_category_id'] ?>"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>                     
							</div>
							<form  method="post" enctype="multipart/form-data" id="programmeCategoryEdit">
								<input type="hidden" name="programmeCategoryEdit" value="programmeCategoryEdit">
								<div class="modal fade" id="Modal2" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-gradient-primary text-white">
												<h5>Update Programme Category</h5>
												<button type="button" class="close" data-dismiss="modal"
												aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<input type="hidden" name="programmeModalForm"
										value="programmeModalForm">
										<div class="modal-body">
											<div class="form">
												<div class="col-12">
													<input type="hidden" name="programme_category_id"
													id="programme_category_id" class="form-control">									
													<br>
												</div>
												<div class="col-12">Programme Category Name:<span style="color:red">***</span></div>
												<div class="col-12">
													<input type="text" name="programme_category_editname"
													id="programme_category_editname" class="form-control">
													<p id="i"></p>
													<br>
												</div>
												<div class="col-12">Programme Category Image:</div>
												<div class="col-12">
													<input type="hidden" name="oldPhoto" id="hddProgrammeCatImage">
													<input type="file" name="programme_category_editimage"
													id="programme_category_editimage">

													<img  src="" width="100" height="100" id="programme_category_editimage">	
													<br>
												</div>
												<div class="col-12">Description:<span style="color:red">***</span></div>
												<div class="col-12">
													<textarea  name="editdescription" id="editdescription" class="form-control"></textarea>
													<p id="i2"></p>
													<br>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary"
											id="programmeUpdate" name="programmeUpdate">Update</button>
											<button type="button" class="btn btn-primary"
											data-dismiss="modal">Cancel</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</td>					
				</tr>
			<?php }?>
			</tbody>
		</table>		 	
	</div>
</div>
<a href="index.php?usecase=<?php echo UC_PROGRAM_CAT?>&page=<?php echo $_SESSION['page']-1 ?>"> Previous </a>&nbsp;|&nbsp; 
<a href="index.php?usecase=<?php echo UC_PROGRAM_CAT?>&page=<?php echo $_SESSION['page']+1 ?>"> Next </a>
<script type="text/javascript">
	document.getElementById("programmeUpdate").onclick=function(){
		var form=document.getElementById('programmeCategoryEdit');			
		var text=form.elements["programme_category_editname"].value;
		//var text1=form.elements["programme_category_editimage"].value;
		var text2=form.elements["editdescription"].value;		
		if(text && text2){
			this.disabled=true;				
			document.forms["programmeCategoryEdit"].submit();				
		}else{
			if(text=="")
				document.getElementById("i").innerHTML="Please Enter This Field";
			document.getElementById("i").style.color="red";	
			if(text2=="")
				document.getElementById("i2").innerHTML="Please Enter This Field";
			document.getElementById("i2").style.color="red";	

			return false;
		}
	};
	document.getElementById("btnCategoryUpload").onclick=function(){
		var form=document.getElementById('programmeCategoryForm');			
		var text=form.elements["programme_category_name"].value;		
		var text2=form.elements["description"].value;
		if(text && text2){
			this.disabled=true;				
			document.forms["programmeCategoryForm"].submit();				
		}else{
			if(text=="")
				document.getElementById("p").innerHTML="Please Enter This Field";
			document.getElementById("p").style.color="red";	

			if(text2=="")
				document.getElementById("p2").innerHTML="Please Enter This Field";
			document.getElementById("p2").style.color="red";
			return false;
		}
	};
	$(function () {
		$(".programmeCategoryEdit").click(function () {   
			var images=$(this).data('programmecategoryimage');
			// var imagesPath="./images/"+images;
			var supplier=$(this).data('supplier'); 	
			$(".modal-body #programme_category_id").val($(this).data('programmecategoryid'));
			$(".modal-body #programme_category_editname").val($(this).data('programmecategoryname'));
			$(".modal-body #programme_category_editimage").prop("src",images);
			$(".modal-body #editdescription").val($(this).data('programmecategorydescription'));		          
			$(".modal-body #editdelete_status").val($(this).data('deletestatus'));
			$(".modal-body #hddProgrammeCatImage").val(images);
		})
	});
	$(document).ready(function(){
		$('.programme_category_delete').on("click",function(){
			return confirm("are you sure you want to delete?");
		})
	});
	</script>
<?php          
    }
   }
