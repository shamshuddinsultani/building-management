<?php
class Database{
    
    public $conn;
    function __construct(){
    	$this->open_db_connection();
      }

    public function open_db_connection(){
        // Create connection
        $this->conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if(mysqli_connect_errno()){
            die("connection failed".mysqli_error());
        }
      }

    public function close_connection(){
    	if(isset($this->conn)){
    		mysqli_close($this->conn);
    		unset($this->conn);
    	}
      }

    public function query($sql){
    	$result=mysqli_query($this->conn,$sql);
    	$this->confirm_query($result);
    	return $result;
      }

    private function confirm_query($result){
    	if(!$result){
    		die("database query failed.");
    	}
     }
    
    public function mysql_prep($string){
    	$escape_string=mysqli_real_escape_string($this->conn,$string);
    	return $escape_string;
     }
        
}

$database=new Database();
?>
