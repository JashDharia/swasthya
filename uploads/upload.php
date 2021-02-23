<?php
if(!empty($_FILES)) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$sourcePath = $_FILES['userImage']['tmp_name'];
$targetPath = "uploads/qualification/".$_FILES['userImage']['name'];
$servername="localhost";
$username="root";
$password="";
$dbname="swasthya";
$conn= new mysqli($servername,$username,$password,$dbname);
      if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
      }
      
      $description=$_POST['description'];
      $description=mysqli_real_escape_string($conn,$description);
      $description=filter_var($description, FILTER_SANITIZE_STRING);
      
      //processing the inserted file
      $errors= array();
      $file_name = $_FILES['userImage']['name'];
      $file_tmp =$_FILES['userImage']['tmp_name'];
      $file_type=$_FILES['userImage']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['userImage']['name'])));
      
      $extensions= array("jpeg","jpg","png","mp4","mp3");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      //updating the posts table
     
    
if(move_uploaded_file($sourcePath,$targetPath)) {
	$sql="UPDATE doctor SET dp_url='$file_name' WHERE profile_url='".$_SESSION['profile_id']."'";
	mysqli_query($conn,$sql);
      }
   }
}
?>