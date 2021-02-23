<?php include('signup.php');
 ?>
<?php
if(!isset($_COOKIE['profile_id'])){
  setcookie("user_id","0", time() + (86400 * 30), "/");
}
if(isset($_COOKIE['profile_id'])){
  $user_id=$_COOKIE['profile_id'];
  if($user_id!="0"){
    header("Location:http://localhost/swasthya/");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>Sign up</title>
</head>
<body style="background-color:  #ccffe6;">
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
      <li class="nav-item">
        <a class="nav-link" href="index.php">Search</a>
      </li>
      <?php
      if(isset($_COOKIE['user_id'])){
      $user=$_COOKIE['user_id'];
      if($user==0){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='signIn.php'>Sign up</a>";
      echo "</li>";
    }
    }
?>
        <?php
      if(isset($_COOKIE['user_id'])){
      $user=$_COOKIE['user_id'];
      if($user=="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='login.php'>login</a>";
      echo "</li>";
    }
    }
?>
      <?php
      if(isset($_COOKIE['user_id'])){
      $user=$_COOKIE['user_id'];
      if($user!="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='profiles.php'>Profile</a>";
      echo "</li>";
    }
    }
      ?>
    </ul>
  </div>
</nav>
<?php
if(isset($_POST["submit"])&&isset($_POST['tAndC'])){
	$flag1=signup($_POST["fullName"],$_POST["speciality"],$_POST["charges"],$_POST["location"],$_POST["email"],$_POST["phone_no"],$_POST["password"],$_POST["tAndC"]);
if($flag1==true){ 
if(isset($_FILES['dp'])){
      //processing the inserted file
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));  
      $extensions= array("jpeg","jpg","png","mp4","mp3");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      //updating the posts table
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"dp/".$file_name);
         uploadDp($file_name,1);
      }else{
         print_r($errors);
      }
    }
}
if($flag1==true){
  header("Location:http://localhost/swasthya/");
}
}
?>
<div style="align-content: center;">
<form style="padding: 20px;" method="POST">
	email
	<input type="text" name="email">
	<br>
  <br>
   <div style=" background-color: #33ff99;">
	phone no
	<input type="text" name="phone_no">/////please enter 1234567890 as your phone no!!!!!! DO NOT GIVE YOUR TRUE PHONE NO!
  </div>
	<br>
  <br>
	password
	<input type="password" name="password" autocomplete="off">
	<br>
  <br>
	confirm password
	<input type="password" name="confirm" autocomplete="off">
	<br>
  <br>
	Full name
	<input type="text" name="fullName" autocomplete="off">
	<br>
  <br>
	speciality
	<input type="text" name="speciality" autocomplete="off">
	<br>
  <br>
  <div style=" background-color: #33ff99;">
	medical licence
	<input type="file" name="licence"><b>/////please do not upload any file!!!!!!!!</b>
</div>
	<br>
  <br>
	consulting charges
	<input type="text" name="charges" autocomplete="off">
	<br>
  <br>
  <div style=" background-color: #33ff99;">
	profile pic
	<input type="file" name="dp"><b>/////please do not upload any picture! GUI is still to be configured!</b>
  </div> 
	<br>
  <br>
	location
	<input type="text" name="location" autocomplete="off"><b>//location is Mumbai or kalina or parle, as applicable!</b>
	<br>
  <br>
	accept the t&c?
	<input type="checkbox" name="tAndC">
	<br>
	<button name="submit">submit</button>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>