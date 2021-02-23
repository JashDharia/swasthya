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


  <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<meta charset=utf-8 />
<title>JS Bin</title>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
</style>
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
<div style="padding: 20px;">
<?php 
$results= getUserData($_SESSION['profile_id']);
$row = mysqli_fetch_assoc($results);
?>
<form method="POST">

<?php
echo "<div style='background-color:#ccffff'>";
echo "<div style='padding: 10px;'>";
echo "<b>user details</b>";
echo "</div>";
?>
            <table class="table">
            <tr>
              <td>
            phone no
          </td>
          <td>
            <input type="text" name="phone_no" placeholder="<?php echo $row['phone_no'] ?>">
            </td>
            </tr>
            <tr>
              <td>
            Full name
          </td>
          <td>
            <input type="text" name="fullName" autocomplete="off" placeholder="<?php echo $row['fullName'] ?>" >
            </td>
            </tr>
          <tr>
            <td>
           speciality
         </td>
         <td>
           <input type="text" name="speciality" placeholder="<?php echo $row['speciality'] ?>" autocomplete="off" >
          </td>
          </tr>
          <tr>
            <td>
              Languages you are fluent in
            </td>
            <td>
              <input type="text" name="Languages" autocomplete="off" placeholder="<?php echo $row['languages']; ?>">
            </td>
          </tr>
          <tr>
            <td>
          state medical council
          </td>
          <td>
          <select name="medicalCouncil">
            <option>None</option>
            <option value="Andhra Pradesh Medical Council">Andhra Pradesh Medical Council</option>
            <option value="Arunachal Pradesh Medical Council">Arunachal Pradesh Medical Council</option>
            <option value="Assam Medical Council">Assam Medical Council</option>
            <option value="Bhopal Medical Council">Bhopal Medical Council</option>
            <option value="Bihar Medical Council">Bihar Medical Council</option>
            <option value="Bombay Medical Council">Bombay Medical Council</option>
            <option value="Chandigarh Medical Council">Chandigarh Medical Council</option>
            <option value="Chattisgarh Medical Council">Chattisgarh Medical Council</option>
            <option value="Delhi Medical Council">Delhi Medical Council</option>
            <option value="Goa Medical Council">Goa Medical Council</option>
            <option value="Gujarat Medical Council">Gujarat Medical Council</option>
            <option value="Harayana Medical Council">Harayana Medical Council</option>
            <option value="Himachal Pradesh Medical Council">Himachal Pradesh Medical Council</option>
            <option value="Hyderabad Medical Council</option>
            <option>Jammu & Kashmir Medical C">Hyderabad Medical Council</option>
            <option value="Jammu & Kashmir Medical Council">Jammu & Kashmir Medical Council</option>
            <option value="Jharkhand Medical Council">Jharkhand Medical Council</option>
            <option value="Karnataka Medical Council">Karnataka Medical Council</option>
            <option value="Madhya Pradesh Medical Council">Madhya Pradesh Medical Council</option>
            <option value="Madras Medical Council">Madras Medical Council</option>
            <option value="Mahakoshal Medical Council">Mahakoshal Medical Council</option>
            <option value="Maharashtra Medical Council">Maharashtra Medical Council</option>
            <option value="Manipur Medical Council">Manipur Medical Council</option>
            <option value="Medical Council of India">Medical Council of India</option>
            <option value="Medical Council of Tanganyika">Medical Council of Tanganyika</option>
            <option value="Mizoram Medical Council">Mizoram Medical Council</option>
            <option value="Mysore Medical Council">Mysore Medical Council</option>
            <option value="Nagaland Medical Council">Nagaland Medical Council</option>
            <option value="Orissa Council of Medical Registration">Orissa Council of Medical Registration</option>
            <option value="Pondicherry Medical Council">Pondicherry Medical Council</option>
            <option value="Punjab Medical Council">Punjab Medical Council</option>
            <option value="Rajasthan Medical Council">Rajasthan Medical Council</option>
            <option value="Sikkim Medical Council">Sikkim Medical Council</option>
            <option value="Tamil Nadu Medical Council">Tamil Nadu Medical Council</option>
            <option value="Telengana State Medical Council">Telengana State Medical Council</option>
            <option value="Tripura State Medical Council">Tripura State Medical Council</option>
            <option value="Uttar Pradesh Medical Council">Uttar Pradesh Medical Council</option>
            <option value="Uttarakhand Medical Council">Uttarakhand Medical Council</option>
            <option value="Vidharba Medical Council">Vidharba Medical Council</option>
            <option value="West Bengal Medical Council">West Bengal Medical Council</option>
          </select>
          </td>
          </tr>
          <tr>
            <td>
          registration no
        </td>
        <td>
          <input type="text" name="registration_no" placeholder="<?php echo $row['regNo']; ?>">
          </td>
          </tr>
          <tr>
            <td>
          year of registration
        </td>
        <td>
          <input type="year" name="year_of_registration" placeholder="<?php echo $row['yearReg']; ?>">
          </td>
          </tr>
          <tr>
            <td>
         location
       </td>
       <td>
          <input type="text" name="location" placeholder="<?php echo $row['loaction'] ?>" autocomplete="off">
          </td>
           </tr>
           <tr>
            <td>
             qualification 1(required)
            </td>
            <td>
              <input type="text" name="qual1" placeholder="<?php echo $row['qualification1'] ?>">
            </td>
           </tr>
           <tr>
            <td>
             qualification 2(optional)
            </td>
            <td>
              <input type="text" name="qual2" placeholder="<?php echo $row['qualification2'] ?>">
            </td>
           </tr>
           <tr>
            <td>
             qualification 3(optional)
            </td>
            <td>
              <input type="text" name="qual3" placeholder="<?php echo $row['qualification3'] ?>">
            </td>
           </tr>
        </table>
<?php
echo "<br>";
echo "<br>";
echo "<button name='submit' value='submit'>save</button>";
echo "</form>";
echo "</div>";
if(isset($_POST['submit'])){
  echo "success";
  if(updateDetail($_POST["fullName"],$_POST["speciality"],$_POST["location"],$_POST["phone_no"],$_POST['qual1'],$_POST['qual2'],$_POST['qual3'],$_POST['medicalCouncil'],$_POST['Languages'],$_POST['year_of_registration'],$_POST['registration_no'])){
    ?>
    <script type="text/javascript">
      $(document).ready(function(){
        window.location.reload();
      });
    </script>
    <?php
  }
}
?>
</div>
<?php
if($_SESSION['user_type']=="doctor"){
  echo "<div style='padding:10px;'>";
  echo "<table>";
  echo "<tr>";
  echo "<form method='POST'>";
  echo "<td>description</td>";
  echo "<td><textarea cols='40' maxlength='200' name='description' placeholder='".$row['description']."'></textarea></td>";
  echo "<tr>";
  echo "<td></td>";
  echo "<td><button name='desc'>save</button></td>";
  echo "</tr>";
  echo "</form>";
  echo "</tr>";
  echo "</table>";
  echo "</div>";
  }
?>
</div>
<?php
if(isset($_POST['desc'])){
  updateDesc($_POST['description']);
}
?>
<div style="padding-left: 20px; padding-right:20px; padding-bottom: 60px;">
<b>
  privacy
</b>  
<table style="width:100%;">
  <tr>
    <td>
      show phone number
    </td>
    <td>
      <input type="radio" name="phone">
    </td>
  </tr>
  <tr>
    <td>
      show email
    </td>
    <td>
      <input type="radio" name="email">
    </td>
  </tr>
  <tr>
    <td>
      <button>save</button>
    </td>
  </tr>
</table>
</div>
<br>
<br>
<br>
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