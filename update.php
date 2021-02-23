<?php
  if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

        /* choose the appropriate page to redirect users */
        die( header( 'location: http://localhost/swasthya/error.php' ) );

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

