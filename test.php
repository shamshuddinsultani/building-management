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
$found_user=User::find_users_by_id(6);
$user = new User();
$user->id=$found_user['id'];
$user->wings=$found_user['wings'];
$user->wingno=$found_user['wingno'];
$user->name=$found_user['name'];
$user->email=$found_user['email'];
$user->number=$found_user['number'];
$user->relation=$found_user['relation'];
$user->residency=$found_user['residency'];

echo $user->id;
// $used = User::instantiation($found_user);

// echo $used->number; 
 // $users=User::find_all_users();
 // foreach($users as $user){
 // 	echo $user->number ."<br>";
 // }
 ?>