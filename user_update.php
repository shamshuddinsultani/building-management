<?php 

class Update extends Db_objects{

	protected static $db_table="users";
    protected static $db_fields = array('id','fullname','gender','dateofbirth','bloodgroup');
    public $id;
	public $fullname;
	public $gender;
	public $dateofbirth;
	public $bloodgroup;

}

 ?>