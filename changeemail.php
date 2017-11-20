<?php session_start(); ?>
<?php if(empty($_SESSION) || $_SESSION["is_loggedin"] == false){
header('location:index.php');
} ?>
<?php include 'db.php'; ?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidenav.php'; ?>
        <div id="page-wrapper">
        	     <div id="page-inner">
              <div class="row">
              	<fieldset>
              		<legend>Change email</legend>
              		<form action="" method="post">
              	<p>New Email: <input type="email" name="email">  <button type="submit" name="submit" class="btn btn-info">Change</button></p>
              </form> 
              </fieldset>
              </div>
          </div>
<?php include 'footer.php'; ?>
<?php 
if(isset($_POST['submit'])){
	$email=$_POST['email'];

	$sql="UPDATE users SET email='".$email."'  WHERE id='".$_SESSION["id"]."'";
	 if(mysqli_query($conn,$sql)){
          echo ("<script>
              alert('updated successfully');
              window.location.assign('changeemail.php');  
          </script>");
	 }
	 else{
	 	 echo ("<script>
              alert('error');
              window.location.assign('changeemail.php');  
          </script>");
	 }
}
 ?>