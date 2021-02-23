<?php include('userData.php'); ?>
<?php
 if (!isset($_COOKIE['profile_id'])) { 
    setcookie('profile_id', "0", time() + (86400 * 30), '/');
    } 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<title>home</title>
<style type="text/css">


	 th {text-align: left;}
   body{
        font-family: Arail, sans-serif;
        background-color:  #ccffe6;
    }
    /* Formatting search box */
    .search-box{
        width: 350px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result table{
        background:  #99ff99;
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
    .mySlides {display:none;}
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result table td", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
<body >
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
      <?php
      if(isset($_COOKIE['profile_id'])){
        $user_id=$_COOKIE['profile_id'];
        if($user_id=="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='signIn.php'>Sign up</a>";
      echo "</li>";
    }
    }
?>
        <?php
      if(isset($_COOKIE['profile_id'])){
         $user_id=$_COOKIE['profile_id'];
        if($user_id=="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='login.php'>login</a>";
      echo "</li>";
    }
    }
?>
      <?php
      if(isset($_COOKIE['profile_id'])){
         $user_id=$_COOKIE['profile_id'];
        if($user_id!="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='profiles.php'>Profile</a>";
      echo "</li>";
    }
    }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="aboutUs.php">About us</a>
      </li>
      <li class="nav-item">
        <form method="POST">
        <a class="nav-link" type="button" href="booking/booking.php" name="booking">booking</a>
        </form>
      </li>
      <?php
      if (isset($_POST['booking'])) {
        header("Location:http://localhost/swasthya/booking/booking.php");
      }
      ?>
    </ul>
  </div>
</nav>
<div style="float: right; padding-right: 20px;">
<?php
    echo "<br>";
    if(isset($_COOKIE['profile_id'])){
        $user=$_COOKIE['profile_id'];
        if($user!="0"){
        echo "logged in";
        echo "<form method='POST'>";
        echo "<button name='logout'>Log out</button>";
        echo "</form>";
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

<div style="padding:20px;">
	<i>as we are in testing phase, real doctor/hospital profiles do not exist. just click search to view all profiles on this site...</i>
  <br>
  <br>
  <b>search doctors</b>
 <?php
$cookie_name="token";
if(!isset($_COOKIE['token'])){
$val= bin2hex(random_bytes(32));
setcookie($cookie_name,$val, time() + (86400 * 30), "/");
$token=$_COOKIE['token'];
}
$token=$_COOKIE['token'];

echo "<form method='POST'>";
echo "<div class='search-box'>";
echo "<input type='text' autocomplete='off' placeholder='Search for doctors, speciality, clinic, hospital...' name='search'>";
echo "<div class='result'></div>";
echo "</div>";
echo "<button name='sub'>search</button>";
echo "<input type='hidden' name='token' value='".$token."'>";
echo "</form>";
?>
<div style="padding: 30px;">
<div class="w3-content w3-section" style="max-width:700px; max-height: 400px;">
  <img class="mySlides" src="images/a.jpg" style="width:100%" class="img-fluid">
  <img class="mySlides" src="images/b.jpg" style="width:100%" class="img-fluid">
  <img class="mySlides" src="images/c.jpg" style="width:100%" class="img-fluid">
  <img class="mySlides" src="images/d.jpg" style="width:100%" class="img-fluid">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 5000); // Change image every 2 seconds
}
</script>

</div>
<div style="position: relative; margin-top: 10px;">
<table style="width:90% ;  border-spacing: 10px;">

  <?php
	if(isset($_POST["sub"])){
		$search=$_POST["search"];
		$search=filter_var($search, FILTER_SANITIZE_STRING);
    if (!empty($_POST['token'])) {
    if (hash_equals($_COOKIE['token'], $_POST['token'])) {
		$posts=getDoctor($search);
    echo "<tr>";
    echo "<th>Doctor name</th>";
    echo "<th>speciality</th>";
    echo "<th>cons-charges</th>";
    echo "</tr>";
		while ($row = mysqli_fetch_array($posts)) { 
            echo "<tr>"; 
            echo "<td>".$row['fullName']."</td>";
            echo "<td>".$row['speciality']."</td>";
            echo "<td>".$row['consultingCharges']."</td>";
            echo "<form method='GET' action='profile.php'>";
            echo "<td><button name='profile' value='submit'>view profile</button></td>";
            echo "<input type='hidden' name='id' value='".$row['profile_url']."'/>";
            echo "</form>";
            echo "</tr>";
        } 
      }
    }
}
?>
</table>
</div>
</div>
 </div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>