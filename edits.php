<?php session_start(); ?>
<?php include 'db.php'; ?>
<?php 
if (isset($_POST['update'])) {
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$birth=$_POST['birth'];
	$blood=$_POST['blood'];

    // echo "<pre>"; print_r($_POST); exit;

  	$sql="UPDATE users SET fullname='".$name."',gender='".$gender."', 
	dateofbirth='".$birth."', bloodgroup='".$blood."' WHERE id='".$_SESSION["id"]."'";

	    if (mysqli_query($conn,$sql)) {
	    	echo ("<script>
              alert('updated successfully');
              window.location.assign('userprofile.php');  
          </script>");
	    }
	    else{
	    	echo ("<script>
              alert('conn error');
              window.location.assign('editprofile.php');  
          </script>");
	    }
}