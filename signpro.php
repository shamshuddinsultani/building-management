<?php include 'db.php'; ?>
<?php
if(isset($_POST['submit']))
{
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $conpassword=$_POST['conpassword'];

  if($password==$conpassword)
  {
    $sql="INSERT INTO admin VALUES('','$username','$email','$password')";
    if(mysqli_query($conn,$sql)){
      echo "data created";
      header('location:index.php');
    }
    else{
      echo "error";
    }
  }
  else{
    echo "password doent match";
  }

}
