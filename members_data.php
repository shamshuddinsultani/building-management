<?php session_start(); ?>
<?php if(empty($_SESSION) || $_SESSION["is_loggedin"] == false){
header('location:index.php');
} ?>
<?php include 'db.php'; ?>
<?php if(isset($_POST['submit']))
{
	$first=false;
    $file=$_FILES['file']['tmp_name'];
    $handle=fopen($file,'r');
    while($row = fgetcsv($handle)){
    	if(!$first){
    		$first=true;
    	}else{
    	$value= "'".implode("','",$row)."'";
    	$sql="INSERT INTO members(blockname,unitno,memname,mememail,memphone,relation,residing,emergeno,alterno1,alterno2,mailadd,permaadd,addinfo) VALUES(".$value.") ";
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
}



