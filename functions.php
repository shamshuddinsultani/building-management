<?php include 'db.php'; ?>
<?php 

function logIn(){
  global $conn;
  $email=$_POST['email'];
  $password=$_POST['password'];
  $sql="SELECT * FROM users WHERE email='$email' && password='$password'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
//echo "<pre>"; print_r($row); exit;

$rowcount=mysqli_num_rows($result);

    if($rowcount>0){
      $_SESSION['email']=$row["email"];
      $_SESSION['id']=$row["id"];
      $_SESSION['is_loggedin']=true;
      header('location:profile.php');
    }
    else{
      echo ("<script>
              alert('email and password not exists');
              window.location.assign('login.php');  
          </script>");
    }
 }

function signUp(){
  global $conn;
  $email=$_POST['email'];
  $password=$_POST['password'];
  $conpassword=$_POST['conpassword'];

  if($password==$conpassword)
  {
    $sql="INSERT INTO users(email,password) VALUES('$email','$password')";
    if(mysqli_query($conn,$sql)){
      echo ("<script>
              alert('user created successfully');
              window.location.assign('signup.php');  
          </script>");
    }
    else{
      echo ("<script>
              alert('connection error');
              window.location.assign('signup.php');  
          </script>");
    }
  }
  else{
    echo ("<script>
              alert('password doent match');
              window.location.assign('signup.php');  
          </script>");
  }

}


function addMembers(){
	   global $conn;
	   $wings=$_POST["wings"];
       $wingno=$_POST["wingno"];
       $name=$_POST["name"];
       $email=$_POST["email"];
       $number=$_POST["number"];
       $relation=$_POST["relation"];
       $residency=$_POST["residency"];

       $sql = "INSERT INTO complex  VALUES ('','$wings','$wingno','$name','$email','$number','$relation','$residency')";


          if (mysqli_query($conn, $sql)) {
            echo ("<script>
              alert('Member added successfully');
              window.location.assign('addmem.php');  
          </script>");
          }
          else {
            echo ("<script>
              alert('connection error');
              window.location.assign('addmem.php');  
          </script>");
          }

}


function changeEmail(){
	global $conn;
	$email=$_POST['email'];

	$sql="UPDATE users SET email='".$email."'  WHERE id='".$_SESSION["id"]."'";
	 if(mysqli_query($conn,$sql)){
          echo ("<script>
              alert('updated successfully');
              window.location.assign('changeemail.php');  
          </script>");
	 }
	 else{
	 	 echo ("<script>
              alert('error');
              window.location.assign('changeemail.php');  
          </script>");
	 }
}

function changePassword(){
  global $conn;
  $oldpass=$_POST['oldpass'];
  $newpass=$_POST['newpass'];
  $conpass=$_POST['conpass'];

  $sql="SELECT * FROM users WHERE password='$oldpass' and id='".$_SESSION["id"]."'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $rowcount=mysqli_num_rows($result);
  if($rowcount>0){
    if($newpass==$conpass){
    	$sql="UPDATE users SET password='".$newpass."'  WHERE id='".$_SESSION["id"]."'";
    	 if(mysqli_query($conn,$sql)){
        echo ("<script>
              alert('updated successfully');
              window.location.assign('changepass.php');  
          </script>");
    	 }
    	 else{      
    	 	echo ("<script>
              alert('connection error');
              window.location.assign('changepass.php');  
          </script>");
    	 }
      }
      else{

        echo ("<script>
              alert('password doent match');
              window.location.assign('changepass.php');  
          </script>");
      }
 
    }
    else{
      
     echo ("<script>
              alert('password doent exists');
              window.location.assign('changepass.php');  
          </script>");
    }
}

function uploadFiles(){
	  global $conn;
	  $file=$_FILES['file'];
      $fileName=$_FILES['file']['name'];
      $fileTmpName=$_FILES['file']['tmp_name'];
      $fileSize=$_FILES['file']['size'];
      $fileError=$_FILES['file']['error'];
      $fileType=$_FILES['file']['type'];

      $fileExt=explode('.',$fileName);
      $fileActualExt=strtolower(end($fileExt));
 //echo "<pre>"; print_r($_FILES); exit;
      $allowed=array('pdf','ppt','word','excel','zip','png','jpg','gif');
      if (in_array($fileActualExt,$allowed)) {
          if ($fileError === 0) {
             if ($fileSize <10485760){
                $fileNameNew = rand(100,10000).".".$fileName;
                $fileDestination = 'uploads/'.$fileNameNew;
               if(move_uploaded_file($fileTmpName,$fileDestination)){
                  $sql="INSERT INTO uploads VALUES('','$fileNameNew','$fileType','$fileSize')";
                  if(mysqli_query($conn,$sql)){
               echo ("<script>
              alert('uploaded successfully');
              window.location.assign('notice.php');  
          </script>");
                } else{
                 echo ("<script>
              alert('connection error');
              window.location.assign('notice.php');  
          </script>");
                }
             }
             else{
              echo ("<script>
              alert('error');
              window.location.assign('notice.php');  
          </script>");
             }
             }
             else{
               echo ("<script>
              alert('file size too big');
              window.location.assign('notice.php');  
          </script>");
             }
          }else{
            echo ("<script>
              alert('uploading error');
              window.location.assign('notice.php');  
          </script>");
          }
       }
       else{
         echo ("<script>
              alert('file cannot eccepted');
              window.location.assign('notice.php');  
          </script>");
       }
}


function uploadMembers(){
	  global $conn;
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


function changePicture(){
	    global $conn;
	    $file=$_FILES['file'];
      $fileName=$_FILES['file']['name'];
      $fileTmpName=$_FILES['file']['tmp_name'];
      $fileSize=$_FILES['file']['size'];
      $fileError=$_FILES['file']['error'];
      $fileType=$_FILES['file']['type'];

      $fileExt=explode('.',$fileName);
      $fileActualExt=strtolower(end($fileExt));
 //echo "<pre>"; print_r($_FILES); exit;
      $allowed=array( 'bmp','tiff','png','jpg','gif');
      if (in_array($fileActualExt,$allowed)) {
          if ($fileError === 0) {
             if ($fileSize <102400){
                $fileNameNew = rand(100,10000).".".$fileName;
                $fileDestination = 'uploadedpics/'.$fileNameNew;
               if(move_uploaded_file($fileTmpName,$fileDestination)){
                  $sql="UPDATE users SET image='$fileDestination' WHERE id='".$_SESSION["id"]."' ";
                  if(mysqli_query($conn,$sql)){
               echo ("<script>
              alert('uploaded successfully');
              window.location.assign('changepic.php');  
          </script>");
                } else{
                 echo ("<script>
              alert('connection error');
              window.location.assign('changepic.php');  
          </script>");
                }
             }
             else{
              echo ("<script>
              alert('error');
              window.location.assign('changepic.php');  
          </script>");
             }
             }
             else{
               echo ("<script>
              alert('file size too big');
              window.location.assign('changepic.php');  
          </script>");
             }
          }else{
            echo ("<script>
              alert('uploading error');
              window.location.assign('changepic.php');  
          </script>");
          }
       }
       else{
         echo ("<script>
              alert('file cannot eccepted');
              window.location.assign('changepic.php');  
          </script>");
       }
}

function editProfile(){
	global $conn;
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

function exportMembersData(){
     global $conn;
     $sql="SELECT *
     FROM members as t";
     $result=mysqli_query($conn,$sql);
     $rowcount=mysqli_num_rows($result);
     if ($rowcount>0) {
       $fn = "csv_".uniqid().".csv";
       $file = fopen($fn,"w");
       while($row=mysqli_fetch_assoc($result)){
         // print "<pre>";
         // print_r($row);
         // print "</pre>";
      if(fputcsv($file,$row)){?>
        <table class="table table-dark">
  <tbody>
    <tr>
    
      <td><?php echo $row['blockname']; ?></td>
      <td><?php echo $row['unitno']; ?></td>
      <td><?php echo $row['memname']; ?></td>
      <td><?php echo $row['mememail']; ?></td>
      <td><?php echo $row['memphone']; ?></td>
      <td><?php echo $row['relation']; ?></td>
      <td><?php echo $row['residing']; ?></td>
      <td><?php echo $row['emergeno']; ?></td>
      <td><?php echo $row['alterno1']; ?></td>
      <td><?php echo $row['alterno2']; ?></td>
      <td><?php echo $row['mailadd']; ?></td>
      <td><?php echo $row['permaadd']; ?></td>
      <td><?php echo $row['addinfo']; ?></td>
    </tr>
  </tbody>
</table>

 <?php
}       
}
}
}
?>