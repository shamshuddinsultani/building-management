<?php session_start(); ?>
<?php if(empty($_SESSION) || $_SESSION["is_loggedin"] == false){
header('location:index.php');
} ?>
<?php include 'db.php'; ?>
<?php
if(isset($_POST['submit']))
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit;
{
  $email=$_POST['email'];
  $password=$_POST['password'];
     $sql="SELECT * FROM admin WHERE email='$email' && password='$password'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
//echo "<pre>"; print_r($row); exit;

$rowcount=mysqli_num_rows($result);

    if($rowcount>0){
      $_SESSION['email']=$row["email"];
      $_SESSION['id']=$row["id"];
      $_SESSION['is_loggedin']=true;
      header('location:profile.php');
    }
    else{
      echo "error";
    }
  }
