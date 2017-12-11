<?php 

class User{

	public $id;
	public $wings;
	public $wingno;
	public $name;
	public $email;
	public $number;
	public $relation;
	public $residency;

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
        $email=$database->mysql_prep($email);
        $password=$database->mysql_prep($password);

        $sql="SELECT * FROM users WHERE";
        $sql.="email='{$email}' ";
        $sql.="AND password='{$password}' ";

        $result_array=self::find_this_query($sql);
    	return !empty($result_array) ? array_shift($result_array) : false;

    }



    public static function instantiation($record){
        $used            = new self;
		// $used->id        =$found['id'];
		// $used->wings     =$found['wings'];
		// $used->wingno    =$found['wingno'];
		// $used->name      =$found['name'];
		// $used->email     =$found['email'];
		// $used->number    =$found['number'];
		// $used->relation  =$found['relation'];
		// $used->residency =$found['residency'];

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

