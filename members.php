<?php 
class Members extends Db_objects {
   
   public static $db_table="complex";
   public static $db_fields=array('wings','wingno','name','email','num','relation','residency');
   public $id;
   public $wings;
   public $wingno;
   public $name;
   public $email;
   public $num;
   public $relation;
   public $residency;


}

 ?>