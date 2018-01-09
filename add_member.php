<?php 
/**
-------------------------------------------
| This class is taking inputs as an arrays |
-------------------------------------------
**/
class Members {

   protected static $db_table = "complex";
   protected static $db_fields = array('wings','wingno','name','email','num','relation','residency');
   public $id;
   public $wings;
   public $wingno;
   public $name;
   public $email;
   public $number;
   public $relation;
   public $residency;


   protected function properties(){
    	$properties=array();
    	foreach(self::$db_fields as $fields){
    		if(property_exists($this, $fields)){
    			$properties[$fields]=$this->fields;
    		}
    	}
    	return $properties;
    } 

   // public function createmembers(){
   // 	global $database;
   // 	$sql = " INSERT INTO ".self::$db_table." VALUES ";
   // 	for($i=0; $i<=1; $i++){
   // 		$sql .="('".$database->escape_string($this->wings[$i])."','";
   // 		$sql .=$database->escape_string($this->wingno[$i])."','";
   // 		$sql .=$database->escape_string($this->name[$i])."','";
   // 		$sql .=$database->escape_string($this->email[$i])."','";
   // 		$sql .=$database->escape_string($this->number[$i])."','";
   // 		$sql .=$database->escape_string($this->relation[$i])."','";
   // 		$sql .=$database->escape_string($this->residency[$i])."'),";
   // 		   	}
   // 		   	$sql = rtrim($sql,",");
            
   //       //    echo "<pre>";
   // 		   	// print_r($sql);
   // 		   	// echo "</pre>";
   // 		   	// exit;
   // 	if($database->query($sql)){
   // 		return true;
   // 	}else{
   // 		return false;
   // 	}
   // }


   public function createmembers(){
   	     global $database;
    	 $properties=$this->properties();

    	 $sql  =" INSERT INTO ".static::$db_table." (". implode(",",array_keys($properties)).") ";
    	 $sql .=" VALUES ('";
    	 for($i=0; $i<=1; $i++){
    	 $sql .= implode("','",array_values($properties)[$i])."')";
         }
         echo "<pre>";
         print_r($sql);
         echo "</pre>";
         exit;

    	if($database->query($sql)){
    		$this->id = $database->insert_id();
    		return true;
    	}else{
    		return false; 
    	}
   }


}



 ?>