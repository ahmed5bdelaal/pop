<?php
ob_start();
session_start();
require('config/connect.php');
?><!DOCTYPE html>
<html>
<title>PROFILE</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
.l1{   display: inline-block;
              position:relative;
              top: 8px; 
              left:500px;     
              margin:0 50px;
              font-size: 30px;
              font-weight: bold; }
              .ss{
                text-align: center;
                font-weight: bold;
              }
</style>
<body class="w3-black">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <a href="https://www.facebook.com/ahmed5bdelaal/" target="_blank">
  <img src="pic/ahmed8.jpg"  class="w3-left w3-circle w3-margin-right" style="width:80px">
  </a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="#posts" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>POSTS</p>
  </a>
  <a href="#photos" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>PHOTOS</p>
  </a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>CONTACT</p>
  </a>
  <?php 

if(isset($_SESSION['is_logged'])){
?>
<a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
   <i class="fa fa-user w3-xxlarge"></i>
    <p>LOG OUT</p>
  </a>
<?php
}else{
	?>
<a href="login.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
   <i class="fa fa-user w3-xxlarge"></i>
    <p>LOG IN</p>
  </a>
  <?php 
    }
  ?>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="#posts" class="w3-bar-item w3-button" style="width:25% !important">BOSTS</a>
    <a href="#photos" class="w3-bar-item w3-button" style="width:25% !important">PHOTOS</a>
    <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="" id="home">
    <span class="ss">profile</span>
    <?php
    $id = $_SESSION['id_user'];
    $sql1="SELECT * FROM ahm WHERE id_name=$id";
    $show1=mysqli_query($connection,$sql1);
    $rows=array();
    while ($row=mysqli_fetch_array($show1)) {
        $rows[]=$row;
        foreach ($rows as $row) {
          echo "<div class='post'>";
          //echo "<img src='uploads/".$row['img']."' width='150' height='150' border-radius='10'>"."<br>";
          echo $row['name']."<br>";
          echo $row['username']."<br>";
          echo $row['email'];
          echo "</div>";
         echo '<a href="updatepro.php?id='.$row["id_name"].'">'.'update'.'</a>';
        }
      }
    ?>
    
    <img src="pic/back.jpg" alt="boy" class="w3-image" width="150" height="150">

  </header>
</div>
    <p>your posts</p>
    <?php
      if (!isset($_SESSION['is_logged'])){
          header('location: index.php');
      }else{
      $id=$_SESSION['id_user'];
      echo "<div class='l1'>";
      $sql="SELECT * FROM post WHERE id_user=$id"; 
      $show=mysqli_query($connection,$sql);
      $rows=array();
      while ($row=mysqli_fetch_array($show)) {
        $rows[]=$row;
          foreach ($rows as $row) {
            echo "<div class='w3-half'>";
              echo "<img src='uploads/".$row['img']."' width='150' height='150' border-radius='10'>"."<br>";
              echo $row['post']."<br>";
              
              echo "<a href='delete.php?id=".$row['id_post']."'>delete</a>"."||"."<a href='update.php?id=".$row['id_post']."'>edit</a>";
            echo "</div>";
       }
     } 
     echo "</div>";       
    }




    ?>
     <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
   <a href="https://www.facebook.com/ahmed5bdelaal/" target="_blank"> <i class="fa fa-facebook-official w3-hover-opacity"></i></a>
 <a href="https://www.instagram.com/ahmed5bdelaal/" target="_blank">   <i class="fa fa-instagram w3-hover-opacity"></i></a>
   <a href="https://twitter.com/ahmed5bdelaal" target="_blank"> <i class="fa fa-twitter w3-hover-opacity"></i></a>
    <p class="w3-medium">Powered by <a href="https://www.facebook.com/ahmed5bdelaal/" target="_blank" class="w3-hover-text-green">ahmed abdelaal</a></p>
  <!-- End footer -->
  </footer>






</body>
</html>
