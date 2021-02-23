<?php include('userData.php'); ?>
<?php
 if (!isset($_COOKIE['profile_id'])) { 
    setcookie('profile_id', "0", time() + (86400 * 30), '/');
    echo "<script>windows.alert('by using our site, you agree to our T&C')</script>";
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
    .images{
      height: 200px;
      width: 200px;
    }
    .car table{
      cursor: pointer;
    }
    .text{
      padding: 20px;
    }
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
        <a class="nav-link" href="http://localhost/swasthya/search/index.php">Search</a>
      </li>
      <?php
      if(isset($_COOKIE['profile_id'])){
        $user_id=$_COOKIE['profile_id'];
        if($user_id=="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/signIn.php'>Sign up</a>";
      echo "</li>";
    }
    }
?>
        <?php
      if(isset($_COOKIE['profile_id'])){
         $user_id=$_COOKIE['profile_id'];
        if($user_id=="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/login.php'>login</a>";
      echo "</li>";
    }
    }
?>
      <?php
      if(isset($_COOKIE['profile_id'])){
         $user_id=$_COOKIE['profile_id'];
        if($user_id!="0"){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/profiles.php'>Profile</a>";
      echo "</li>";
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
<div style="padding: 20px;">
 <h3>everything you need for your health-care at your finger-tips</h3>
</div>
<div class="car" style="padding: 20px;">
  <table>
    <ul>
      <tr class="doctors" style="background-color: #e6ffff;">
        <td>
          <div class="images">
            <img class="img-fluid" src="http://localhost/swasthya/images/plus-24.jpg">
          </div>
        </td>
        <td>
          <div class="text">
            <h4>doctors</h4>
          </div>
        </td>
      </tr>
      <tr class="mental-health">
        <td>
          <div class="images">
            <img class="img-fluid" src="http://localhost/swasthya/images/mental-health.jpg">
          </div>
        </td>
        <td>
          <div class="text">
            <h4>mental health</h4>
          </div>
        </td>
      </tr>
      <tr class="dietitians" style="background-color: #e6ffff">
        <td>
          <div class="images">
            <img class="img-fluid" src="http://localhost/swasthya/images/apple.jpg">
          </div>
        </td>
        <td>
          <div class="text">
            <h4>dietitians</h4>
          </div>
        </td>
      </tr>
      <tr class="fitness">
        <td>
          <div class="images">
            <img class="img-fluid" src="http://localhost/swasthya/images/fitness.jpg">
          </div>
        </td>
        <td>
          <div class="text">
            <h4>fitness</h4>
          </div>
        </td>
      </tr>
       <tr class="yoga" style="background-color: #e6ffff">
        <td>
          <div class="images">
            <img class="img-fluid" src="http://localhost/swasthya/images/yoga.jpg">
          </div>
        </td>
        <td>
          <div class="text">
            <h4>yoga</h4>
          </div>
        </td>
      </tr>
    </ul>
</table>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $(".doctors").on("click",function(){
      window.location.replace("http://localhost/swasthya/doctors/");
    });
     $(".mental-health").on("click",function(){
      window.location.replace("http://localhost/swasthya/mental-health/");
    });
      $(".dietitians").on("click",function(){
      window.location.replace("http://localhost/swasthya/diet/");
    });
       $(".fitness").on("click",function(){
      window.location.replace("http://localhost/swasthya/fitness/");
    });
      $(".yoga").on("click",function(){
      window.location.replace("http://localhost/swasthya/yoga/");
    });
  });
</script>
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
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>