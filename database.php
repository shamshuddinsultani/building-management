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
}

$database=new Database();
?>
