<?php 

class User_photo extends Db_objects{

	protected static $db_table="users";
    protected static $db_fields = array('image');
    
    public $id;
    public $image;
    public $tmp_path;
    public $upload_directory = "uploadedpics";	


    //here $file =$_FILE[]

    public function set_file($file){

     if(empty($file) || !$file || !is_array($file)){
     	$this->errors[] = "There is no file uploaded";
     	return false;
     }elseif($file['error'] !=0){
     	$this->errors[]= $this->upload_errors_array[$file['error']];
     	return false;
     }else{

    $this->image = basename($file['name']);
    $this->tmp_path = $file['tmp_name'];
}
    }


    public function picture_path(){
    	return $this->upload_directory .DS. $this->image;
    }

    public function update_photo(){
    	if(!empty($this->errors)){
    		return false;
    	}

    	if(empty($this->image) || empty($this->tmp_path)){
    		$this->errors[] = "the file was not available";
    		return false;
    	} 

    	$target_path = SITE_ROOT .DS. $this->upload_directory .DS. $this->image;


    	if(move_uploaded_file($this->tmp_path,$target_path)){
    		if($this->update()){
    			unset($this->tmp_path);
    			return true;
    		}
    	}
    	else{
    		$this->errors[] = "the file directory does not have permissions";
    		return false;
    	}



    }//end of update_photo


}//end of class
$photo = new User_photo();
 ?>