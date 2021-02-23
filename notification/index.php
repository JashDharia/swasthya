<?php  
session_start(); 
include('notification.php');
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
   <style> 

    @media only screen and (max-width: 400px;){
      body{
        background-color: #e6f9ff;
      }
    }
      #map { 
        width: 100%; 
        height: 400px; 
        background-color: grey; 
      } 
      .book{
        cursor: pointer;
      }
      .review{
        cursor: pointer;
      }
      .div-table {
  display: table;         
  width: auto;         
  background-color: #eee;         
  border: 1px solid #666666;         
  border-spacing: 5px; /* cellspacing:poor IE support for  this */
}
button{
   background-color: #0099ff;
   color: white;
}
.div-table-row {
  display: table-row;
  width: auto;
  clear: both;
}
.div-table-col {
  padding-left: 20px;
  float: left; /* fix for  buggy browsers */
  display: table-column;         
  width: 200px;         
}
.table, .th, .td {
  border: 1px solid black;
  max-width: 600px;
}
@media(max-width: 570px;){
  .table{
    min-width: 300px;
  }
  .table tr td{
    font: 10px;
  }
}
    </style> 
      <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
  <title>profile</title>
</head>
<body>
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
        <a class="nav-link" href="https://www.swaasthya.co/index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.swaasthya.co/search/index.php">Search</a>
      </li>
      <?php
       if(isset($_SESSION["profile_id"])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='https://www.swaasthya.co/edit/editDetails.php'>edit Details</a>";
      echo "</li>";
    }
        if(!isset($_SESSION["profile_id"])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='https://www.swaasthya.co/signup/index.php'>Sign up/login</a>";
      echo "</li>";
    }
        if(isset($_SESSION["profile_id"])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='https://www.swaasthya.co/profile/profile.php'>Profile</a>";
      echo "</li>";
    }
    /*if(isset($_SESSION["profile_id"])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/uploads/index.php'>Uploads</a>";
      echo "</li>";
    }*/
      ?>
      <li class="nav-item">
        <a class="nav-link" href="https://www.swaasthya.co/aboutUs.php">About us</a>
      </li>
    </ul>
  </div>
</nav>
<br>
<div style="padding: 5px;" class="table-responsive">
  <h4>Notifications</h4>
  <table style="width: 100%;" class="table">
    <?php
    $res=getNotification();
    while($row=mysqli_fetch_array($res)){
        ?>
        <tr>
        <div>
        <?php 
            echo "<td><div>".$row['notif_name']."</div></td>";   
            echo "<td><div>".$row['notif_date']."</div></td>";  
            echo "<td><div>".$row['notif_time']."</div></td>";
        ?>
        </div>
        </tr>
        <?php
    }
    ?>
    <tr>
      <th>
        Thank you for joining Swaasthya!
      </th>
      <th>
        date
      </th>
      <th>
        time
      </th>
    </tr>
        <tr>
      <th>
        End of notifications
      </th>
      <th>
      </th>
      <th>
      </th>
    </tr>
  </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
</body>
</html>