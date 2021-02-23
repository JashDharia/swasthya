<?php
session_start();
if(!empty($_FILES)) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$sourcePath = $_FILES['userImage']['tmp_name'];
$targetPath = "dp/".$_FILES['userImage']['name'];
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
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      //updating the posts table
     
    $sql="SELECT doctor_id FROM doctor WHERE profile_url='".$_SESSION['profile_id']."';";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($res)){
      $id=$row['doctor_id'];
    }
$s="SELECT doctor_id FROM posts WHERE doctor_id='$id'";
$res=mysqli_query($conn,$s);
$num=mysqli_num_rows($res);
if($num<1){
  
  if(move_uploaded_file($sourcePath,$targetPath)) {
	$sql="INSERT INTO posts(doctor_id,profile_url,url) VALUES('$id','".$_SESSION['profile_id']."','$file_name')";
	if(mysqli_query($conn,$sql)){
      echo "success!";
   }
   else {
      echo $conn->error;
      # code...
   }
?>
<img src="<?php echo $targetPath; ?>" width="100px" height="100px" />
<?php
      }
    }
    else{
        if(move_uploaded_file($sourcePath,$targetPath)) {
  $sql="UPDATE posts SET url='$file_name' WHERE profile_url='".$_SESSION['profile_id']."';";
  if(mysqli_query($conn,$sql)){
      echo "success!";
   }
   else {
      echo $conn->error;
      # code...
   }
?>
<img src="<?php echo $targetPath; ?>" width="100px" height="100px" />
<?php
      } 
    }
   }//checks if dp already exist or not
}
?>