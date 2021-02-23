<!doctype html>
<?php

//prevents user access if already logged in
include('signup.php');
include('sign.php');
?>
<html lang="en">
  <head>
    <style type="text/css">
      /* Style all input fields */
input[type=text] {
   width: 75%;  
   font-size: 15px;
   border-radius: 4px;
   padding: 5px 5px;
}
input[type=password] {
   width: 75%;  
   font-size: 15px;
   border-radius: 4px;
   padding: 5px 5px;
}
/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 20px;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
      table tr td{
        padding: 5px;
      }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Sign up</title>
    <!--  Uploading pic preview-->
    <style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
</style>
<!-- head ends-->
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
      /*if(isset($_COOKIE['user_id'])){
      $user=$_COOKIE['user_id'];
      if($user==0){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='signIn.php'>Sign up</a>";
      echo "</li>";
    }
      }*/


      if(isset($_SESSION['profile_id'])){
      $user=$_COOKIE['profile_id'];
      if($user!="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='https://www.swaasthya.co/profile/profiles.php'>Profile</a>";
      echo "</li>";
    }
    }
      ?>
    </ul>
  </div>
</nav>
<?php

if(isset($_SESSION['profile_id'])){
  echo "<script>$(document).ready(function(){alert('already logged in')});</script>";
}
else{
if(isset($_POST["submit"])&&isset($_POST['tAndC'])&&isset($_POST['id_type'])){
  $flag1=false;
  //medicalCouncil, Languages, registratio_no
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if($_POST['psw']==$_POST['confirm']){//to confirm pwd is equal to password
  /*
  if($_POST['id_type']=='doctor'){
    //$fullName,$speciality,$location,$email,$phone_no,$passwords,$t_and_c,$qual1,$qual2,$qual3,$medicalCouncil,$languages,$yearReg,$regNo
     $flag1=sign($_POST["fullName"],$_POST["speciality"],$_POST["location"],$_POST["emails"],$_POST["phone_no"],$_POST["psw"],$_POST["tAndC"],$_POST['qual1'],$_POST['qual2'],$_POST['qual3'],$_POST['medicalCouncil'],$_POST['Languages'],$_POST['year_of_registration'],$_POST['registration_no']);
    }
    else if($_POST['id_type']=="user"){
     $flag1=user_signup($_POST["fullName"],$_POST["location"],$_POST["email"],$_POST["phone_no"],$_POST["password"],$_POST["tAndC"]); 
    }
    else if($_POST['id_type']=='clinic'){
      $flag1=clinic_signup($_POST["fullName"],$_POST["location"],$_POST["email"],$_POST["phone_no"],$_POST["password"],$_POST["tAndC"]);   //
    }
     else if($_POST['id_type']=='trainer'){
      $flag1=trainer_signup($_POST["fullName"],$_POST["location"],$_POST["email"],$_POST["phone_no"],$_POST["password"],$_POST["tAndC"]);   //
    }
     else if($_POST['id_type']=='gym'){
      $flag1=gym_signup($_POST["fullName"],$_POST["location"],$_POST["email"],$_POST["phone_no"],$_POST["password"],$_POST["tAndC"]);   //
    }
    else if(!isset($_POST['id_type'])){
      echo "<script>alert('please enter user type');</script>";
    }
 if($flag1==true){
    ?><script>alert('success! you can now log in');window.location.replace('https://www.swaasthya.co/signup/index.php');</script>"<?php
 }
 else if($flag1==false){
    echo "<script>alert('email already in use!');window.location.replace('https://www.swaasthya.co/signup/users/index.php');</script>";
    return false;
    }
    */
    if(isset($_POST['submit'])){
        $flag=user_signup($_POST['fullName'],$_POST['location'],$_POST['emails'],$_POST['phone_no'],$_POST['psw'],$_POST['tAndC']);
    }
  }//if confirm password and password are equal
}
else{
      echo "please enter all the fields";
    }
}//if for the post
?>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Signup</a></li>
  </ul>

  <div class="tab-content">
    <div  id="menu1"  class="tab-pane fade in active">
        <br>
              <table>
                <tr>
                    <td>
                        <button style="background-color: #00264d; color: white;" class="users_redirect">signup for Doctors here</button>
                    </td>
                </tr>
            </table>
          <h3>Signup for Users</h3>
            <br>
            <script>
                $(document).ready(function(){
                    $(".users_redirect").on("click",function(){
                        location.href="https://www.swaasthya.co/signup/";
                    });
                });
            </script>
      <div style="padding:20px;" class="table-responsive doctor_signup">
      <form method="POST" action="">
            please select user type:
            <br>

           <!--  <br>
            <br>
            fitness trainer/yoga instructure<input class="type" type="radio" name="id_type" id="trainer" value="trainer">
            <br>
            <br>
            user<input class="type" type="radio" name="id_type" id="user" value="user">
            <br>
            <br>
            clinic/hospital<input class="type" type="radio" name="id_type" id="hospital" value="clinic">
            <br>
            <br>
            gym<input class="type" type="radio" name="id_type" id="gym" value="gym"> -->
            <br>
            <br>
            <b>enter all other details</b>
            <table class="table">
                <tr>
                    <td>User type</td>
                    <td></td>
                </tr>
              <tr>
            <td>user</td>
            <td>
              <input class="type" type="radio" name="id_type" id="user" value="user">    
            </td>  
              </tr>
        <tr>
                <td>
            Email
          </td>
          <td>
            <input type="text" name="emails" required="TRUE">
            </td>
            </tr>
            <tr>
              <td>
            Phone no
          </td>
          <td>
            <input type="text" name="phone_no" required="TRUE">
            </td>
            </tr>
            <tr>
              <td>
            Full name
          </td>
          <td>
            <input type="text" name="fullName" autocomplete="off" required="TRUE">
            </td>
            </tr>
            <!-- start here-->
            
            <!-- end here -->
            <tr>
              <td>
            Password
          </td>
          <td>
    <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
            </td>
            </tr>
            <tr>
              <td>
            Confirm password
          </td>
          <td>
           <input type="password" name="confirm" autocomplete="off" required="TRUE">
            </td>
          </tr>
          <tr>
            <td>
         Location(required)
       </td>
       <td>
          <input type="text" name="location" autocomplete="off" required="TRUE">
          </td>
           </tr>
                <tr>
            <td>
          Accept the T&C?
        </td>
        <td>
          <input type="checkbox" name="tAndC" reauired="TRUE">
           </td>
                </tr>
                <tr>
                      <td>
                <div>
            <h4>Our privacy <a href="policy.php">policy</a> and <a href="https://www.swaasthya.co/terms.php">Terms</a></h4> 
                </div>
                      </td>
                       <td>
          <button name="submit" style="background-color: #00264d; color: white;">Submit</button>
                        </td>
                      </tr>
                   </table>
                 </form>
              </div>
   <!--doctor registration ends here-->
            </div>
        </div>
    </div>
    <!-- footer starts here
<div style="float:bottom; text-align: left;color: white; background-color:#001a33; margin-top: 200px;">
    <div style="text-align: center;">
    <b>swasthya</b>
  </div>
    <br>
  <div style="margin-right: 10px;" class="table-responsive">
      <table class="table">
        <tr>
          <td>
  <a class="nav-link" style="display: block; color: white;" href="http://localhost/swasthya/aboutUs.php">About us</a>
</td>
<td>
  <a class="nav-link" style="display: block; color: white;" href="http://localhost/swasthya/aboutUs.php">Doctors</a>
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
  Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php
}
//9:30-9:41

///////////////////////////////////////////

//to take care of hacking!!!!!!!!!!!!!

