<!doctype html>
<?php

//prevents user access if already logged in
include('signup.php');

?>
<html lang="en">
  <head>
    <style type="text/css">
      table tr td{
        padding: 5px;
      }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Sign up</title>
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
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/swasthya/index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/swasthya/search/index.php">Search</a>
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

      if(isset($_SESSION['profile_id'])){
      $user=$_COOKIE['profile_id'];
      if($user!="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/profile/profiles.php'>Profile</a>";
      echo "</li>";
    }
    }
      ?>
    </ul>
  </div>
</nav>
<div style="padding: 10px;">
  This website, Swaasthya, has been built by Jash Dharia and Jaden Furtado. This website has not been released to the general public as of yet. This document is terms and conditions of use of this site. “Swaasthya” and “Swasthya” refers to the website and the parent company “Swaasthya”. 
  <br>
If you, the user, do not accept our terms and conditions, you are requested to stop using the website at once.
<br>
For doctors:
<br>
1)The only users who are allowed to create profiles on this website are those who are registered medical doctors and surgeons. 
<br>
1.1 The term “doctors”, refers to medical and surgical practicians with a valid licence and qualifications. 
<br>
1.2 In case of use of false qualification and details being submitted on signup, Swaasthya retains the power to suspend the doctor’s profile on the website and pursue legal action if required. 
<br>
1.3 It is understood that the user using this site has read the privacy policy and terms of use and is ready to abide by them. 
<br>
1.4 We will be updating the terms and conditions as well as our privacy policy on a regular basis. We will send a notification to the users on the website as well as on their email id as mail. It is up to the user to read and check the terms and conditions on a regular basis.
<br>
1.4.a) We refers to the start-up/company Swaasthya.
“General Public” refers to any user who comes across our website over the web inadvertently while conducting a web search on google, or any other web browser or by entering our link in the address bar of a web browser.
<br> 
For users:
<br>
As this site is not open to the public yet, we request that user not use our site. 
<br>
Swaasthya will not be held responsible for any damage caused to the user from using our site.



</div>
    <!-- footer starts here-->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>