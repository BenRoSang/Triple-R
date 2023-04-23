<?php
class AllProgrammeDetailView extends AdminView{
	private $programme;
	public function __construct($programme=NULL){
		
		$this->programme=$programme;
	}
	public function displayBody(){
		
		foreach($this->programme as $key=>$value)
		?>

       


<div class="col-md-8 offset-md-2">
    <div class="card mb-3">
      <div class="card-body">
        <div class="form-group">
          <div>
             <img class="img-fluid" src="<?php echo $value['image']?>" alt="" width="300px" height="300px">
          </div>           
          <?php if($value["video"]!=""){?>
           <video width="300px" height="300px" controls> <source
            src="<?php $array=explode('.',$value["video"]);
            $type="video/".$array[2]; echo $value["video"];?>" type="<?php echo $type;?>">
          </video>
        <?php }?>
				<div class="row">
                <div class="col mb-3">
                <label><b>Programme Name: </b><?php echo $value["programme_name"]?></label>
                </div>
			</div>
			<div class="row">
                <div class="col mb-3">
                  <label><b>Programme Category Name: </b><?php echo $value["programme_category_name"]?></label>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                  <label><b>Organization: </b><?php echo $value["organization"]?> </label>
                </div>
            </div>  



             

              <div class="row">
                <div class="col mb-3">
                  <label><b>Description:</b><?php echo $value["description"]?></label>
               
              </div>
              </div>
         <div class="text-left">
		<a href="index.php?usecase=<?php echo UC_ADMIN_PROGRAM?>" class="btn btn-secondary btn-sm ">&lt&ltBack</a>

         </div>

            
          </div>
        </div>
      </div>
    </div>
  </div> 
<?php
	}

}