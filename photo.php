<?php 

class Photo extends Db_objects {
 
     protected static $db_table = "photos";
     protected static $db_fields= array('photo_id','title','description','filename','type','size');
     public $photo_id;
     public $title;
     public $description;
     public $filename;
     public $type;
     public $size;
 }
 ?>
