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
        <?php $sql="SELECT * FROM users WHERE id='".$_SESSION["id"]."' ";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
               

                $rowcount=mysqli_num_rows($result);
                if($rowcount>0){?>
             <?php if(!empty($row["image"])){ ?>
                <img src="<?php echo $row["image"]; ?>">
    <?php } else{?>
      <img src="assets/img/blankimage.jpg">
      <?php }
      } ?>
     	</div>
     </div>
     <div class="col-sm-8 col-xs-12">
     	<table class="table table-dark">
 
  <tbody>
    <tr>
      
      <td>Fullname:</td>
      <td> <?php $sql="SELECT * FROM users WHERE id='".$_SESSION["id"]."' ";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
               

                $rowcount=mysqli_num_rows($result);
                if($rowcount>0){?>
             <?php echo $row["fullname"]; } ?></td>
      
    </tr>
    <tr>
      
      <td>Email:</td>
      <td><?php $sql="SELECT * FROM users WHERE id='".$_SESSION["id"]."' ";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
               

                $rowcount=mysqli_num_rows($result);
                if($rowcount>0){?>
                <?php echo $row["email"]; }?>
 
     </td>
  </tr>
    <tr>
      
      <td>Birthday:</td>
      <td><?php $sql="SELECT * FROM users WHERE id='".$_SESSION["id"]."' ";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
               

                $rowcount=mysqli_num_rows($result);
                if($rowcount>0){?>
                <?php echo $row["dateofbirth"]; }?></td>
      
    </tr>
</tbody>
</table>
     </div>
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
                    	 
                    	
	<?php include 'footer.php'; ?>