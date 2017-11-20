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
      $allowed=array( 'bmp','tiff','png','jpg','gif');
      if (in_array($fileActualExt,$allowed)) {
          if ($fileError === 0) {
             if ($fileSize <10485760){
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
 ?>
