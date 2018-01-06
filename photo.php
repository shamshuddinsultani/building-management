<?php 

class Photo extends Db_objects {
 
     protected static $db_table = "users";
     protected static $db_fields= array('image');
     public $image;

     public $tmp_path;
     public $upload_directory = "uploads";
    
     
     // This is passing $_FILE as an arguement 
     public function set_file($file){
     	if(empty($file) || !$file || !is_array($file)){
     		$this->errors[]="There was no file uploaded";
     		return false;
     	}elseif($file['error']!=0){
     		$this->errors[]=$this->upload_errors_array[$file['error']];
     		return false;
     	}else{
		    $this->filename = basename($file['name']);
		    $this->tmp_path = $file['tmp_name'];
		    
   }
 }
        
        public function picture_path(){
        	return $this->upload_directory.DS.$this->filename;
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

        		$target_path = SITE_ROOT .DS. $this->upload_directory .DS. $this->filename;

                if(file_exists($target_path)){
                	$this->errors[]="The file {$this->filename} already exists";
                	return false;
                }

                if(move_uploaded_file($this->tmp_path,$target_path)){
                	if($this->update()){
                		unset($this->tmp_path);
                		return true;
                	}
                }else{
                	$this->errors[]="the file directory does not have permissions";
                	return false;
                }


        	}
        }       
  
}//end of photo
 ?>
