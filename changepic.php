<?php session_start(); ?>
<?php if(empty($_SESSION) || $_SESSION["is_loggedin"] == false){
header('location:index.php');
} ?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidenav.php'; ?>
<?php include 'functions.php'; ?>
<?php if(isset($_POST['submit'])){
    changePicture();
} ?>
        <div id="page-wrapper">
            <div id="page-inner">
            	<fieldset>
            		<legend>Change Profile Pic</legend>
            		<form action="" method="post" enctype="multipart/form-data">
            		<table class="table table-dark">
  <tbody>
    <tr>
      
      <td>Pic to be uploaded</td>
      <td><input type="file" name="file" required></td>
      <td></td>
    </tr>
    <tr>
     
      <td></td>
      <td><small>1.Max size must be 100kb</small><br>
      	<small>2.Only bmp,png,jpg,tiff and gif types of file are allowed</small></td>
      <td></td>
    </tr>
    <tr>
     
      <td><button type="submit" name="submit" class="btn btn-info">Upload picture</button></td>
      <td><a href="editprofile.php"><button type="button" class="btn btn-info">Back to my profile</button></a></td>
      <td></td>
    </tr>
  </tbody>
</table>
</form>
            	</fieldset>
            </div>
<?php include 'footer.php'; ?>