<?php
 if (!isset($_COOKIE['profile_id'])) { 
    setcookie('profile_id', "0", time() + (86400 * 30), '/');
    echo "<script>windows.alert('by using our site, you agree to our T&C')</script>";
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&family=Roboto:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="home_page_style.css">
  <title>Swasthya</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
        <a class="nav-link" href="http://localhost/swasthya/search/index.php">Search</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="http://localhost/swasthya/doctors/">Doctors</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/swasthya/fitness/">fitness</a>
      </li>
      <?php
       $user=$_COOKIE['profile_id'];
      if($user!="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/edit/editDetails.php'>edit Details</a>";
      echo "</li>";
    }
?>
      <?php
      if(isset($_COOKIE['profile_id'])){
        $user_id=$_COOKIE['profile_id'];
        if($user_id=="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/signup/index.php'>Sign up/login</a>";
      echo "</li>";
    }
    }
?>

      <?php
      if(isset($_COOKIE['profile_id'])){
         $user_id=$_COOKIE['profile_id'];
        if($user_id!="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/profile.php'>Profile</a>";
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
<div>
  <div class="welcome_text">
    <h2>Hey there!</h2>
      <br>
      <br>
      <h3>Looks like you entered a wrong url!</h3>
  </div>  
</div>
<div class="img-fluid hero_image">
  <img style="max-height: 400px;max-width: 300px;"src="images/heroDoctor.jpg" alt="doctor">
</div>
<div style=" 
  margin-top: 500px; width: 100%; text-align: center;color: white; background-color:#001a33;">
    <div style="text-align: center;">
      <b>swasthya</b>
    </div>
      <br>
    <div style="margin-right: 10px;">
      <table style="width: 100%;">
        <tr>
          <td>
            <a class="nav-link" style="display: block; color: white;" href="aboutUs.php">About us</a>
          </td>
          <td>
            <a class="nav-link" style="display: block; color: white;" href="aboutUs.php">Doctors</a>
          </td>
          <td>
            <a class="nav-link" style="display: block; color: white;" href="aboutUs.php">Hospitals</a>
          </td>
          <td>
            <a class="nav-link" style="display: block; color: white;" href="aboutUs.php">Speciality</a>
          </td>
          <td>
            <a class="nav-link" style="display: block; color: white;" href="aboutUs.php">clinics</a>
          </td>
        </tr>
      </table>
    </div>
  <br>
</div>   
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>