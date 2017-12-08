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
    	return $result_set;
     }
    
    
}



 ?>