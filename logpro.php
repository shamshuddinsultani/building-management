<?php include 'db.php'; ?>
<?php
if(isset($_POST['submit']))
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit;
{
  $username=$_POST['username'];
  $password=$_POST['password'];

     $sql="SELECT * FROM admin WHERE username='$username' && password='$password'";
$result=mysqli_query($conn,$sql);

$rowcount=mysqli_num_rows($result);
// echo "<pre>"; print_r($rowcount); exit;
    if($rowcount>0){
      header('location:profile.php');
    }
    else{
      echo "error";
    }
  }
