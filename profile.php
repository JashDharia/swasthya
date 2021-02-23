<?php include('userData.php'); 
session_start();
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
      .book{
        cursor: pointer;
      }
      .review{
        cursor: pointer;
      }
    </style> 
	    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title>profile</title>
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
      if(isset($_SESSION["profile_id"])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/signup/'>Sign up</a>";
      echo "</li>";
    }

      if(isset($_SESSION["profile_id"])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/login.php'>Login</a>";
      echo "</li>";
    }
      if(isset($_SESSION["profile_id"])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/edit/editDetails.php'>edit Details</a>";
      echo "</li>";
    }
?>
      <?php
      if(isset($_SESSION['profile_id'])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/profile.php'>Profile</a>";
      echo "</li>";
    }
     if(isset($_SESSION['profile_id'])){    
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/uploads/index.php'>Uploads</a>";
      echo "</li>";
    }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/swasthya/aboutUs.php">About us</a>
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
    if(isset($_SESSION['user_id'])||isset($_SESSION['profile_id'])){
        $user=$_SESSION['profile_id'];
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
  if (isset($_SESSION['profile_id'])) {
    session_unset();
    session_destroy();
} else {
    return false;
}
}
?>
<div>
<?php 
if(isset($_SESSION['profile_id'])){
  $user_id=$_SESSION['profile_id'];
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
        echo "<img src='http://localhost/swasthya/dp/def.jpg' class='img-fluid'></img>";
      }
      else{
        echo "<img src='http://localhost/swasthya/dp/".$row['dp_url']."' class='img-fluid'></img>";
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
      echo "</div>";
      echo "</div>";
		}
  }
?>
<br>
<br>
  <div style="padding: 10px;">
    <?php
    $res=getClinics($_COOKIE['profile_id']);
    if($res!=NULL){
    if(mysqli_num_rows($res)>0){
     while ($row = mysqli_fetch_array($res)) { 
  ?>
  <div>
  <?php echo $row['clinic_name'];  ?>
  </div>
  <table width="100%">
    <tr>
      <td>
        <div>
        address:<?php echo $row['address'] ?>
          <br>
        charges:<?php echo $row['charges'];  ?>
        </div>
      </td>
      <td>
        from:<?php echo $row['time_start'];  ?>
      </td>
      <td>
        days:<?php echo $row['days'];  ?>
      </td>
    </tr>
  </table>
<?php
      } 
    }
  }
?>
</div>

<br>
  <div style="padding: 10px; width: 100%;">
  <?php 
  if(isset($_SESSION['profile_id'])&&!isset($_GET['id'])){
  ?>
 <div style='background-color: #99ccff;'> To add a new location:</div>
  <br>
  <form method="POST">
  <table style="width: 100%;">
     <tr>
      <td>
        name of hospital/clinic
      </td>
      <td>
        <input type="text" name="name" required="TRUE">
      </td>
    </tr>
    <tr>
      <td>
        address of hospital/clinic
      </td>
      <td>
        <input type="text" name="address" required="TRUE">
      </td>
    </tr>
    <tr>
      <td>
        days of the week
      </td>
      <td>
      <select name="days" id="days">
        <option value="Weekdays">Weekdays</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="thursday">Thursday</option>
        <option value="friday">Friday</option>
        <option value="saturday">Saturday</option>
        <option value="sunday">Sunday</option>
      </select>
      </td>
    </tr>
    <tr>
      <td>
        start time
      </td>
      <td>
        <input type="time" name="start_time" required="true">
      </td>
    </tr>
    <tr>
      <td>
        end time
      </td>
      <td>
        <input type="time" name="end_time" required="true">
      </td>
    </tr>
    <tr>
      <td>
        consulting charges
      </td>
      <td>
        <input type="text" name="charges" required="TRUE">
      </td>
    </tr>
  </table>
</div>
<div style="padding-left: 45px; padding-bottom: 15px; ">
    <button name="submit">submit</button>
</div>
</form>
</div>
<?php 
}
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $address=$_POST['address'];
  $days=$_POST['days'];
  $start=$_POST['start_time'];
  $end=$_POST['end_time'];
  $charges=$_POST['charges'];
  register($name,$address,$days,$start,$end,$charges);
}
?>
<div style="text-align: left;color: white; background-color:#001a33;">
    <div style="text-align: center;">
    <b>swasthya</b>
  </div>
    <br>
  <div style="margin-right: 10px;">
      <table>
        <tr>
          <td>
            <a class="nav-link" style="display: block; color: white;" href="http://localhost/swasthya/aboutUs.php">About us</a>
          </td>
          <td>
            <a class="nav-link" style="display: block; color: white;" href="http://localhost/aboutUs.php">Doctors</a>
          </td>
          <td>
            <a class="nav-link" style="display: block; color: white;" href="http://localhost/swasthya/aboutUs.php">Hospitals</a>
          </td>
          <td>
            <a class="nav-link" style="display: block; color: white;" href="http://localhost/swasthya/aboutUs.php">Speciality</a>
          </td>
          <td>
            <a class="nav-link" style="display: block; color: white;" href="http://localhost/swasthya/aboutUs.php">clinics</a>
          </td>
        </tr>
      </table>
  </div>
    <br>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>