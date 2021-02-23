<?php
include('userData.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style type="text/css">
      html, body {
      margin: 0;
      padding: 0;
      width: 100%;
}
/*
body {
      font-family: "Helvetica Neue",sans-serif;
      font-weight: lighter;
      background-image: url(https://coolbackgrounds.io/images/backgrounds/index/compute-ea4c57a4.png);
      background-repeat: no-repeat;
      background-size: cover;
}
*/

/*
@media(max-width: 1025px;){
  header{
    width: 100%;
      height: 400px;
      background: url(https://www.missouripartnership.com/wp-content/uploads/2018/01/iStock-695349930.jpg) no-repeat 50% 50%;
      background-size: cover;
  }
}

.content {
      width: 94%;
      margin: 4em auto;
      font-size: 20px;
      line-height: 30px;
      text-align: justify;
}

.logo {
      line-height: 60px;
      position: fixed;
      float: left;
      margin: 16px 46px;
      color: #fff;
      font-weight: bold;
      font-size: 20px;
      letter-spacing: 2px;
}

/*nav {
      position: fixed;
      width: 100%;
      line-height: 60px;
}


nav ul {
      line-height: 30px;
      list-style: none;
      background: rgba(0, 0, 0, 0);
      overflow: hidden;
      color: #fff;
      padding: 0;
      text-align: right;
      margin: 0;
      padding-right: 40px;
      transition: 1s;
}

nav.black ul {
      background: #000;
      color: white;
}

nav ul li {
      display: inline-block;
      padding: 16px 40px;;
}

nav ul li a {

      text-decoration: none;
      color: white;
      font-size: 15px;
}

.menu-icon {
      line-height: 60px;
      width: 100%;
      background: #000;
      text-align: right;
      box-sizing: border-box;
      padding: 15px 24px;
      cursor: pointer;
      color: #fff;
      display: none;
}
*/
table{
    cursor:pointer;
        margin: 0px;
        padding: 0px;
        width: 100%;
        background-color: rgba(0,0,0,0);
        color: black;
      }
footer{
  padding: 30px;
  color: white;
}

.container{
  padding: 5px;
}
ul li{
    padding-top:5px;
}
/*@media(max-width: 786px) {

      .logo {
            position: fixed;
            top: 0;
            margin-top: 16px;
      }

      nav ul {
            max-height: 0px;
            background: #000;
      }

      nav.black ul {
            background: #000;
      }

      .showing {
            max-height: 34em;
      }

    nav ul li {
            box-sizing: border-box;
            width: 100%;
            padding: 24px;
            text-align: center;
      }

      .menu-icon {
            display: block;
      }
 */     
@media(max-width: 786px;){
  .images{
    max-height:90px;
    max-width: 90px;
  }
}
    </style>
   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-171665566-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-171665566-1');
</script>
   
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Home Page</title>
  </head>
  <body class="text-center body">
  
    <div class="wrapper">
         <header>
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Swaasthya</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="doctors/index.php">Doctors</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="fitness/index.php">Fitness</a>
      </li>
      <?php
       if(isset($_SESSION["profile_id"])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='edit/editDetails.php'>edit Details</a>";
      echo "</li>";
    }
        if(!isset($_SESSION["profile_id"])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='signup/index.php'>Sign up/login</a>";
      echo "</li>";
    }
        if(isset($_SESSION["profile_id"])){
          if($_SESSION['user_type']=='doctor'){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='profile/profile.php'>Profile</a>";
      echo "</li>";
    }
    else if($_SESSION['user_type']=='user'){
          echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='users/profile.php'>Profile</a>";
      echo "</li>";
    }
    }
      if(isset($_SESSION["profile_id"])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='notification/'>notifications</a>";
      echo "</li>";
    }
    /*if(isset($_SESSION["profile_id"])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/uploads/index.php'>Uploads</a>";
      echo "</li>";
    }*/
      ?>
      <li class="nav-item">
        <a class="nav-link" href="aboutUs.php">About us</a>
      </li>
    </ul>
  </div>
</nav>
         </header>       
  </div>
  <br>
  <div class="jumbotron jumbotron-fluid" style="background-image:url('https://www.missouripartnership.com/wp-content/uploads/2018/01/iStock-695349930.jpg');background-repeat:no-repeat;background-size:cover;">
  <div class="container">
    <h1 class="display-4" style="color:white;text-shadow: 2px 2px 4px #000000;"><b>Welcome to Swaasthya</b></h1>
    <p class="lead" style="color:white;text-shadow: 2px 2px 4px #000000;"><b>Helping you lead a healthy life!</b></p>
  </div>
</div>
  <!-- <table style="width: 100%; ">
    <tr class="docs">
    <td>
      <h2>Doctors</h2>
      </td>
      <td>
        <div>
        <img src="https://darktangent.000webhostapp.com/images/doc1.jpg" class="img-fluid images">
        </div>
        </td>
        </tr>
        <tr class="about">
      <td>
        <img src="http://darktangent.000webhostapp.com/images/g.jpg" class="img-fluid images">
      </td>
      <td>
      <h2>About Us</h2>
      </td>
    </tr>
  </table> -->
  <script>
      /*$(document).ready(function(){
          $(".docs").on("click",function(){
              window.location.href="http://www.swaasthya.co/doctors/";
          });
           $(".about").on("click",function(){
              window.location.href="http://www.swaasthya.co/aboutUs.php";
          });
      });*/
  </script>
  <div style="padding: 5px;">
  <table style="width: 100%; ">
    <tr class="docs" style="  background-color: #99ddff;">
    <td>
      <h2>Doctors</h2>
      </td>
      <td>
        <img src="https://www.swaasthya.co/images/doc1.jpg" class="img-fluid images">
        </div>
        </td>
        </tr>
        <tr class="fitness">
          <td>
            <img src="http://www.swaasthya.co/images/fitness1.jpg" alt="fitness" class="img-fluid">
          </td>
          <td>
            <h2>Fitness</h2>
          </td>
        </tr>
        <tr class="about" style="  background-color: #99ddff;">
      <td>
        <h2>About Us</h2>
      </td>
      <td>
        <img src="http://www.swaasthya.co/images/g.jpg" class="img-fluid images">
      </td>
    </tr>
  </table>
</div> 
  <script>
      $(document).ready(function(){
          $(".docs").on("click",function(){
              window.location.href="http://www.swaasthya.co/doctors/";
          });
           $(".about").on("click",function(){
              window.location.href="http://www.swaasthya.co/aboutUs.php";
          });
           $(".fitness").on("click",function(){
              window.location.href="http://www.swaasthya.co/fitness/";
           });
      });
  </script>
  <div>
    <footer>
      <h3></h3>
    </footer>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>