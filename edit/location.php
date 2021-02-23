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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swasthya";
$conn = new mysqli($servername, $username, $password, $dbname);

$action=$_POST['action'];
$id=$_POST['post'];
$name=$_POST['name'];
$address=$_POST['address'];
$time=$_POST['time'];
$days=$_POST['days'];
$charges=$_POST['charges'];

//////////////////////////////filter out sql injection and xss/////////
$name=filter_var($name, FILTER_SANITIZE_STRING);
$address=filter_var($address, FILTER_SANITIZE_STRING);
$time=filter_var($time, FILTER_SANITIZE_STRING);
$days=filter_var($days, FILTER_SANITIZE_STRING);
$charges=filter_var($charges, FILTER_SANITIZE_STRING);

$name=mysqli_real_escape_string($conn,$name);
$address=mysqli_real_escape_string($conn,$address);
$time=mysqli_real_escape_string($conn,$time);
$days=mysqli_real_escape_string($conn,$days);
$charges=mysqli_real_escape_string($conn,$charges);

/////////////////////////////////////////////////////////////////////////

if($action=='save'){
if($name!=""){
  $sql="UPDATE timeTable SET clinic_name='$name' WHERE id='$id';";
  mysqli_query($conn, $sql);
}
if($address!=""){
  $sql="UPDATE timeTable SET address='$address' WHERE id='$id';";
  mysqli_query($conn, $sql);
}
if($time!=""){
  $sql="UPDATE timeTable SET time_start='$time' WHERE id='$id';";
  mysqli_query($conn, $sql);
}
if($days!=""){
  $sql="UPDATE timeTable SET days='$days' WHERE id='$id';";
  mysqli_query($conn, $sql);
}
if($charges!=""){
  $sql="UPDATE timeTable SET charges='$charges' WHERE id='$id';";
  mysqli_query($conn, $sql);
}
}
if($action=='delete'){
	$sql="DELETE FROM timeTable WHERE id='$id';";
  mysqli_query($conn, $sql);
}

$conn->close();

return "hi";