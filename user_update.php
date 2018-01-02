<?php 

class Update extends Db_objects{

	protected static $db_table="users";
    protected static $db_fields = array('id','fullname');
	public $id;
	public $fullname;
}

 ?>