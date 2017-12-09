<?php 
require_once("init.php");
if(isset($database)){echo "true";} else{echo "false";}
echo "<br>";
echo $database->mysql_prep("it's working?");
echo "<br>";
// $result=User::find_all_users();
// while ($row = mysqli_fetch_array($result)) {
// 	echo $row['name']."<br>";
// }
// $found_user=User::find_users_by_id(6);
// $used = User::instantiation($found_user);

// echo $used->number; 
 $users=User::find_all_users();
 foreach($users as $user){
 	echo $user->number ."<br>";
 }
 ?>