<?php 

class User{

	public static function find_all_users(){
		global $database;
		$result_set=$database->query("SELECT * FROM complex");
		return $result_set;
	  
	  }
    
    public static function find_users_by_id($user_id){
    	global $database;
    	$result_set=$database->query("SELECT * FROM complex WHERE id= $user_id");
    	$found_user=mysqli_fetch_array($result_set);
    	return $found_user;
     }
    

}



 ?>