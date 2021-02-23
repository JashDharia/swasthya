<?php
//9:30-9:41
session_start();
///////////////////////////////////////////
    /* at the top */
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

        /* choose the appropriate page to redirect users */
        die( header( 'location: https://www.swaasthya.co/error.php' ) );

    }
//to take care of hacking!!!!!!!!!!!!!
//signup($_POST["fullName"],$_POST["speciality"],$_POST["location"],$_POST["email"],$_POST["phone_no"],$_POST["password"],$_POST["tAndC"],$_POST['qual1'],$_POST['qual2'],$_POST['registration_no'],$_POST['medicalCouncil'],$_POST['year'],$_POST['Languages'])
function signup($fullName,$speciality,$location,$email,$phone_no,$passwords,$t_and_c){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn = new mysqli("localhost", "root", "", "swasthya");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
 //to clean data !!!!!!!!!!!!!!!!!!!!
$flag=1;
  $charges=0;
/////////////////////to check if user exist

////////////////////////////////////////////
  if (!filter_var($phone_no, FILTER_VALIDATE_INT) === false) {

  } 
  else {
    echo("phone number is not valid");
    $flag=0;
  }
////////////////////////////////////////////
  $fullName=filter_var($fullName, FILTER_SANITIZE_STRING);
  $speciality=filter_var($speciality, FILTER_SANITIZE_STRING);
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate e-mail
  if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

  }
  else {
    echo("$email is not a valid email address");
    $flag=0;
  }
  /////////////////////////////////////////////////////////
  //to check if duplicate exist
  $sql="SELECT COUNT(email) FROM doctor WHERE email='$email'";
  $res=mysqli_query($conn,$sql);
  if(mysqli_num_rows($res) > 0){
    $flag=0;
    return false;
  }
  ///////////////////////////////////////////////////
  $passwords = password_hash($passwords, PASSWORD_DEFAULT, ['cost' => 12]);
  $random=getName(rand(10,50));
  if($flag==1){
   $sql="INSERT INTO doctor(fullName, speciality, consultingCharges, loaction, email, phone_no, password, t_and_c , profile_url)VALUES('$fullName','$speciality','$charges','$location','$email','$phone_no','$passwords','$t_and_c','$random');";  
    if( mysqli_query($conn, $sql)){
      return true;
    }
    return false;
  }
  $conn->close();
}
///////////////////////////////////////////////////////////////////////
// $flag1=user_signup($_POST["fullName"],$_POST["location"],$_POST["email"],$_POST["phone_no"],$_POST["password"],$_POST["tAndC"]); 
function user_signup($fullName,$location,$email,$phone_no,$passwords,$t_and_c){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn = new mysqli("localhost", "root", "", "swasthya");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $flag=1;
  if(!filter_var($phone_no, FILTER_VALIDATE_INT) === false) {

  } 
  else {
    echo("phone number is not valid");
    $flag=0;
  }
  $fullName = filter_var($fullName, FILTER_SANITIZE_STRING);
  $location = filter_var($location, FILTER_SANITIZE_STRING);
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  // Validate e-mail
  if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

  } 
  else{
    echo("$email is not a valid email address");
    $flag=0;
  }
  $passwords = password_hash($passwords, PASSWORD_DEFAULT, ['cost' => 12]);
  $random=getName(rand(10,50));
  if($flag==1){
    $sql="INSERT INTO users(fullName, loaction, email, phone_no, password, t_and_c,profile_url)VALUES('$fullName','$location','$email','$phone_no','$passwords','$t_and_c','$random');";  
    if( mysqli_query($conn, $sql)){
      return true;
    }
    return false;
  }
  $conn->close();
}
////////////////////////////////////////////////////////////////////////////
function trainer_signup($fullName,$location,$email,$phone_no,$passwords,$t_and_c){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
    $conn = new mysqli("localhost", "root", "", "swasthya");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $flag=1;
  if (!filter_var($phone_no, FILTER_VALIDATE_INT) === false) {

  }
  else{
    echo("phone number is not valid");
    $flag=0;
  }
  $fullName = filter_var($fullName, FILTER_SANITIZE_STRING);
  $location = filter_var($location, FILTER_SANITIZE_STRING);
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  // Validate e-mail
  if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

  } 
  else{
    echo("$email is not a valid email address");
    $flag=0;
  }
  $passwords = password_hash($passwords, PASSWORD_DEFAULT, ['cost' => 12]);
  $random=getName(rand(10,50));
  if($flag==1){
    $sql="INSERT INTO trainers(fullName, loaction, email, phone_no, password, t_and_c,profile_url)VALUES('$fullName','$location','$email','$phone_no','$passwords','$t_and_c','$random');";  
    if( mysqli_query($conn, $sql)){
      return true;
    }
    return false;
  }
  $conn->close();
}
///////////////////////////////////////////////////////////////////////
function gym_signup($fullName,$location,$email,$phone_no,$passwords,$t_and_c){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
    $conn = new mysqli("localhost", "root", "", "swasthya");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $flag=1;
  if (!filter_var($phone_no, FILTER_VALIDATE_INT) === false) {

  } 
  else{
    echo("phone number is not valid");
    $flag=0;
  }
  $fullName = filter_var($fullName, FILTER_SANITIZE_STRING);
  $location = filter_var($location, FILTER_SANITIZE_STRING);
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate e-mail
  if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

  } 
  else {
    echo("$email is not a valid email address");  
    $flag=0;
  }
  $passwords = password_hash($passwords, PASSWORD_DEFAULT, ['cost' => 12]);
  $random=getName(rand(10,50));
  if($flag==1){
    $sql="INSERT INTO gyms(fullName, loaction, email, phone_no, password, t_and_c, profile_url)VALUES('$fullName','$location','$email','$phone_no','$passwords','$t_and_c','$random');";  
    if( mysqli_query($conn, $sql)){
      return true;
    }
    return false;
  }
  $conn->close();
}
///////////////////////////////////////////////////////////////////////
//clinic_signup($_POST["fullName"],$_POST["location"],$_POST["email"],$_POST["phone_no"],$_POST["password"],$_POST["tAndC"]);
function clinic_signup($fullName,$location,$email,$phone_no,$passwords,$t_and_c){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swasthya";
  $conn = new mysqli("localhost", "root", "", "swasthya");if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$flag=1;
if (!filter_var($phone_no, FILTER_VALIDATE_INT) === false) {

} else {
  echo("phone number is not valid");
  $flag=0;
}
$fullName=filter_var($fullName, FILTER_SANITIZE_STRING);
$location=filter_var($location, FILTER_SANITIZE_STRING);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

} else {
  echo("$email is not a valid email address");
  $flag=0;
}
$passwords = password_hash($passwords, PASSWORD_DEFAULT, ['cost' => 12]);
$random=getName(rand(10,50));
if($flag==1){
  $sql="INSERT INTO hospital(clinic_name, loaction, email, mobile_no, password, t_and_c, profile_url)VALUES('$fullName','$location','$email','$phone_no','$passwords','$t_and_c','$random');";  
  if( mysqli_query($conn, $sql)){
    return true;
  }
  return false;
}
$conn->close();
}
///////////////////////////////////////////////////////////////////////////////
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
/////////////////////////////////////////////////////////////////////////
function getClinics()
{
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
   $conn = new mysqli("localhost", "root", "", "swasthya");
    $sql="SELECT doctor_id FROM doctor WHERE profile_url='".$_COOKIE['profile_id']."';";
   if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) {
      while ($row = mysqli_fetch_array($res)) { 
            $doctor=$row['doctor_id'];
        } 
    mysqli_free_result($res); 
    } 
    else{ 
        echo ""; 
    }
  }
  $sql = "SELECT * FROM timeTable WHERE doctor_id='$doctor';"; 
  if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) {
    return $res;  
    mysqli_free_result($res); 
    } 
    else { 
        echo "<h5>no practices listed yet</h5>"; 
    }
} 
else { 
    echo "ERROR: Could not able to execute $sql. ".mysqli_error($link); 
} 
$conn->close();
}//end of function
/////////////////////////////////////////////////////////////////////////////////
function login($email,$passwords,$type){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swasthya";
  $conn = new mysqli("localhost", "root", "", "swasthya");
if($type=='doc'){
$sql = "SELECT * FROM doctor WHERE email='$email'"; 
if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_array($res);
    $checked = password_verify($passwords, $row['password']);
      if($checked){
        $_SESSION["profile_id"]=$row['profile_url'];
        $_SESSION["user_type"]="doctor";
        return true;
      }
      else{
        echo "wrong password";
      }
        } 
    else { 
        echo "No account exist";
        return false; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. ".mysqli_error($link); 
  } 
}
else if($type=='trainer'){
  $sql = "SELECT * FROM trainers WHERE email='$email'"; 
  if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_array($res);
    $checked = password_verify($passwords, $row['PASSWORD']);
    if($checked){
       $_SESSION["profile_id"]=$row['profile_url'];
        $_SESSION["user_type"]="trainer";
      return true;
    }
    else{
      echo "wrong password";
    }
  } 
  else { 
    echo "No account exist";
    return false; 
    } 
  } 
  else { 
    echo "ERROR: Could not able to execute $sql. ".mysqli_error($link); 
  } 
 }
 else if($type=='gym'){
  $sql = "SELECT * FROM gyms WHERE email='$email'"; 
  if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_array($res);
    $checked = password_verify($passwords, $row['PASSWORD']);
    if($checked){
      $_SESSION["profile_id"]=$row['profile_url'];
        $_SESSION["user_type"]="gyms";
        return true;
    }
    else{
      echo "wrong password";
    }
  } 
  else { 
    echo "No account exist";
    return false; 
    } 
  } 
  else { 
    echo "ERROR: Could not able to execute $sql. ".mysqli_error($link); 
  } 
 }
 else if($type=='hospital'){
  $sql = "SELECT * FROM hospital WHERE email='$email'"; 
  if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_array($res);
    $checked = password_verify($passwords, $row['PASSWORD']);
    if($checked){
       $_SESSION["profile_id"]=$row['profile_url'];
        $_SESSION["user_type"]="hospital";
        return true;
    }
    else{
      echo "wrong password";
    }
  } 
  else { 
    echo "No account exist";
    return false; 
    } 
  } 
  else { 
    echo "ERROR: Could not able to execute $sql. ".mysqli_error($link); 
  } 
 }
 // mysqli("localhost", "id15184919_jaden", "AIepj&M6vO|d<r5)", "id15184919_swasthya");
 else if($type=='user'){
  $sql = "SELECT * FROM users WHERE email='$email'"; 
  if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_array($res);
    $checked = password_verify($passwords, $row['password']);
    if($checked){
       $_SESSION["profile_id"]=$row['profile_url'];
        $_SESSION["user_type"]="user";
        return true;
    }
    else{
      echo "wrong password";
    }
  } 
  else { 
    echo "No account exist";
    return false; 
    } 
  } 
  else{ 
        echo "ERROR: Could not able to execute $sql. ".mysqli_error($link); 
      } 
   }
 $conn->close();
}
/*/////////////////////////////////////////////////////////////////////////////
function sign($fullName,$speciality,$location,$email,$phone_no,$passwords,$t_and_c,$qual1,$qual2,$qual3,$medicalCouncil,$languages,$yearReg,$regNo){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn = new mysqli("localhost","u996110698_jaden","E@y91>h2i#Z","u996110698_swasthya");
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
$sql="SELECT email FROM doctor WHERE email='$email';";
$res=mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0){
  return false;
}
//////////////////////////////////////////////////////////////
    //$qual1,$qual2,$qual3,$medicalCouncil,$languages,$yearRed,$regNo
   $sql="INSERT INTO doctor(fullName, speciality, consultingCharges, loaction, email, phone_no, password, t_and_c , profile_url,qualification1,qualification2,qualification3,medicalCouncil,languages,yearReg,regNo)VALUES('$fullName','$speciality','$charges','$location','$email','$phone_no','$passwords','$t_and_c','$random','$qual1','$qual2','$qual3','$medicalCouncil','$languages','$yearReg','$regNo');";  
    if( mysqli_query($conn, $sql)){
        if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $extensions= array("jpeg","jpg","png");
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"https://swaasthya.co/images/".$file_name);
         $sql="INSERT INTO doctor(dp_url) VALUES('$file_name') WHERE profile_url='$random';";
      }else{
         print_r($errors);
      }
        }
      echo "<script>$(document).ready(function(){alert('success!');window.location.href='https://www.swaasthya.co/index.php';});</script>";
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
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

*/