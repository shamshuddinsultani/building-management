<?php 

class Db_objects {


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



	public static function find_all_users(){
		return static::find_this_query("SELECT * FROM ".static::$db_table." ");				  
	  }
    
    public static function find_users_by_id($user_id){  
    	global $database;
    	$result_array=static::find_this_query("SELECT * FROM ".static::$db_table." WHERE id= $user_id");
    	return !empty($result_array) ? array_shift($result_array) : false;
     }	
    
    public static function find_this_query($sql){
    	global $database;
    	$result_set=$database->query($sql);
    	$obj_array=array();
    	while($row=mysqli_fetch_assoc($result_set)){
    		$obj_array[]=static::instantiation($row);
    	}	
    	return $obj_array;
     }



  public static function instantiation($record){
  		$called_class = get_called_class();
        $used = new $called_class;
        foreach($record as $property=>$value){

           if ($used->has_property($property)) {
           	   $used->$property=$value;
           }
        }

        return $used;
     }

    private function has_property($property){
     	$obj_properties= get_object_vars($this);
     	return array_key_exists($property,$obj_properties);
     }

    protected function properties(){
    	$properties=array();
    	foreach(static::$db_fields as $fields){
    		if(property_exists($this, $fields)){
    			$properties[$fields]=$this->$fields;
    		}
    	}
    	return $properties;
    } 

     public function clean_properties(){
   	global $database;
   	$clean_propreties = array();
   	foreach($this->properties() as $key => $value){
   		$clean_propreties[$key]=$database->escape_string($value);
   	}
   	return $clean_propreties;
   }

    public function save(){
    	return isset($this->id) ? $this->update() :$this->create();
    }


    public function create(){
    	 global $database;
    	 $properties=$this->clean_properties();

    	 $sql  =" INSERT INTO ".static::$db_table." (". implode(",",array_keys($properties)).") ";
    	 $sql .=" VALUES ('". implode("','",array_values($properties))."')";

    	if($database->query($sql)){
    		$this->id = $database->insert_id();
    		return true;
    	}else{
    		return false; 
    	}
    }//end of create  
    
    public function update(){
    	global $database;
    	$properties = $this->clean_properties();
    	$property_pairs=array();
    	foreach($properties as $key =>$value){
    		$property_pairs[]="{$key}='{$value}'";
    	}

    	$sql  = "UPDATE ".static::$db_table." SET ";
    	$sql .= implode(",",$property_pairs);
    	$sql .= " WHERE id = ".$database->escape_string($this->id);
    	$database->query($sql);
    	return (mysqli_affected_rows($database->conn)== 1) ? true :false;
    }//end of update method
}
 ?>