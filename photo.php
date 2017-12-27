<?php 

class Photo extends Db_objects {
 
     protected static $db_table = "photos";
     protected static $db_fields= array('photo_id','title','description','filename','type','size');
     public $photo_id;
     public $title;
     public $description;
     public $filename;
     public $type;
     public $size;

     public $tmp_path;
     public $upload_directory = "uploads";
     public $errors = array();
     public $upload_errors_array = array(
     
     UPLOAD_ERR_OK         =>"There is no error",
     UPLOAD_ERR_INI_SIZE   =>"The uploaded file exceeds the upload_max_filesize",
     UPLOAD_ERR_FORM_SIZE  =>"The uploaded file exceeds the MAX_FILE_SIZE",
     UPLOAD_ERR_PARTIAL    =>"The uploaded file was only partially uploaded",
     UPLOAD_ERR_NO_FILE    =>"No file was uploaded",
     UPLOAD_ERR_NO_TMP_DIR =>"Missing a temporary folder",
     UPLOAD_ERR_CANT_WRITE =>"Failed to write file to disk",
     UPLOAD_ERR_EXTENSION  =>"A PHP extention stopped the file upload"
     );
     
     // This is passing $_FILE as an arguement 
     public function set_file($file){
     	if(empty($file)) || !$file || !is_array($file){
     		$this->errors[]="There was no file uploaded";
     		return false;
     	}elseif($file['error']!=0){
     		$this->errors[]=$this->upload_errors_array[$file['error']];
     		return false;
     	}else{
		    $this->filename = basename($file['name']);
		    $this->tmp_path = $file['tmp_name'];
		    $this->type     = $file['type'];
		    $this->size     = $file['size'];
   }
 }

        public function save(){
        	if($this->photo_id){
        		$this->update();
        	}else{
        		if(!empty($this->errors)){
        			return false;
        		}
        		if(empty($this->filename) || empty($this->tmp_path)){
        			$this->errors[]="the file was not available";
        			return false;
        		}
        		$target_path = SITE_ROOT .DS. 'uploads' .DS. $this->upload_directory .DS. $this->filename;
        	}
        }       
   

}//end of photo
 ?>
