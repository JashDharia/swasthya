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


///////////////
function getPost($file_name){
  $file_parts=pathinfo($file_name);

  switch ($file_parts['extension']) {
    case "jpg":
      return 1;
      break;
    case "jpeg":
    return 1;
    case "png":
    return 1;
    case "mp4":
    return 2;
      break;
  }
}
//////////////////////////////////


function getDoctor($search){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swasthya";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM doctor WHERE fullName LIKE ? OR speciality LIKE ? OR loaction LIKE ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sss", $param_term1,$param_term2,$param_term3);
        
        // Set parameters
        $param_term1 = $search . '%';
        $param_term2 = $search . '%';
        $param_term3 = $search . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
               return $result;
                }
            } else{
                echo "<p>No matches found</p>";
            }
            mysqli_stmt_close($stmt);

        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        mysqli_close($conn);
}



//////////////////////////////////
function getSpeciality($search){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn = new mysqli($servername, $username, $password, $dbname);
  $sql="SELECT * FROM doctor WHERE speciality='$search'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    return $row;
  }
} else {
  echo "0 results";
}
  $conn->close();
}
/////////////////////////////////
function getUserData($id)
{
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn = new mysqli($servername, $username, $password, $dbname);
  $sql = "SELECT * FROM doctor WHERE profile_url='$id';"; 
  if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) {
    return $res;  
    mysqli_free_res($res); 
    } 
    else { 
        echo "profile not found!"; 
    }
} 
else { 
    echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($link); 
} 

$conn->close();
}//end of function
//////////////////////////////////////
function getLikes($file_url)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM file WHERE file_url = $file_url AND reaction='like'";
  $rs = $conn->query($sql);
  if(!$rs){
    return 0;
  }
  else{
  $result = mysqli_fetch_array($rs);
  return $result;
}
}

// Get total number of dislikes for a particular post
function getDislikes($file_url)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM file WHERE file_url = $file_url AND reaction='dislike'";
  $rs = mysqli_query($conn, $sql);
  if (!$rs) {
    return 0;
}
else{
  $result = mysqli_fetch_array($rs);
  return $result;
}
}
///////////////////////////////////
function putComment($file_url){
   global $conn;
   global $username; 
    $comment=test_input($_POST['comment']);
    $sql="INSERT INTO file (username,reaction,comments,visibility,file_url) VALUES($username,,$comment,'visible',$file_url)";
    if($conn->query($sql)===true){
      echo "success";
    }
  }
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;  
}
// Get total number of likes and dislikes for a particular post
function getRating($file_url)
{
  global $conn;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM file WHERE file_url = $file_url AND reaction='like'";
  $dislikes_query = "SELECT COUNT(*) FROM file WHERE file_url = $file_url AND reaction='dislike'";
  $likes_rs = mysqli_query($conn, $likes_query);
  $dislikes_rs = mysqli_query($conn, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs, MYSQLI_NUM);
  $dislikes = mysqli_fetch_array($dislikes_rs, MYSQLI_NUM);
  $rating = [
  	'likes' => $likes[0],
  	'dislikes' => $dislikes[0]
  ];
  return json_encode($rating);
}

// Check if user already likes post or not
function userLiked($file_url)
{
  global $conn;
  global $user_id;
  global $username;
  $sql = "SELECT * FROM file WHERE username=$username AND file_url=$file_url AND reaction='like'";///////////////
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) >0) {///////////////
  	return true;
  }else{
  	return false;
  }
 }
 ///////////////////////////////////////////
 function userDisliked($file_url)
{
  global $conn;
  global $username;
  $sql = "SELECT * FROM file WHERE username=$username AND file_url=$file_url AND reaction='dislike'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {/////////////
  	return true;
  }else{
  	return false;
  }
}
/////////////////////////////////////

function getDp($userId)
{
  global $conn;
  $sql="SELECT dp_url FROM doctor WHERE fullName=$userId";
  $result=mysqli_query($conn,$sql);
  if($result){
    return $result;
  }
}
/////////////////////////
if(isset($_POST['enter'])){
  $search=$_POST['search'];
 $sql = "SELECT username FROM users WHERE username=$search";
$results = mysqli_query($conn, $sql);
// return them as an associative array called $users
$users = mysqli_fetch_all($results, MYSQLI_ASSOC);
}
///////////////////////////



//////////////////////////
function login($email,$passwords){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swasthya";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM doctor WHERE email='$email'"; 
if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_array($res);
    $checked = password_verify($passwords, $row['password']);
      if($checked){
        $cookie_name = "profile_id";
        $cookie_value = $row['profile_url'];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
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
    echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($link); 
} 
}

function updateDetail($email,$phone_no,$fullName,$speciality,$charges,$id){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swasthya";
$conn = new mysqli($servername, $username, $password, $dbname);
echo $charges;
if($email!=""){
  $sql="UPDATE doctor SET email= '$email' WHERE profile_url='$id';";
  mysqli_query($conn, $sql);
}
if($phone_no!=""){
  $sql="UPDATE doctor SET phone_no= '$phone_no' WHERE profile_url='$id';";
  mysqli_query($conn, $sql);
}
if($fullName!=""){
  $sql="UPDATE doctor SET fullName= '$fullName' WHERE profile_url='$id';";
  mysqli_query($conn, $sql);
}
if($speciality!=""){
  $sql="UPDATE doctor SET speciality= '$speciality' WHERE profile_url='$id';";
  mysqli_query($conn, $sql);
}
if($charges!=""){
  $sql="UPDATE doctor SET consultingCharges= '$charges' WHERE profile_url='$id';";
  mysqli_query($conn, $sql);
}
echo "success";
header("Location:http://localhost/swasthya");
}


