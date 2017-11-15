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
// echo "<pre>"; print_r($_FILES); exit;
      $allowed=array('pdf','ppt','word','excel','zip','png','jpg','gif');
      if (in_array($fileActualExt,$allowed)) {
          if ($fileError === 0) {
             if ($fileSize < 20000) {
                $fileNameNew = rand(100,10000).".".$fileName;
                $fileDestination = 'uploads/'.$fileNameNew;
               if(move_uploaded_file($fileTmpName,$fileDestination)){
                  $sql="INSERT INTO uploads VALUES('','$fileNameNew','$fileType','$fileSize')";
                  if(mysqli_query($conn,$sql)){
                header('location:notice.php');
                } else{
                  header('location:index.php');
                }
             }
             else{
               header('location:notice.php');
             }
             }
             else{
               echo "file size is too big";
             }
          }else{
            echo "uploading error";
          }
       }
       else{
         echo "this file cannot be accepted";
       }
		 }
 ?>
