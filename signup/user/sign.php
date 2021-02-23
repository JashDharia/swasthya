<?php

function sign($fullName,$speciality,$location,$email,$phone_no,$passwords,$t_and_c,$qual1,$qual2,$qual3,$medicalCouncil,$languages,$yearReg,$regNo){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn = new  mysqli("localhost", "u996110698_jaden", "E@y91>h2i#Z", "u996110698_swasthya");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
 //to clean data !!!!!!!!!!!!!!!!!!!!
  $flag=1;
  $charges=0;
  ///////////////////////////////////////////////////
  $passwords = password_hash($passwords, PASSWORD_DEFAULT, ['cost' => 12]);
  $random=getName(rand(10,50));
///////////////////////////////////////////////////////////////

$fullName=test_input($fullName);
$speciality=test_input($speciality);
$location=test_input($location);
$email=test_input($email);
$phone_no=test_input($phone_no);
$passwords=test_input($passwords);
$t_and_c=test_input($t_and_c);
$qual1=test_input($qual1);
$qual2=test_input($qual2);
$qual3=test_input($qual3);
$medicalCouncil=test_input($medicalCouncil);
$languages=test_input($languages);
$yearReg=test_input($yearReg);
$regNo=test_input($regNo);
/////////////////////////////////////////////////////////////
$s="SELECT * FROM doctor WHERE email='$email';";
$res=mysqli_query($conn,$s);

if(mysqli_num_rows($res)>0){
	return false;
}
//////////////////////////////////////////////////////////////
  	//$qual1,$qual2,$qual3,$medicalCouncil,$languages,$yearRed,$regNo
	 $sql="INSERT INTO doctor(fullName, speciality, consultingCharges, loaction, email, phone_no, password, t_and_c , profile_url,qualification1,qualification2,qualification3,medicalCouncil,languages,yearReg,regNo)VALUES('$fullName','$speciality','$charges','$location','$email','$phone_no','$passwords','$t_and_c','$random','$qual1','$qual2','$qual3','$medicalCouncil','$languages','$yearReg','$regNo');";  
    if( mysqli_query($conn, $sql)){
      //echo "<script>alert('success!');</script>";
  return true;
    }
    else{
      //echo "<script>alert('email already in use!');</script>";
      return false;
    }
  $conn->close();
}
/*
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
}*/

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}