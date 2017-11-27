 <?php session_start(); ?>
 <?php if(empty($_SESSION) || $_SESSION["is_loggedin"] == false){
header('location:index.php');
} ?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidenav.php'; ?>
<?php include 'functions.php'; ?>
<div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                	<div class="col-sm-12 col-xs-12">
                		<fieldset>
                			<legend>Reports</legend>
                			<!-- Large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <?php exportMembersData(); ?>
    </div>
  </div>
</div>
                		</fieldset>
                	</div>
                	</div>
                </div>
<?php include 'footer.php'; ?>