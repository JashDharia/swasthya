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
function updateDetail($fullName,$speciality,$location,$phone_no,$qual1,$qual2,$qual3,$medicalCouncil,$Languages,$year_of_registration,$registration_no){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swasthya";
$conn = new mysqli($servername, $username, $password, $dbname);

if($location!="")
{
  $sql = "UPDATE doctor SET loaction= '$location' WHERE profile_url='".$_SESSION['profile_id']."';";
  mysqli_query($conn, $sql);
}
if($qual1!=""){
  $sql = "UPDATE doctor SET qualification1= '$qual1' WHERE profile_url='".$_SESSION['profile_id']."';";
  mysqli_query($conn, $sql);
}
if($qual2){
  $sql = "UPDATE doctor SET qualification2= '$qual2' WHERE profile_url='".$_SESSION['profile_id']."';";
  mysqli_query($conn, $sql);
}
if($qual3){
  $sql = "UPDATE doctor SET qualification3= '$qual3' WHERE profile_url='".$_SESSION['profile_id']."';";
  mysqli_query($conn, $sql);
}
if($medicalCouncil){
  $sql = "UPDATE doctor SET medicalCouncil= '$medicalCouncil' WHERE profile_url='".$_SESSION['profile_id']."';";
  mysqli_query($conn, $sql);
}
if($Languages){
  $sql = "UPDATE doctor SET languages= '$Languages' WHERE profile_url='"
  .$_SESSION['profile_id']."';";
  mysqli_query($conn, $sql);
}
if($year_of_registration){
  $sql = "UPDATE doctor SET yearReg= '$year_of_registration' WHERE profile_url='".$_SESSION['profile_id']."';";
  mysqli_query($conn, $sql);
}
if($registration_no){
  $sql = "UPDATE doctor SET regNo= '$registration_no' WHERE profile_url='".$_SESSION['profile_id']."';";
  mysqli_query($conn, $sql);
}
if($phone_no!=""){
  $sql = "UPDATE doctor SET phone_no= '$phone_no' WHERE profile_url='$id';";
  mysqli_query($conn, $sql);
}
if($fullName!=""){
  $sql = "UPDATE doctor SET fullName= '$fullName' WHERE profile_url='$id';";
  mysqli_query($conn, $sql);
}
if($speciality!=""){
  $sql = "UPDATE doctor SET speciality= '$speciality' WHERE profile_url='$id';";
  mysqli_query($conn, $sql);
}
echo "success";
}

function getUserData($id)
{
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if($_SESSION['user_type']=='doctor'){
    $sql = "SELECT * FROM doctor WHERE profile_url='$id';"; 
  }
  else if($_SESSION['user_type']=='user'){
   $sql = "SELECT * FROM users WHERE profile_url='$id';";  
  }
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

function updateTimeTable($clinic_name,$address,$days,$start_time,$end_time,$id){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swasthya";
$conn = new mysqli($servername, $username, $password, $dbname);
  /*$sql="SELECT doctor_id FROM doctor WHERE profile_url='".$_COOKIE['profile_id']."';";
   if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) {
      while ($row = mysqli_fetch_array($res)) { 
            $id=$row['doctor_id'];
        } 
    mysqli_free_result($res); 
    } 
    else{ 
        echo ""; 
    }
  }
  */
if($clinic_name!=""){
  $sql = "UPDATE timeTable SET clinic_name= '$clinic_name' WHERE id='$id';";
  mysqli_query($conn, $sql);
}
if($address!=""){
  $sql = "UPDATE timeTable SET address= '$address' WHERE id='$id';";
  mysqli_query($conn, $sql);
}
if($start_time!=""){
  $sql = "UPDATE timeTable SET start_time= '$start_time' WHERE id='$id';";
  mysqli_query($conn, $sql);
}
if($end_time!=""){
  $sql = "UPDATE timeTable SET end_time= '$end_time' WHERE id='$id';";
  mysqli_query($conn, $sql);
}

if($days!=""){
  $sql = "UPDATE timeTable SET days= '$days' WHERE id='".$_SESSION['profile_id']."';";
  mysqli_query($conn, $sql);
}

/*
if($phone_no!=""){
  $sql="UPDATE timeTable SET address= '$address' WHERE profile_url='".$_SESSION['[profile_url']."';";
  mysqli_query($conn, $sql);
}

if($fullName!=""){
  $sql="UPDATE timeTable SET time_start= '$time_start' WHERE profile_url='".$_SESSION['profile_url']."';";
  mysqli_query($conn, $sql);
}
if($speciality!=""){
  $sql="UPDATE timeTable SET days= '$days' WHERE profile_url='".$_SESSION['profile_id']."';";
  mysqli_query($conn, $sql);
}

*/
?>
<script type="text/javascript">
$(document).ready(function(){
    location.replace("http://localhost/swasthya/edit/?id=<?php echo $id ?>&user=<?php echo $_SESSION['profile_id']?>");
  });  
</script>
<?php
}

function updateDesc($des){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn= new mysqli($servername,$username,$password,$dbname);
  $des=mysqli_real_escape_string($conn,$des);
  $des = filter_var($des, FILTER_SANITIZE_STRING);
  $sql = "UPDATE doctor SET description='$des' WHERE profile_url='".$_SESSION['profile_id']."';";
  mysqli_query($conn,$sql);
  ?>
<script type="text/javascript">
$(document).ready(function(){
    location.replace("http://localhost/swasthya/edit/?id=<?php echo $id ?>&user=<?php echo $_SESSION['profile_id']?>");
  });  
</script>
<?php
}
