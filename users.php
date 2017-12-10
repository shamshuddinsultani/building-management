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
    	
    	$result_set=self::find_this_query("SELECT * FROM complex WHERE id= $user_id");
    	$found_user=mysqli_fetch_array($result_set);
    	return $found_user;
     }	
    
    public static function find_this_query($sql){
    	global $database;
    	$result_set=$database->query($sql);
    	// $var_array=array();
    	// while($row=mysqli_fetch_array($result_set)){
    	// 	$var_array[]=self::instantiation($row);
    	// }	
    	return $result_set;
     }
    
  //   public static function instantiation($used){
  //       $used_found = new self;
		// $used->id=$found['id'];
		// $used->wings=$found['wings'];
		// $used->wingno=$found['wingno'];
		// $used->name=$found['name'];
		// $used->email=$found['email'];
		// $used->number=$found['number'];
		// $used->relation=$found['relation'];
		// $used->residency=$found['residency'];

     //   foreach($used as $property=>$value){
     //       if ($used->has_property($property)) {
     //       	   $used->$property=$value;
     //       }
     //    }

     //    return $used_found;
     // }

     // private function has_property($property){
     // 	$var= get_object_vars($this);
     // 	return array_key_exists($property,$var);
     // }
    
}



 ?>