<?php 

class User{

    public $db_users;
    public static $db_complex="complex";
    public static $db_users_fields = array('email','password');
    public static $db_complex_fields = array('wings','wingno','name','email','num','relation','residency');
	public $id;
	public $fullname;
	public $gender;
	public $email;
	public $password;
	public $dateofbirth;
	public $bloodgroup;
	public $wings;
	public $wingno;
	public $name;
	public $number;
	public $relation;
	public $residency;
	

	public static function find_all_users(){
		return self::find_this_query("SELECT * FROM ".self::$db_complex." ");				  
	  }
    
    public static function find_users_by_id($user_id){  
    	global $database;
    	$result_array=self::find_this_query("SELECT * FROM ".$db_users." WHERE id= $user_id");
    	return !empty($result_array) ? array_shift($result_array) : false;
     }	
    
    public static function find_this_query($sql){
    	global $database;
    	$result_set=$database->query($sql);
    	$obj_array=array();
    	while($row=mysqli_fetch_assoc($result_set)){
    		$obj_array[]=self::instantiation($row);
    		$_SESSION['role']=$row['role'];
    	}	
    	return $obj_array;
     }
    
    public static function verify_user($email,$password){
        global $database;
        $email=$database->escape_string($email);
        $password=$database->escape_string($password);

        $sql="SELECT * FROM ".self::$db_users." WHERE email='$email' AND password='$password' ";

        $result_array=self::find_this_query($sql);
    	return !empty($result_array) ? array_shift($result_array) : false;

    }



    public static function instantiation($record){
        $used = new self;
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
    	foreach(self::$db_table_fields as $db_field){
    		if(property_exists($this, $db_field)){
    			$properties[$db_field]=$this->$db_field;
    		}
    	}
    	return $properties;
    } 

    public function save(){
    	return isset($this->id) ? $this->update() :$this->create();
    }


    public function create(){
    	 global $database;
    	 $properties=$this->properties();
    	 $sql  =" INSERT INTO ".$db_users." (". implode(",",array_keys($properties)).") ";
    	 $sql .=" VALUES ('". implode("','",array_values($properties))."')";

    	if($database->query($sql)){
    		$this->id = $database->insert_id();
    		return true;
    	}else{
    		return false; 
    	}
    }//end of create 
    
    public function createmembers(){
    	global $database;
    	$properties=$this->properties();
    	echo "<pre>"; print_r($properties); exit;
    	$sql  ="INSERT INTO ".self::$db_complex." (". implode(",",array_keys($properties)).") ";
        $sql .=" VALUES ('". implode("','",array_values($properties))."')";
    	
    	if($database->query($sql)){
    		$this->id = $database->insert_id();
    		return true;
    	}else{
    		return false; 
    	}
    }//end of createmembers 
    
    public function update(){
    	global $database;
    	$properties = $this->properties();
    	$property_pairs=array();
    	foreach($properties as $key =>$value){
    		$property_pairs[]="{$key}='{$value}'";
    	}

    	$sql  = "UPDATE".self::$db_users."SET";
    	$sql .=implode(",",$property_pairs);
    	$sql .=" WHERE id= ".$database->escape_string($this->id);

    	$database->query($sql);

    	return (mysqli_affected_rows($database->conn)== 1) ? true :false;
    }//end of update method

}//End of User


