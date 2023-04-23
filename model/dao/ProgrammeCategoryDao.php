<?php
class ProgrammeCategoryDao extends DAO{
    
    public function getAllCategoryByRows($start,$no_of_record){
        $sql="select * from tbl_programme_category limit $start,$no_of_record";
        $this->openDB();
        $this->prepareQuery($sql);
        $result=$this->executeQuery();
        return $result;
    }
    
    public function getAllCategory(){
        $sql="select * from tbl_programme_category";
        $this->openDB();
        $this->prepareQuery($sql);
        $result=$this->executeQuery($sql);
        return count($result);
    }
    
    public function insertProgrammeCategory(){
        $programme_category_name=$_POST['programme_category_name'];
        $description=$_POST['description'];
        // $delete_status=$_POST['delete_status'];
        
        $programme_category_file = store_uploaded_img($_FILES['programme_category_image'], "./images/programme_category/");
        // $programme_category_file=$_FILES['programme_category_image'];
        // $programme_category_file_name=$programme_category_file['name'];
        // $programme_category_file_tmp_name=$programme_category_file['tmp_name'];
        // $programme_category_file_destination='images/'.$programme_category_file_name;
        // echo $programme_category_file_name;
        
        $sql="INSERT INTO tbl_programme_category VALUES(NULL,:programme_category_name,:programme_category_image,:description,:delete_status)";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam("programme_category_name", $programme_category_name);
        $this->bindQueryParam("programme_category_image", $programme_category_file);
        $this->bindQueryParam("description", $description);
        $this->bindQueryParam("delete_status", 0);
        
        // move_uploaded_file($programme_category_file_tmp_name, $programme_category_file_destination);
        $this->beginTrans();
        $result=$this->executeUpdate();
        if ($result) {
                  $this->commitTrans();
        }else {
            $this->rollbackTrans();
            }
    }
    
    public function editProgrammeCategory(){
        $programme_category_editname=$_POST['programme_category_editname'];
        $editdescription=$_POST['editdescription'];
        $id=$_POST['programme_category_id'];
        
        if(!empty($_FILES['programme_category_editimage']['name'])){

            $programme_category_file_name = store_uploaded_img($_FILES['programme_category_editimage'],"./images/programme_category/");
            
        }else {
        
            $programme_category_file_name=$_POST['oldPhoto'];
            
        }
        
        $sql="update tbl_programme_category set programme_category_name=:name,image=:image,description=:description where programme_category_id=:id";
        $this->openDB();
        $this->prepareQuery($sql);
        $this->bindQueryParam(":name", $programme_category_editname);
        $this->bindQueryParam(":image", $programme_category_file_name);
        $this->bindQueryParam(":description", $editdescription);
        $this->bindQueryParam(":id", $id);
        
       
        $this->beginTrans();
        $result=$this->executeUpdate();
        if ($result) {
            $this->commitTrans();
        }else {
            $this->rollbackTrans();
        }
    }
   
   
}

