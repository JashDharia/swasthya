<?php
session_start(); 
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
<title>About Us</title>
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
        <a class="nav-link" href="http://localhost/swasthya/index.php">home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/swasthya/search/index.php">Search</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/swasthya/doctors/index.php">Doctor</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/swasthya/fitness/index.php">Fitness</a>
      </li>
  <?php
    if(isset($_SESSION['profile_id'])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/signup/'>Signup</a>";
      echo "</li>";
    }

      if(isset($_SESSION['profile_id'])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/profile/profile.php'>Profile</a>";
      echo "</li>";
    }
      if(isset($_SESSION['profile_id'])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/edit/editDetails.php'>edit Details</a>";
      echo "</li>";
    }
?>
      <li class="nav-item">
        <a class="nav-link" href="aboutUs.php">About us</a>
      </li>
    </ul>
  </div>
</nav>
<div style="padding:20px;align-content: center;">
  <br>
  <b>FAQ's</b>
  <br>
  <br>
  <b>What is swasthya?</b>
  <br>
Swasthya, is a website for doctors, fitness trainers, hospitals, clinics, yoga trainers, gyms and anyone in the health and fitness industry to list themselves for free on our site and provide their details such as contact, email-d, charges, etc.
<br>
<br>
<b>How is this different from website already there?</b>
<br>
Well, there aren’t any websites like ours (or at least, we haven’t come across one like ours till now). There are sites similar to ours, in some functionality, but none do everything that we do.
<br>
<br>
<b>
Will I be charged to sign up and register myself?
</b>
<br>
No, we do not charge to sign up. As of now, Swasthya is completely free and we hope to keep it that way.
<br>
<br>
<b>
Why should I register my practice on Swasthya?
</b>
<br>
With the corona virus pandemic, there has been an increase in the health consciousness of the general public.  This has also affected the way in which medicine is practiced as we move towards digitalization. <b>Listing your practice on swasthya improves your reach, helping new patients/clients find you, thus growing your practice.</b>
<br>
<br>  
<b>
Do we have booking?
</b>
<br>
As of now, no. Swasthya does not offer booking. However, we do plan to release a booking feature in the near future.
<br>
<br>
 We have many more features coming out, in time, that are unique to us. 
 <br>
 <br>
 Thank you for visting!
 <br>
 Team Swasthya.
 <br>
 <br>
<b>NOTE:</b>
<br>
all images used belong to the respective owners. Swaasthya does not intend any copyright infringement. Write to us at furtadojaden@gmail.com
<br>
<br>
</div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>