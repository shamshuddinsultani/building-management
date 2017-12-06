<?php>
class Database{

    public function open_db_connection(){
        // Create connection
        $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    }


}

?>
