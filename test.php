<?php 
require_once("init.php");
if(isset($database)){echo "true";} else{echo "false";}
echo "<br>";
echo $database->mysql_prep("it's working?");
echo "<br>";
$sql="SELECT * FROM users WHERE id=1";
$result=$database->query($sql);
$found_user=mysqli_fetch_array($result);
echo $found_user['fullname'];
 ?>