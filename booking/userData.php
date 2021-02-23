<?php

function getClinicsData($id){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn = new mysqli("localhost", "u996110698_jaden", "E@y91>h2i#Z", "u996110698_swasthya");
    /*if($_SESSION['user_type']=='doctor'){
      {$sql="SELECT doctor_id FROM doctor WHERE profile_url='".$_SESSION['profile_id']."';";}
    }
    else if($_SESSION['user_type']=='user'){

    }
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
  }*/
  $id=mysqli_real_escape_string($conn,$id);
  $id= filter_var($id, FILTER_SANITIZE_STRING);
  $sql = "SELECT * FROM timeTable WHERE id='$id';"; 
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
}

?>