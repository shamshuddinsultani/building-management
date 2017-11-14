<?php include 'db.php';
if(isset($_POST['submit']))
{
  $username=$_POST['name'];
  $email=$_POST['email'];
  $pass=$_POST['password'];

  $sql="INSERT INTO admin VALUES('$username','$email','$pass')";
  if(mysqli_query($conn,$sql)){
    echo "data created";
    header('location:profile.php');
  }
  else{
    echo "error";
  }
}
