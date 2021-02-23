<?php
include('signup.php');
include('update.php');
include('userData.php');
//session_start();
if(!isset($_SESSION['profile_id'])){
    header("Location:http://localhost/swasthya/index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
  </script>
	<title>Edit Details</title>
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
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/swasthya/search/index.php">Search</a>
      </li>
      <?php
      if(isset($_SESSION['profile_id'])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/profile/profile.php'>Profile</a>";
      echo "</li>";
    }
    
      ?>
    </ul>
  </div>
</nav>
<?php
if(isset($_GET['id'])&&isset($_GET['user'])&&isset($_SESSION['profile_id'])){
  if(($_SESSION['profile_id']==$_GET['user'])&&($_SESSION['profile_id']==url($_GET['id']))){
     $results= getClinicsData($_GET['id']);
  if($results!=NULL){
  while($row = mysqli_fetch_assoc($results)){
    echo "<div style='padding:20px;'>";
    echo "<form method='POST'>";
  echo "<table>";
  echo "<tr>";
  echo "<td>";
  echo "clinic name"; 
  echo "</td>";
  echo "<td>";
  echo "<input type='text' id='".$row['id']."_name' name='clinic_name' class='".$row['id']."_name' placeholder='".$row['clinic_name']."''>";
  echo "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>";
  echo "address";
  echo "</td>";
  echo "<td>";
  echo "<input type='text' id='".$row['id']."_address' name='address' class='".$row['id']."_address' placeholder='".$row['address']."'>";
  echo "</td>";
  echo "</tr>";
  //echo "start time <input type='text' class='".$row['id']."_address' id='".$row['id']."_time' name='time_start' placeholder='".$row['time_start']."'>";
  //echo "<br>";
  echo "<tr>";
  echo "<td>";
  echo "days";
  echo "</td>";
  echo "<td>";
  ?>
  <select name='days' id='days'>
  <option value='Weekdays' <?php if($row['days']=='Weekdays'){echo "selected";}?>>Weekdays</option>
  <option value='Monday' <?php if($row['days']=='Monday'){echo "selected";}?> >Monday</option>
  <option value='Tuesday' <?php if($row['days']=='Tuesday'){echo "selected";}?> >Tuesday</option>
  <option value='Wednesday' <?php if($row['days']=='Wednesday'){echo "selected";}?> >Wednesday</option>
  <option value='Thursday' <?php if($row['days']=='Thursday'){echo "selected";}?>>Thursday</option>
  <option value='Friday' <?php if($row['days']=='Friday'){echo "selected";}?> >Friday</option>
  <option value='Saturday' <?php if($row['days']=='Saturday'){echo "selected";}?> >Saturday</option>
  <option value='Sunday' <?php if($row['days']=='Sunday'){echo "selected";}?> >Sunday</option>
  </select>
  <?php
  echo "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>";
  echo "charges";
  echo "</td>";
    echo "<td><input type='text' class='".$row['id']."_address' name='days' id='".$row['id']."_charges' placeholder='".$row['days']."'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>start time</td>";
    echo "<td><input name='start_time' type='time' value='".$row['start_time']."';></td>";
     echo "</tr>";
     echo "<tr>";
    echo "<td>end time</td>";
    echo "<td><input name='end_time' type='time' value='".$row['end_time']."'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td></td>";
  echo "<td><button name='send' class='post_".$row['id']."_save' value='submit'>save</button></td>";
  echo "</tr>";
  echo "</table>";
  echo "<button name='delete'>delete</button>";
  echo "</form>";
  echo "</div>";
    }
  }
}
  else if(!isset($_SESSION['profile_id'])){
    echo "<div style='padding:10px;'><h3>Please Login!</h3></div>";
  }
}
?>
<?php
  if(isset($_POST['send'])){
    updateTimeTable($_POST['clinic_name'],$_POST['address'],$_POST['days'],$_POST['start_time'],$_POST['end_time'],$_GET['id']);
   /* echo "<script type='text/javascript'>";
    echo  "$(document).ready(function(){";
    echo    "location.reload();";
    echo  "});";
    echo "</script>";
    */
  }
?>
<div style="position: fixed;
  left: 0;
  bottom: 0;
  width: 100%; text-align: left;color: white; background-color:#001a33;">
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