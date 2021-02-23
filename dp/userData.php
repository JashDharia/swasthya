<?php
function getDoctor($search){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "screenplay1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM users WHERE fullName LIKE ? OR speciality LIKE ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ss", $param_term1,$param_term2);
        
        // Set parameters
        $param_term1 = $search . '%';
        $param_term2 = $search . '%';
        
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
  $dbname = "screenplay1";
  $conn = new mysqli($servername, $username, $password, $dbname);
  $sql = "SELECT * FROM users WHERE profile_url='$id';"; 
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