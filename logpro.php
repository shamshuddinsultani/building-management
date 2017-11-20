<?php session_start(); ?>
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
  $sql="SELECT * FROM users WHERE email='$email' && password='$password'";
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
      echo ("<script>
              alert('email and password not exists');
              window.location.assign('login.php');  
          </script>");
    }
  }
else{
  echo ("<script>
              alert('please login first');
              window.location.assign('login.php');  
          </script>");
}