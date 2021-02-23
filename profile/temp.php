<?php include('userData.php'); 
session_start(); 
if(isset($_GET['profile'])&&isset($_GET['id'])){
  setcookie("user_id",$_GET['id'],time() + (86400 * 30), "/");          }
  ?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="http://localhost/swasthya/profile/style.css">
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
  <style type="text/css">
    @media only screen and (min-width: 512px;){
      .container{
        width: 100%;
      }
      .prof-image{
  max-height: 300px !important;
  max-width: 100%;
}
      .prof-image img{
        max-width: 100%;
        height: 300px !important;
    border-radius: 50%;
}
.profile-details{
  padding: 10px;
  float: left;
}
.add-clinic{
  margin-top: 200px;
  padding: 20px;
  float: left;
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
    /*if(isset($_SESSION["profile_id"])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/uploads/index.php'>Uploads</a>";
      echo "</li>";
    }*/
      ?>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/swasthya/aboutUs.php">About us</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
  <div class="profile-details">
    <div class="prof-image"><img src="http://localhost/swasthya/dp/def.jpg" class="img-fluid"></div>
    <div class="name">DocName</div>
    <div class="img-edit-btn"><button name="edit">edit image</button></div>
  </div>
  <div class="details">
    <div class="doc-details">
      <div class="doc-qual">
        <p><h5>qualification:</h5>
          Mbbs
        </p>
      </div>
      <div class="doc-desription">
        <p><h5>description:</h5> 
            some place holder text I guess wdsh djhwhfcuohd hwhdjfn jksdv HGSDJH SJHD DSHFSH asrjgha kgjfhg ghrgh fjghakf ghjgfjhk hgfjg kajg ajhgkajghf fjk agakjgh fjk ajhg oari gRIGJNRpv
        </p>
      </div> 
    </div>
    <div class="clinic-details">
      <div class="clinic-info" style="background-color: #ebfafa">
        <div class="clinic-name" style="background-color: #d6f5f5;">
          <p>
            <h6>Leelavati</h6>
          </p>
        </div>
        <div class="clinic-timing" style="background-color:  #85e0e0;">
          <p>
            timing:10:00 to 11:00
          </p>
        </div>
        <div class="days" style="background-color: #d6f5f5;">
          <p>
            Days:Weekdays
          </p>
        </div>
        <div class="clinic-location" style="background-color:  #85e0e0;">
          <p>
            <div class="address">
              address:
            </div>  
            <div class="clinics-address">
              Bandra(w), Mumbai 30dsgfsgdfhsdg
            </div> 
          </p>
        </div>
        <div class="clinics-cost" style="background-color: #d6f5f5;">
          <p>
            5000rs
          </p>
        </div>
          <div class="clinic-delete">
        <button>delete</button>
      </div>
      </div>
    </div>
  </div>
  <div class="add-clinic" style="background-color: #ebfafa ;padding:10px; margin-top: 260px; float: left;">
    <h6>To add a new location</h6>
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
    <tr>
      <td>
          <button name="submit">submit</button>
      </td>
      <td>
        
      </td>
    </tr>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>
 <br>
 <div style="padding: 300px;"></div>
<!-- ///////////////footer here///////////////////////////// -->
<div style="text-align: left;color: white; background-color:#001a33;">
    <div style="text-align: center;">
      <b>swasthya</b>
    </div>
    <br>
    <div style="margin-right: 10px;" class="table-responsive">
<table class="table">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
</body>
</html>