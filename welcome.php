<!doctype html>
<html lang="en">
  <head>
    <style type="text/css">
      html, body {
      margin: 0;
      padding: 0;
      width: 100%;
}

body {
      font-family: "Helvetica Neue",sans-serif;
      font-weight: lighter;
      background-image: url(https://coolbackgrounds.io/images/backgrounds/index/compute-ea4c57a4.png);
      background-repeat: no-repeat;
      background-size: cover;
}

header {
      width: 100%;
      height: 100vh;
      background: url(https://www.missouripartnership.com/wp-content/uploads/2018/01/iStock-695349930.jpg) no-repeat 50% 50%;
      background-size: cover;
}

@media(max-width: 786px;){
  header{
    width: 100%;
      height: 400px;
      background: url(https://www.missouripartnership.com/wp-content/uploads/2018/01/iStock-695349930.jpg) no-repeat 50% 50%;
      background-size: cover;
  }
}

.content {
      width: 94%;
      margin: 4em auto;
      font-size: 20px;
      line-height: 30px;
      text-align: justify;
}

.logo {
      line-height: 60px;
      position: fixed;
      float: left;
      margin: 16px 46px;
      color: #fff;
      font-weight: bold;
      font-size: 20px;
      letter-spacing: 2px;
}

nav {
      position: fixed;
      width: 100%;
      line-height: 60px;
}

nav ul {
      line-height: 60px;
      list-style: none;
      background: rgba(0, 0, 0, 0);
      overflow: hidden;
      color: #fff;
      padding: 0;
      text-align: right;
      margin: 0;
      padding-right: 40px;
      transition: 1s;
}

nav.black ul {
      background: #000;
      color: white;
}

nav ul li {
      display: inline-block;
      padding: 16px 40px;;
}

nav ul li a {

      text-decoration: none;
      color: white;
      font-size: 16px;
}

.menu-icon {
      line-height: 60px;
      width: 100%;
      background: #000;
      text-align: right;
      box-sizing: border-box;
      padding: 15px 24px;
      cursor: pointer;
      color: #fff;
      display: none;
}
table{
        margin: 0px;
        padding: 0px;
        width: 100%;
        background-color: rgba(0,0,0,0);
        color: white;
      }
footer{
  padding: 30px;
  color: white;
}
@media(max-width: 786px) {

      .logo {
            position: fixed;
            top: 0;
            margin-top: 16px;
      }

      nav ul {
            max-height: 0px;
            background: #000;
      }

      nav.black ul {
            background: #000;
      }

      .showing {
            max-height: 34em;
      }

      nav ul li {
            box-sizing: border-box;
            width: 100%;
            padding: 24px;
            text-align: center;
      }

      .menu-icon {
            display: block;
      }
      
@media(max-width: 786px;){
  .images{
    height:90px;
    width: 90px;
  }
}
    </style>
   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-171665566-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-171665566-1');
</script>
   
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Home Page</title>
  </head>
  <body class="text-center body">
  
    <div class="wrapper">
         <header>
            <nav>
               <div class="menu-icon">
                  <i class="fa fa-bars fa-2x"></i>
               </div>
               <div class="logo">
                  <h2>Swasthya</h2>
               </div>
               <div class="menu">
                  <ul>
            <li class="nav-item">
        <a class="nav-link" href="http://localhost/swasthya/search/index.php">Search</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="http://localhost/swasthya/doctors/">Doctors</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/swasthya/fitness/">fitness</a>
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
      echo "<a class='nav-link' href='http://localhost/swasthya/profile/profile.php'>Profile</a>";
      echo "</li>";
    }
    if(isset($_SESSION["profile_id"])){
      echo "<li class='nav-item'>";
      echo "<a class='nav-link' href='http://localhost/swasthya/uploads/index.php'>Uploads</a>";
      echo "</li>";
    }
    ?>
      <li class="nav-item">
        <a class="nav-link" href="aboutUs.php">About us</a>
      </li>
                  </ul>
               </div>
            </nav>
         </header>       
  </div>
  <script type="text/javascript">
     $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });
  
      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
            }

            else {
                  $('nav').removeClass('black');
            }
      })
  </script>
  <table style="width: 100%; ">
    <td style="line-height: 200px;">
      <h2>Doctors</h2>
      </td>
      <td style="height: 200px;">
        <div>
        <img src="http://localhost/swasthya/images/doc1.jpg" class="img-fluid images">
      </div>
      </td>
    </tr>
    <tr>
      <td>
        <img src="http://localhost/swasthya/images/g.jpg">
      </td>
      <td>
      <h2>About Us</h2>
      </td>
    </tr>
  </table>
  <div>
    <footer>
      <h3>Made by, CDAtech</h3>
    </footer>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>