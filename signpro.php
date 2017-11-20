<?php session_start() ?>
<?php include 'db.php'; ?>

<?php
if(isset($_POST['submit']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];
  $conpassword=$_POST['conpassword'];

  if($password==$conpassword)
  {
    $sql="INSERT INTO users(email,password) VALUES('$email','$password')";
    if(mysqli_query($conn,$sql)){
      echo ("<script>
              alert('user created successfully');
              window.location.assign('signup.php');  
          </script>");
    }
    else{
      echo ("<script>
              alert('connection error');
              window.location.assign('signup.php');  
          </script>");
    }
  }
  else{
    echo ("<script>
              alert('password doent match');
              window.location.assign('signup.php');  
          </script>");
  }

}
else{
  echo ("<script>
              alert('please signup first');
              window.location.assign('signup.php');  
          </script>");
}
