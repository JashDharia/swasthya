<?php 
function login($email,$passwords){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swasthya";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM doctor WHERE email='$email'"; 
if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_array($res);
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
    else { 
        echo "No account exist";
        return false; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. ".mysqli_error($link); 
} 
}