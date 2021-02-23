<?php
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

function getClinics($id)
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "swasthya";
  $conn = new mysqli($servername, $username, $password, $dbname);
    $sql="SELECT doctor_id FROM doctor WHERE profile_url='$id';";
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