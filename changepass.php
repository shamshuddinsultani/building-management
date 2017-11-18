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
              		<legend>Change Password</legend>
              		<form action="changepassvalid.php" method="post">
              	<table class="table table-dark">
  <tbody>
    <tr>
      <td>Old Pass:</td>
      <td><input type="text" name="oldpass"></td>
     </tr>
     <tr>
      <td>New Pass:</td>
      <td><input type="text" name="newpass"></td>
     </tr>
     <tr>
      <td>Con Pass:</td>
      <td><input type="text" name="conpass"></td>
     </tr>
  </tbody>
</table>
                <button type="submit" name="submit" class="btn btn-info">Change</button>
              </form> 
              </fieldset>
              </div>
          </div>
<?php include 'footer.php'; ?>
