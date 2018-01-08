<?php require_once("init.php"); ?>
<?php 
if(!$session->is_logged_in()){
  header("location:index.php");    
}?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidenav.php'; ?>
<?php 
$user_id=$_SESSION['user_id'];
$fetch=Fetch::find_users_by_id($user_id);

?>
        <div id="page-wrapper">
            <div id="page-inner">
              <div class="row">
                    <div class="col-sm-12 col-xs-12">
                    	
  <hr>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#profile"><i class="fa fa-user" style="color:green"></i>Profile</a></li>
    <li><a data-toggle="tab" href="#preferences"><i class="fa fa-gear" style="color:orange"></i>Preferences</a></li>
    <li><a data-toggle="tab" href="#unitdetails"><i class="fa fa-building-o" style="color:black"></i>Unit Details</a></li>
    <li><a data-toggle="tab" href="#unitmembers"><i class="fa fa-users" style="color:red"></i>Unit Members</a></li>
  </ul>

  <div class="tab-content">
    <div id="profile" class="tab-pane fade in active">
    	<br>
     <fieldset>
     	<legend>General <span style="float: right;"><a href="editprofile.php"><button type="button" class="btn btn-primary">Edit Profile</button></a></span></legend>
     	<div class="col-sm-4 col-xs-12">
     		<div id="preview">

           <img src="<?php echo $fetch->photo_path(); ?>/<?php echo $fetch->image; ?>" alt="Image" />
     	</div>
     </div>
     <div class="col-sm-8 col-xs-12">
     	<table class="table table-dark">
 
  <tbody>
  

    <tr>
      
      <td>Fullname:</td>
      <td><?php echo $fetch->fullname; ?> </td>
      
    </tr>
    <tr>
    
      <td>Email:</td>
      <td><?php echo $fetch->email; ?></td>
  </tr>
    <tr>
      
      <td>Birthday:</td>
      <td><?php echo $fetch->dateofbirth; ?></td>
      
    </tr>
      <tr>
      
      <td>Bloodgroup:</td>
      <td><?php echo $fetch->bloodgroup; ?></td>
      
    </tr>
</tbody>
</table>
     </div>
     </fieldset>
    </div>
    <div id="preferences" class="tab-pane fade">
      <br>
      <?php  
    if($fetch->role!=='admin'){
       echo "Access Denied";
    }else{?> <fieldset>
      <legend>Preferences</legend>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
     </fieldset><?php }
     ?>
    
 </div>
    <div id="unitdetails" class="tab-pane fade">
      <br>
     <fieldset>
     	<legend>Unit Details</legend>
     </fieldset>
 </div>
    <div id="unitmembers" class="tab-pane fade">
     <br>
     <fieldset>
     	<legend>Unit Members</legend>
     </fieldset>
    </div>
  </div>
</div>
                    	        </div>
                    	    </div>
                    	 
                    	
	<?php include 'footer.php'; ?>