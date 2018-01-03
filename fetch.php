<?php 

class Fetch extends Db_objects {

    protected static $db_table="users";
    protected static $db_fields = array('fullname','gender','email','dateofbirth','bloodgroup','image','role' );
	public $fullname;
    public $gender;
    public $email;
    public $dateofbirth;
    public $bloodgroup;
    public $image;
    public $role;
	
}//End of User


