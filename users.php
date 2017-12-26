<?php 

class User extends Db_objects {

    protected static $db_table="users";
    protected static $db_fields = array('email','password');
	public $id; 
	public $email;
	public $password;
	

	
    
    public static function verify_user($email,$password){
        global $database;
        $email=$database->escape_string($email);
        $password=$database->escape_string($password);

        $sql="SELECT * FROM ".self::$db_table." WHERE email='$email' AND password='$password' ";

        $result_array=self::find_this_query($sql);
    	return !empty($result_array) ? array_shift($result_array) : false;

    }



  

}//End of User


