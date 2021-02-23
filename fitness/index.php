<?php
 session_start();
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
    background-image: url(https://www.docsign.in/wp-content/uploads/2018/11/web-designer-pune-background.jpg);
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
    @media(min-width: 560px;){ 
    .hero{
      height: 300px;
      width: 100px;
      overflow: auto;
    }
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
        <a class="nav-link" href="http://localhost/swasthya/index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/swasthya/search/index.php">Search</a>
      </li>
      <?php
      if(!isset($_SESSION['profile_id'])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/signup/'>Sign up/login</a>";
      echo "</li>";
    }
      if(isset($_SESSION['profile_id'])){
        if($_SESSION['user_type']=='doctor'){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/profile/profile.php'>Profile</a>";
      echo "</li>";
    }
    else if($_SESSION['user_type']=='user'){
       echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/users/profile.php'>Profile</a>";
      echo "</li>"; 
    }
    }
    
      ?>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/swasthya/aboutUs.php">About us</a>
      </li>
      
    </ul>
  </div>
</nav>
<br>
<div class="hero" style="padding: 10px;">
  <div>
    <img class="img-fluid"src="http://localhost/swasthya/images/fitness.png" style="max-height: 500px;">
  </div>   
</div>
<br>
<br>
<div style="padding:15px;">
<table style="width: 100%;cursor: pointer;">
    <tr class="fitness">
      <td>
        <img class="img-fluid" style="height: 100px; width: 100px;"src="http://localhost/swasthya/images/fitness1.jpg">
      </td>
      <td>
        <h4><b>fitness trainers</b></h4>
      </td>
    </tr>
    <tr class="gyms">
      <td>
        <img class="img-fluid" style="height: 100px; width: 100px;"src="http://localhost/swasthya/images/download.jpg">
      </td>
      <td>
        <h4><b>gyms</b></h4>
      </td>
    </tr>
    <tr class="yoga">
      <td>
        <img class="img-fluid" style="height: 100px; width: 100px;"src="http://localhost/swasthya/images/yoga1.jpg">
      </td>
      <td>
        <h4><b>yoga</b></h4>
      </td>
    </tr>
  </table>
</div>
<script>
  $(document).ready(function(){
    $(".fitness").on("click",function(){
      window.location.href="http://localhost/swasthya/fitness/gym.php";
    });
    $(".gyms").on("click",function(){
     
      window.location.href="http://localhost/swasthya/fitness/gym.php";
    });
    $(".yoga").on("click",function(){
      
      window.location.href="http://localhost/swasthya/fitness/gym.php"
    });
  });
</script>
<div style="text-align: center;color: white; background-color:#001a33; margin-top: 250px;">
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
  <a class="nav-link" style="display: block; color: white;" href="http://localhost/swasthya/aboutUs.php">Doctors</a>
</td>
<td>
  <a class="nav-link" style="display: block; color: white;" href="http://localhost/swasthya/aboutUs.php">Hospitals</a>
</td>
<td>
  <a class="nav-link" style="display: block; color: white;" href="http://localhost/swasthya/aboutUs.php">Speciality</a>
</td>
<td>
  <a class="nav-link" style="display: block; color: white;" href="http://localhots/swasthya/aboutUs.php">clinics</a>
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