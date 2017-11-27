<?php session_start(); ?>
<?php if(empty($_SESSION) || $_SESSION["is_loggedin"] == false){
header('location:index.php');
} ?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidenav.php'; ?>
<?php include 'functions.php'; ?>
<?php if(isset($_POST['submit'])){
   uploadMembers();
} ?>
        <div id="page-wrapper">
            <div id="page-inner">
               <div class="row">
                	 <div class="col-md-12 col-sm-12 col-xs-12">
                	 	<fieldset>
                	 		<legend>Upload Members</legend>
                	 	<form action="" method="post" enctype="multipart/form-data">
                	 		<table class="table table-dark">
  <tbody>
    <tr>
      
      <td>Members data file:</td>
      <td><input type="file" name="file" required><br></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>

      <td><button type="submit" name="submit" class="btn btn-info">Upload members data</button></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>
                	 	</form>
                	 </fieldset>
                	 </div>
                </div>
            </div>
<?php include 'footer.php'; ?>