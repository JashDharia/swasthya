<?php
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