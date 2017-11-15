<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidenav.php'; ?>
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    	<div class="container">
  <hr>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#profile"><i class="fa fa-user" style="color:green"></i>Profile</a></li>
    <li><a data-toggle="tab" href="#preferences"><i class="fa fa-gear" style="color:orange"></i>Preferences</a></li>
    <li><a data-toggle="tab" href="#unitdetails"><i class="fa fa-building-o" style="color:orange"></i>Unit Details</a></li>
    <li><a data-toggle="tab" href="#unitmembers"><i class="fa fa-users" style="color:red"></i>Unit Members</a></li>
  </ul>

  <div class="tab-content">
    <div id="profile" class="tab-pane fade in active">
    	<br>
     <fieldset>
     	<legend>General</legend>
       <a href="editprofile.php"><button type="button" class="btn btn-primary">Edit Profile</button></a>
     </fieldset>
    </div>
    <div id="preferences" class="tab-pane fade">
      <br>
     <fieldset>
     	<legend>Preferences</legend>
     </fieldset>
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
                    	</div>
	<?php include 'footer.php'; ?>