<?php 
if(!isset($_COOKIE['user_id'])){
  setcookie("user_id","0", time() + (86400 * 30), "/");
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
<title>about us</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
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
      $user_id=$_COOKIE['user_id'];
      if($user_id=="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='signIn.php'>Signup</a>";
      echo "</li>";
    }
  }
      if(isset($_COOKIE['user_id'])){
      $user=$_COOKIE['user_id'];
      if($user!="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='profiles.php'>Profile</a>";
      echo "</li>";
    }
    }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="aboutUs.php">About us</a>
      </li>
    </ul>
  </div>
</nav>
<div style="padding:20px;">
  Developed and managed by  Anushree Dutt, Jash Dharia, Yohan Gupta and Jaden Furtado as part of our college projet.
  <br>
  <br>
  <b>site Version 1.0.7</b>
  <br><br>
   current status:basic site ready... Starting testing with select users only...
  <br>
  <br>
  start date:4th Sept 2020
  <br>
  last updated:18th Oct 2020, by Jaden Furtado
  <br>
  <br>
  For those who took time to visit, thanks a lot, from me and the team. Please dm/call me if there are any difficulties/bugs still there. Suggestions too are welcome.
  <br>
  <br>
  The UI sucks, we agree, we are working to improve it.
  <br>
  <br>
  <b>note:</b> as this site does not have an ssl certificate, your browser will give you a warning saying "<b>the site is not secure</b>", however, <b>I (Jaden) have built the site upto https standards<b>, so for the most part, no need to worry. The adds on the search page too are not loading, I am working on it.
  <br>
  Feel free to setup an account. Even then, please do not enter the true password of your email while signing up...
</div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>