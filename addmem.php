<?php require_once("init.php"); ?>
<?php 
if(!$session->is_logged_in()){
    header("location:index.php");    
}?>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include 'sidenav.php'; ?>
<?php if(isset($_POST['submit'])){
       $wings=$_POST["wings"];
       $wingno=$_POST["wingno"];
       $name=$_POST["name"];
       $email=$_POST["email"];
       $number=$_POST["num"];
       $relation=$_POST["relation"];
       $residency=$_POST["residency"];

       //inserting into database
      $inserted = User::createmembers($wings,$wingno,$name,$email,$number,$relation,$residency);

      if($inserted){
         echo ("<script>
              alert('Member added successfully');
              window.location.assign('addmem.php');  
          </script>");
       }else{
         echo ("<script>
              alert('connection error');
              window.location.assign('addmem.php');  
          </script>");
       }
} ?>
<div id="page-wrapper">
      <div id="page-inner">
         <div class="row">
           <div class="col-md-12 col-sm-12 col-xs-12">
		<fieldset>
			<legend>Add members</legend>
			<form action="" method="post">
		<table class="table table-bordered table-dark">
			  <thead>
			    <tr>
			      <th scope="col">Row #</th>
			      <th scope="col">Block & unit  #</th>
			      <th scope="col">Full Name</th>
			      <th scope="col">Email</th>
			      <th scope="col">Mobile</th>
			      <th scope="col">Relationship</th>
			      <th scope="col">Residings</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>
    <select size="1" name="wings" >
    	<option></option>
        <option value="wing a" >Wing A</option>
        <option value="wing b" >Wing B</option>
        <option value="wing c" >Wing C</option>
    </select>
     <select size="1" name="wingno">
    	<option></option>
        <option value="002">002</option>
        <option value="003">003</option>
        <option value="004">004</option>
    </select>
    </td>
    <td><input type="text" name="name"></td>
    <td><input type="email" name="email"></td>
    <td><input type="tel" name="num"></td>
       <td>
     <select size="1" name="relation">
    	<option></option>
        <option value="co-owner">Co-owner</option>
        <option value="owner's family">Owner's family</option>
        <option value="registered owner">Registered owner</option>
        <option value="tenant">Tenant</option>
        <option value="tenant's family">Tenant's family</option>
    </select>
    </td>
     <td>
     <select size="1" name="residency">
    	<option></option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select>
    </td>

  			 </tr>
			</tr>
			  </tbody>
</table>
<button type="submit" name="submit" class="btn btn-info">submit</button>
</form>
</fieldset>
</div>
</div><br><br>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
  <fieldset>
    <legend>Upload Members</legend>
    <small>You can upload member(s) in bulk</small><br><br>
    <a href="upload_members.php"><button type="button" class="btn btn-info">Upload Members</button></a>
  </fieldset>
  </div>
</div>
</div>
<?php include 'footer.php'; ?>
