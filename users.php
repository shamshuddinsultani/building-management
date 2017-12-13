<?php 

class User{

	public $id;
	public $fullname;
	public $gender;
	public $email;
	public $password;
	public $dateofbirth;
	public $bloodgroup;
	

	public static function find_all_users(){
		return self::find_this_query("SELECT * FROM complex");				  
	  }
    
    public static function find_users_by_id($user_id){
    	global $database;
    	$result_array=self::find_this_query("SELECT * FROM complex WHERE id= $user_id");
    	return !empty($result_array) ? array_shift($result_array) : false;
     }	
    
    public static function find_this_query($sql){
    	global $database;
    	$result_set=$database->query($sql);
    	$obj_array=array();
    	while($row=mysqli_fetch_array($result_set)){
    		$obj_array[]=self::instantiation($row);
    	}	
    	return $obj_array;
     }
    
    public static function verify_user($email,$password){
        global $database;
        $email=$database->escape_string($email);
        $password=$database->escape_string($password);

        $sql="SELECT * FROM users WHERE email='$email' AND password='$password' ";

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
    
}


