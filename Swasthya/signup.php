<?php
//9:30-9:41

///////////////////////////////////////////

//to take care of hacking!!!!!!!!!!!!!
function signup($fullName,$speciality,$charges,$location,$email,$phone_no,$passwords,$t_and_c){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swasthya";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//to clean data !!!!!!!!!!!!!!!!!!!!
$flag=1;
////////////////////////////////////////////
if (!filter_var($phone_no, FILTER_VALIDATE_INT) === false) {

} else {
  echo("phone number is not valid");
  $flag=0;
}
////////////////////////////////////////////
$fullName=filter_var($fullName, FILTER_SANITIZE_STRING);
$speciality=filter_var($speciality, FILTER_SANITIZE_STRING);

$email = filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
$result = mysqli_query($conn,"SELECT * FROM doctor WHERE email='$email'");
$num_rows = mysqli_num_rows($result);
if ($num_rows) {
   echo "<script>window.confirm('email already in use');</script>";
}
} else {
  echo("$email is not a valid email address");
  $flag=0;
}
$passwords = password_hash($passwords, PASSWORD_DEFAULT, ['cost' => 12]);
$random=getName(rand(10,50));
if($flag==1){
	$sql="INSERT INTO doctor(fullName, speciality, consultingCharges, loaction, email, phone_no, password, t_and_c , profile_url)VALUES('$fullName','$speciality','$charges','$location','$email','$phone_no','$passwords','$t_and_c','$random');";  
  if( mysqli_query($conn, $sql)){
    return true;
  }
  return false;
}
}
///////////////////////////////////////////////////////////////////////
function getName($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 
///////////////////////////////////////////////
function uploadDp($file_name,$doctor_id){
  $sql="UPDATE doctor SET dp_url WHERE doctor_id = '$doctor_id'";
  global $conn;
  if($conn->query($sql)===TRUE){
    echo "success";
  }
}
