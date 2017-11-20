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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    	<fieldset>
                    		<legend>Edit profile</legend>
                    		<form action="" method="post" enctype="multipart/form-data">
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
     	<a href="changepic.php"><button type="button" class="btn btn-primary" style="width: 225px;">change profile</button></a>
     </div>
     <div class="col-sm-8 col-xs-12">
     	<table class="table table-dark">
 
  <tbody>
    <tr>
      
      <td>Fullname:</td>
      <td><input type="text" name="name"></td>
      
    </tr>
    <tr>
      
      <td>Gender:</td>
      <td> <select size="1" name="gender" >
    	<option></option>
        <option value="male" >Male</option>
        <option value="female" >Female</option>
        <option value="others" >Others</option>
    </select></td>
      
    </tr>
    <tr>
      
      <td>Birthday</td>
      <td><input type="date" name="birth"></td>
      
    </tr>
      <tr>
      
      <td>Bloodgroup:</td>
      <td> <select size="1" name="blood" >
    	<option></option>
        <option value="O+" >O+</option>
        <option value="O-" >O-</option>
        <option value="A+" >A+</option>
        <option value="A-" >A-</option>
        <option value="B+" >B+</option>
        <option value="B-" >B-</option>
        <option value="AB+" >AB+</option>
        <option value="AB-" >AB-</option>
    </select></td>
      
    </tr>
  </tbody>
</table>
     </div>
 </form>
                    	</fieldset>

  </div>
  </div><br><br><br>
  <div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
  		
  	<fieldset>
  		<legend>Email</legend>
  		
  			<table class="table table-dark">
  <tbody>
    <tr>
      
      <td>Email Address</td>
      <td><?php echo $_SESSION['email']; ?></td>
      <td><a href="changeemail.php">Change email</a></td>
      <td><a href="changepass.php">Change password</a></td>
    </tr>
    <tr>
     
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
    	</fieldset>
  
  </div>

                    	    </div>
                    	</div>
	<?php include 'footer.php'; ?>