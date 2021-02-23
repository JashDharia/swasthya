
<?php
function login($email,$passwords){
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "swasthya");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
    // Prepare a select statement
    $sql = "SELECT * FROM doctor WHERE email=?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term1);
        
        // Set parameters
        $param_term1 = $email ;
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
 if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
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
        } 
else { 
    echo "No account exist";
    return false; 
  }                
    }
    else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
 
// close connection
mysqli_close($link);
}