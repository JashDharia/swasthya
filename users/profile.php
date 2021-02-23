<?php include('userData.php'); 
session_start(); 
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
    body{
      background-image: url(https://image.freepik.com/free-vector/blue-medical-healthcare-background-with-cardiograph_1017-14999.jpg);
      background-repeat: no-repeat;
      background-size: cover;
    }
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
  width: 100%;
}
@media(min-width: 570px;){
  .table{
    max-width: 500px;
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
      echo "<a class='nav-link' href='http://localhost/swasthya/edit/editDetails.php'>edit Details</a>";
      echo "</li>";
    }
        if(!isset($_SESSION["profile_id"])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/signup/index.php'>Sign up/login</a>";
      echo "</li>";
    }
        if(isset($_SESSION["profile_id"])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/profile.php'>Profile</a>";
      echo "</li>";
    }
    if(isset($_SESSION["profile_id"])){
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
    header("Location:http://localhost/swasthya/index.php");
} else {
    return false;
}
}
?>
<div>
<?php 
if(isset($_SESSION['profile_id'])){
  $user_id=$_SESSION['profile_id'];
}
    $posts=getUserData($user_id);
    while ($row = mysqli_fetch_array($posts)){
      echo "<div style='padding:20px; background-color:'>";
      echo "<div style='background-color: #99ccff;'>";
    if($_SESSION['user_type']=="doctor"){
        echo "Doctor Name: ".$row['fullName'];
    }
    else if($_SESSION['user_type']=="user"){
      echo "User Name:".$row['fullName'];
    }
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
   /*   echo "<div style='padding:30px; width:350px;'>";
      echo "<div style='background-color:  #00264d; color:white;'>contact details:</div>";
      echo "<div style='background-color: #66b3ff'>";
      echo "email:".$row['email'];
      echo "<br>";
      echo "phone no".$row['phone_no'];
      echo "<br>";
      echo "practicing location:".$row['loaction'];
      echo "</div>";
      echo "</div>";*/
    }
?>
<br>
<br>
<div style="padding: 10px;">
  search visits<input type="text" name="search"><button>search</button>
</div>
<div style="padding: 5px;">
  <h3>Upcoming visits</h3>
  <div>
    <table style="width: 100%">
      <th>
        Doctor name:
      </th>
      <th>
        date:
      </th>
      <th>
        appointment time:
      </th>
      <tr>
        <td style="background-color:  #00bfff">
          Jaden Furtado
        </td>
        <td style="background-color: #80dfff">
          19th dec 2020
        </td>
        <td style="background-color: white">
          11:58
        </td>
        <td>
          <button>cancel</button>
        </td>
      </tr>
    </table>
  </div>
</div>
<div style="padding: 5px;">
  <h3>Past visits</h3>
  <div>
    <table style="width: 100%">
      <th>
        Doctor name:
      </th>
      <th>
        date:
      </th>
      <th>
        time:
      </th>
      <th>
        diagnosis
      </th>
      <tr>
        <td style="background-color:  #00bfff">
          Jaden Furtado
        </td>
        <td style="background-color: #80dfff">
          5th dec 2020
        </td>
        <td style="background-color: #ccf2ff">
          11:59
        </td>
        <td style="background-color: white">
          none!
        </td>
      </tr>
    </table>
  </div>
</div>
<br>
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
  <br>
<!-- <div style="padding: 10px;">
  
  <table style="width: 100%" class="table">
  <tr class="tr">
    <th class="th">
      name:
    </th>
    <th class="th">
      address:
    </th>
    <th class="th">
      timings:
    </th>
    <th class="th">
      days:
    </th>
  </tr>
  <?php
    $res=getClinics($_SESSION["profile_id"]);
    if(mysqli_num_rows($res)>0){
     while ($row = mysqli_fetch_array($res)) { 
  ?>
    <tr class="tr">
      <td style="background-color: #80dfff" class="td">
        <?php echo $row['clinic_name'];  ?>
      </td>
      <td style="background-color: #ccf2ff" class="td">
        <?php echo $row['address'] ?>
      </td>
      <td style="background-color: white;" class="td">
      <div class="div-table-row">
        from: <?php echo $row['start_time'] ?>
      </div>
      <div class="div-table-row">
        to: <?php echo $row['end_time'] ?>  
      </td>
      <td style="background-color:  #00bfff" class="td">
        <?php echo $row['days'];  ?>
      </td>
    </tr>
  <?php
        } 
    }
?>
  </table>
</div>
<br>
</div>
</div>
<br>
<br>
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
<br>
<?php
if(isset($_SESSION['profile_id'])) {
  ?>

  <div style="padding: 5px;">
    <button class="patients"><h3>My patients</h3></button>
  </div> 
  <script type="text/javascript">
    $(document).ready(function(){
      $(".patients").on("click",function(){
        window.location.href="http://localhost/swasthya/patients/"
      });
    });
  </script>
  <div><h4>Today's patients</h4></div>
  <div>
    <table style="width: 100%;">
      <th>
        date
      </th>
      <th>
        time
      </th>
      <th>
        patient name
      </th>
      <th>
        diagonsis
      </th>
      <tr>
        <td>
          18th Dec 2020
        </td>
        <td>
          16:15
        </td>
        <td>
          Jaden Furtado
        </td>
        <td>
          -
        </td>
      </tr>
    </table>
  </div>
  <?php
}
?> -->
<
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
</body>
</html>