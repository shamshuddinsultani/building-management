<?php session_start(); ?>
<?php if(empty($_SESSION) || $_SESSION["is_loggedin"] == false){
header('location:index.php');
} ?>
<?php include 'db.php'; ?>

<?php 
if(isset($_POST['submit'])){
	$oldpass=$_POST['oldpass'];
  $newpass=$_POST['newpass'];
  $conpass=$_POST['conpass'];

  $sql="SELECT * FROM admin WHERE password='$oldpass' and id='".$_SESSION["id"]."'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $rowcount=mysqli_num_rows($result);
  if($rowcount>0){
    if($newpass==$conpass){
    	$sql="UPDATE admin SET password='".$newpass."'  WHERE id='".$_SESSION["id"]."'";
    	 if(mysqli_query($conn,$sql)){
        echo ("<script>
              alert('updated successfully');
              window.location.assign('changepass.php');  
          </script>");
    	 }
    	 else{      
    	 	echo ("<script>
              alert('connection error');
              window.location.assign('changepass.php');  
          </script>");
    	 }
      }
      else{

        echo ("<script>
              alert('password doent match');
              window.location.assign('changepass.php');  
          </script>");
      }
 
    }
    else{
      
     echo ("<script>
              alert('password doent exists');
              window.location.assign('changepass.php');  
          </script>");
    }
}
 ?>