<?php include('log.php'); ?>
<?php
if(isset($_COOKIE['profile_id'])){
  $user=$_COOKIE['profile_id'];
  if($user=="0"){
  
  }
  else{
     header("Location:http://localhost/swasthya/index.php");
  }
}
if (!isset($_COOKIE['profile_id'])) { 
    setcookie('profile_id', "0", time() + (86400 * 30), '/');
     echo "<script>windows.alert('by using our site, you agree to our T&C')</script>";
    } 
?>
<!DOCTYPE html>
<html>
<head>
   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-171665566-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-171665566-1');
</script>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>login</title>
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
      if (isset($_COOKIE['profile_id'])) {
         # code...
      echo "<li class='nav-item'>";
      echo  "<a class='nav-link' href='signIn.php'>Signup</a>";
      echo "</li>";
    }
      ?>
      <?php
      if(isset($_COOKIE['profile_id'])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='profiles.php'>Profile</a>";
      echo "</li>";
    }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="aboutUs.php">About us</a>
      </li>
    </ul>
  </div>
</nav>
<div style="padding: 30px;">
<form method="POST">
email<input type="text" name="email">
<br>
<br>
password
<input type="password" name="password">
<?php 
if(!isset($_COOKIE['token'])){
$val= bin2hex(random_bytes(32));
setcookie($cookie_name,$val, time() + (86400 * 30), "/");
$token=$_COOKIE['token'];
}
$token=$_COOKIE['token'];
echo "<input type='hidden' name='token' value='".$token."'>";
?>
<br>
<br>
<button name="submit">submit</button>
</form>
</div>
<?php
$_POST['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
 if (!empty($_POST['token'])) {
    if (hash_equals($_COOKIE['token'], $_POST['token'])) {

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  if(login($email,$_POST['password'])){
	     header("Location:http://localhost/swasthya/index.php");
     }
   }
 }
}
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>