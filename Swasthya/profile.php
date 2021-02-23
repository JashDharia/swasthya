<?php include('userData.php'); ?>
<?php
if (!isset($_COOKIE['profile_id'])) { 
    setcookie('profile_id', "0", time() + (86400 * 30), '/');
     echo "<script>windows.alert('by using our site, you agree to our T&C')</script>";
    } 
if(isset($_GET['profile'])&&isset($_GET['id'])){
  setcookie("user_id",$_GET['id'],time() + (86400 * 30), "/");          }
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
      #map { 
        width: 100%; 
        height: 400px; 
        background-color: grey; 
      } 
    </style> 
	    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<title>profile</title>
</head>
<body style="background-color: #e6f2ff">
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
       $user= $_COOKIE['profile_id'];
      if($user=="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='signIn.php'>Sign up</a>";
      echo "</li>";
    }
?>
        <?php
       $user= $_COOKIE['profile_id'];
      if($user=="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='login.php'>login</a>";
      echo "</li>";
    }
?>
      <?php
      if(isset($_COOKIE['profile_id'])){
      $user=$_COOKIE['profile_id'];
      if(isset($_COOKIE['user_id'])){
      $user_id=$_COOKIE['user_id'];
      if($user==$user_id){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='profiles.php'>Profile</a>";
      echo "</li>";
    }
    }
    }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="aboutUs.php">About us</a>
      </li>
    </ul>
  </div>
</nav>
<br>
<div style="float: right; padding-right: 20px;">
<?php
echo "<br>";
echo "<br>";
echo "<br>";
    if(isset($_COOKIE['user_id'])||isset($_COOKIE['profile_id'])){
        $user=$_COOKIE['profile_id'];
        if($user!="0"){
        echo "logged in";
        echo "<div style='background-color:#3399ff'>";
        echo "<form method='POST'>";
        echo "<button name='logout'>Log out</button>";
        echo "</form>";
        echo "</div>";
      }
    }
     
?>
</div>
<?php
 if(isset($_POST['logout'])) { 
  if (isset($_COOKIE['profile_id'])) {
    unset($_COOKIE['profile_id']); 
    setcookie('profile_id', "0", -1, '/'); 
    header("Location:http://localhost/swasthya/index.php");
} else {
    return false;
}
}
?>
<div>
<?php 
if(isset($_COOKIE['user_id'])){
  $user_id=$_COOKIE['user_id'];
}
    $posts=getUserData($user_id);
		while ($row = mysqli_fetch_array($posts)){
      echo "<div style='padding:20px; background-color:'>";
      echo "<div style='background-color: #99ccff;'>";
			echo "Doctor Name: ".$row['fullName'];
      $name=$row['fullName'];
      echo "</div>";
			echo "<br>";
      echo "<div style='height:200px; width:200px'>";
      if ($row['dp_url']===NULL) {
        echo "<img src='dp/def.jpg' class='img-fluid'></img>";
      }
      else{
        echo "<img src='dp/".$row['dp_url']."' class='img-fluid'></img>";
      }
      echo "</div>";
      echo "</div>";
      echo "<br>";
      echo "<div style='padding:30px; width:350px;'>";
      echo "<div style='background-color:  #00264d; color:white;'>contact details:</div>";
      echo "<div style='background-color: #66b3ff'>";
			echo "email:".$row['email'];
			echo "<br>";
      echo "phone no".$row['phone_no'];
      echo "<br>";
			echo "practicing location:".$row['loaction'];
      echo "<br>";
      echo "hospital/clinic name: to add to db";
      echo "<br>";
      echo "</div>";
      echo "</div>";
		}
?>
<br>
<br>
<div style="padding: 10px;">
<table>
  <tr>
    <td>
<div style="background-color: #e6ffff">
  location: Dummy Loc name 1
  <br>
  charges
  <br>
  speciality,time,days avail.
</div>
</td>
<td>
  <button>book</button>
</td>
<td>
  <button>view reviews</button>
</td>
</tr>
<tr>
  <td>
<div>
  location: Dummy Loc name 2
  <br>
  charges
  <br>
  speciality,time, days, avail
</div>
</td>
<td>
  <button>book</button>
</td>
<td>
  <button>view reviews</button>
</td>
</tr>
</table>
</div>
<div style="padding-left: 20px;">
  Note: map does not work as of now!!!!!!!
</div>
<br>
<br>
<br>
<div style="background-color:#99ccff; padding: 20px;">
 <b><h5><?php echo $name; ?>'s hospital/clinic's location on map:</h5></b>
</div>
<br>
<div>
  <div id="map" style="margin-left:20px; padding-left:50px; height: 450px; width: 450px;">
  <script> 
      function initMap() { 
        var test= {lat: -25.363, lng: 131.044}; 
        var map = new google.maps.Map(document.getElementById('map'), { 
          zoom: 4, 
          center: test 
        }); 
        var marker = new google.maps.Marker({ 
          position: test, 
          map: map 
        }); 
      } 
    </script> 
    <script async defer 
    src= 
"https://maps.googleapis.com/maps/api/js?key=AIzaSyA11-4soILEfUU7c8VHt-g1a15lBMOG5qo&callback=initMap"> 
    </script>  
  </div>
</div>
<br>
</div>
</div>
<br>
<br>
<br>
<div style="padding: 10px;">
  To add a new location:
  <br>
  <table style="width: 100%;">
    <tr>
      <td>
        location of hospital/clinic
      </td>
      <td>
        <input type="text" name="name">
      </td>
    </tr>
    <tr>
      <td>
        days of the week
      </td>
      <td>
        <input type="text" name="days">
      </td>
    </tr>
    <tr>
      <td>
        timing
      </td>
      <td>
        <input type="text" name="time">
      </td>
    </tr>
    <tr>
      <td>
        consulting charges
      </td>
      <td>
        <input type="text" name="charges">
      </td>
    </tr>
    <tr>
      <td>
        image of the hospital/clinic
      </td>
      <td>
        <input type="file" name="image">
      </td>
    </tr>
  </table>
</div>
<div style="padding-left: 45px; padding-bottom: 15px; ">
    <button>submit</button>
</div>
</div>
<div style="text-align: left;color: white; background-color:#001a33;">
    <div style="text-align: center;">
    <b>swasthya</b>
  </div>
    <br>
  <div style="margin-right: 10px;">
      <table>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>