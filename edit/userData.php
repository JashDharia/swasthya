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
session_start();
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


function register($name,$address,$days,$time,$charges)
{
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  $address = filter_var($address, FILTER_SANITIZE_STRING);
  $days = filter_var($days, FILTER_SANITIZE_STRING);
  $time = filter_var($time, FILTER_SANITIZE_STRING);
  $charges = filter_var($charges, FILTER_SANITIZE_STRING);
  

  $address=mysqli_real_escape_string($conn,$address);
  $days=mysqli_real_escape_string($conn,$days);
  $time=mysqli_real_escape_string($conn,$time);
  $charges=mysqli_real_escape_string($conn,$charges);

  $sql="SELECT doctor_id FROM doctor WHERE profile_url='".$_COOKIE['profile_id']."';";
   if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) {
      while ($row = mysqli_fetch_array($res)) { 
            $doctor=$row['doctor_id'];
        } 
    mysqli_free_result($res); 
    } 
    else { 
        echo "profile not found!"; 
    }
  }
  $sql="INSERT INTO timeTable(doctor_id,clinic_name,address,time_start,days) VALUES('$doctor','$name','$address','$time','$days')";
  mysqli_query($conn,$sql);
  $conn->close();
}//end of function

function getClinics()
{
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn = new mysqli($servername, $username, $password, $dbname);
    if($_SESSION['user_type']=='doctor'){
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
///////////////////////////////////////////////////////////////////
function url($id){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn = new mysqli($servername, $username, $password, $dbname);
  $id=mysqli_real_escape_string($conn,$id);
  $id= filter_var($id, FILTER_SANITIZE_STRING);
  $sql = "SELECT profile_url FROM timeTable WHERE id='$id';"; 
  if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_array($res)) { 
            $d=$row['profile_url'];
            return $d;
        }   
    mysqli_free_result($res); 
    } 
    else { 
        echo "<div style='padding:10px;'><h5>Wrong URL entered! Please try again...</h5></div>"; 
    }
} 
else { 
    echo "ERROR: Could not able to execute $sql. ".mysqli_error($link); 
} 
$conn->close();
}

function getClinicsData($id){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn = new mysqli($servername, $username, $password, $dbname);
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