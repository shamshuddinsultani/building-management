<?php session_start(); ?>
<?php include 'db.php'; ?>
<?php if(isset($_POST['submit']))
{
    $file=$_FILES['file']['tmp_name'];
    $handle=fopen($file,'r');
    while($row = fgetcsv($handle)){
    	$value= "'".implode("','",$row)."'";
    	$sql="INSERT INTO csv(firstname,lastname,age) VALUES(".$value.") ";
    	if (mysqli_query($conn,$sql)) {
    		echo ("<script>
              alert('members uploaded successfully');
              window.location.assign('upload_members.php');  
          </script>");
    	}
    	else{
    		echo ("<script>
              alert('connection error');
              window.location.assign('upload_members.php');  
          </script>");
    	}
    }
}



