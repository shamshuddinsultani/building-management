<?php session_start(); ?>
<?php if(empty($_SESSION) || $_SESSION["is_loggedin"] == false){
header('location:index.php');
} ?>
<?php include 'db.php';
	if(isset($_POST['submit']))
	{
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
 ?>
