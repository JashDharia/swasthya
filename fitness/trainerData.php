<?php

function getUserData($id)
{
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn = new mysqli($servername, $username, $password, $dbname);
  $sql = "SELECT * FROM trainers WHERE profile_url='$id';"; 
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

///////////////////////////////////////////////////////////////////////////

function getClinics($id)
{
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn = new mysqli($servername, $username, $password, $dbname);
  $sql = "SELECT * FROM timeTable WHERE profile_url='$id';"; 
  if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) {
    return $res;  
    mysqli_free_result($res); 
    } 
    else { 
        echo "<h5>no locations listed yet</h5>"; 
    }
} 
else { 
    echo "ERROR: Could not able to execute $sql. ".mysqli_error($link); 
} 
$conn->close();
}

// //////////////////////////////////////////////////////////////////////
function register($name,$address,$days,$time,$charges)
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  $name = filter_var($name, FILTER_SANITIZE_STRING);
  $address = filter_var($address, FILTER_SANITIZE_STRING);
  $days = filter_var($days, FILTER_SANITIZE_STRING);
  $time = filter_var($time, FILTER_SANITIZE_STRING);
  $charges = filter_var($charges, FILTER_SANITIZE_STRING);
  
  $name = mysqli_real_escape_string($conn,$name);
  $address = mysqli_real_escape_string($conn,$address);
  $days = mysqli_real_escape_string($conn,$days);
  $time = mysqli_real_escape_string($conn,$time);
  $charges = mysqli_real_escape_string($conn,$charges);

  $sql="SELECT user_id FROM trainers WHERE profile_url='".$_COOKIE['profile_id']."';";
   if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) {
      while ($row = mysqli_fetch_array($res)) { 
            $id=$row['user_id'];
        } 
    mysqli_free_result($res); 
    } 
    else { 
        echo "profile not found!"; 
    }
  }
  $sql="INSERT INTO timeTable(doctor_id,clinic_name,address,time_start,charges,days,profile_url) VALUES('$id','$name','$address','$time','$charges',$days','".$_COOKIE['profile_id']."')";
  mysqli_query($conn,$sql);
  $conn->close();
}//end of function