<?php require_once("init.php"); ?>
<?php 
if(!$session->is_logged_in()){
  header("location:index.php");    
}?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidenav.php'; ?>
<?php  
   if(empty($_GET['id'])){
    header("location:index.php");
   }
   $users= User::find_users_by_id($_GET['id']);

?>
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    	<fieldset>
                    		<legend>Edit profile</legend>
                    		
     		<div class="col-sm-4 col-xs-12">
        <table class="table table-hover">
          <tbody>
            <?php foreach($users as $user) :?>
            <tr>
              <td><img src="<?php echo $user->placeholder(); ?>"></td>
            

            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
     
     	<a href="changepic.php"><button type="button" class="btn btn-primary" style="width: 225px;">change profile</button></a>
     </div>
     <div class="col-sm-8 col-xs-12">
      <form action="" method="post">
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
<button type="submit" name="update" class="btn btn-info">Update Profile</button>
</form>
     </div>
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
      <td><?php $sql="SELECT * FROM users WHERE id='".$_SESSION["id"]."' ";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
               

                $rowcount=mysqli_num_rows($result);
                if($rowcount>0){?>
                <?php echo $row["email"]; }?></td>
      <td><a href="changeemail.php">Change email</a></td>
      <td><a href="changepass.php">Change password</a></td>
    </tr>
    <tr>
     
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td></td>
    </tr>
    <tr>
      
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td></td>
    </tr>
  </tbody>
</table>
    	</fieldset>
  
  </div>
                    	    </div>
                    	</div>
	<?php include 'footer.php'; ?>