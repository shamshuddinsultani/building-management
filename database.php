<?php
require_once("config.php");
class Database{
    
    public $conn;
    function __construct(){
    	$this->open_db_connection();
      }

    public function open_db_connection(){
        // Create connection
        $this->conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if($this->conn->connect_errno){
            die("connection failed".$this->conn->connect_errno);
        }
      }

    public function close_connection(){
    	if(isset($this->conn)){
    		mysqli_close($this->conn);
    		unset($this->conn);
    	}
      }

    public function query($sql){
        $result=$this->conn->query($sql);
    	// $result=mysqli_query($this->conn,$sql);
    	$this->confirm_query($result);
    	return $result;
      }

    private function confirm_query($result){
    	if(!$result){
    		die("database query isssssssssssss failed".$this->conn->error);
    	}
     }
    
    public function escape_string($string){
    	$escape_string=mysqli_real_escape_string($this->conn,$string);
    	return $escape_string;
     }

     public function insert_id(){
        return $this->conn->insert_id;
     }
        
}

$database=new Database();
?>
