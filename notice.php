<?php session_start(); ?>
<?php if(empty($_SESSION) || $_SESSION["is_loggedin"] == false){
header('location:index.php');
} ?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidenav.php'; ?>
<?php include 'functions.php'; ?>
<?php if(isset($_POST['submit'])){
    uploadFiles();
} ?>
        <div id="page-wrapper">
            <div id="page-inner">

              <fieldset class="repeat">
                <legend class="medium">Noticeboard</legend>
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table table-dark">
  <thead>
    <tr>
      If you are looking to buy/sell/rent or are looking for/offering services - please post on ApnaComplex Classified  for a larger reach.
    </tr>
  </thead>
  <tbody>
    <tr>
    
      <td>Subject</td>
      <td><input type="text" name="subject"></td>
      <td></td>
    </tr>
    <tr>
      
      <td>Attachments,if</td>
      <td><input type="file" name="file"></td>
      <td><button type="submit" name="submit" class="btn btn-primary upload">Uploadfile</button></td>

    </tr>
  </tbody>
</table>
                </form>
              </fieldset>
                    </div>
              
                <!-- /. ROW  -->
	<?php include 'footer.php'; ?>
