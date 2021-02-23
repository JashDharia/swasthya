<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>index</title>
  </head>
  <body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Swasthya</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <?php
      if(isset($_COOKIE['profile_id'])){
        $user_id=$_COOKIE['profile_id'];
        if($user_id=="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='signIn.php'>Sign up</a>";
      echo "</li>";
    }
    }
?>
        <?php
      if(isset($_COOKIE['profile_id'])){
         $user_id=$_COOKIE['profile_id'];
        if($user_id=="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='login.php'>login</a>";
      echo "</li>";
    }
    }
?>
      <?php
      if(isset($_COOKIE['profile_id'])){
         $user_id=$_COOKIE['profile_id'];
        if($user_id!="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='profiles.php'>Profile</a>";
      echo "</li>";
    }
    }
      ?>
      <?php
      if(isset($_COOKIE['profile_id'])){
         $user_id=$_COOKIE['profile_id'];
        if($user_id!="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='upload.php'>Profile</a>";
      echo "</li>";
    }
    }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="aboutUs.php">About us</a>
      </li>
      <li class="nav-item">
        <form method="POST">
        <a class="nav-link" type="button" href="booking/booking.php" name="booking">booking</a>
        </form>
      </li>
      <?php
      if (isset($_POST['booking'])) {
        header("Location:http://localhost/swasthya/booking/booking.php");
      }
      ?>
    </ul>
  </div>
</nav>
<?php
   if(isset($_FILES['image'])){
      //establishing a connection with server
      $servername="localhost";
      $username="root";
      $password="";
      $dbname="screenplay";
      $conn= new mysqli($servername,$username,$password,$dbname);
      if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
      }
      //processing the inserted file
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      //updating the posts table
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/qualification/".$file_name);
      }else{
         print_r($errors);
      }
    }
      // sql to create table
/*$sql = "CREATE TABLE tempname (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
*/
?>
      <div style="padding: 30px;">
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>