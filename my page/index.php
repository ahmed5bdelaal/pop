<?php
ob_start();
session_start();
require('config/connect.php')
?><!DOCTYPE html>
<html>
<title>AhMeD AbDeLaAl</title>
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
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">I'm</span> ahmed abdelaal</h1>
    <p>Photographer and Web Div.</p>
    <img src="pic/back.jpg" alt="boy" class="w3-image" width="992" height="1108">
  </header>

  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">ahmed abdelaal</h2>
    <hr style="width:200px" class="w3-opacity">
    <p>
      for sucsses must be drems.
    </p>
   </div>
   <div class="w3-content w3-1justify w3-text-grey w3-padding-64" id="posts">
     <h2 class="w3-text-light-grey">posts</h2>
     <a href="mposts.php"><h3>my posts</h3></a>
      <?php
      $show="SELECT * FROM ahm INNER JOIN post ON id_name=id_user";
      $showq=mysqli_query($connection,$show);
      
if (mysqli_num_rows($showq) > 0) {
    while($row = mysqli_fetch_assoc($showq)) {
  echo "<div class='post'>";
  if($row['img']==''){
     echo $row['name']."<br>";
     echo $row['post'];
     echo "</div>";
  }else{
          echo "<img src='uploads/".$row['img']."' width='150' height='150' border-radius='10'>"."<br>";
          echo $row['name']."<br>";
          echo $row['post'];
          echo "</div>";   
           }
        }
} else {
    echo "0 results";
}
        
        
      



      ?>
     <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
       <input type="text" name="mas" placeholder="your post">
       <input type="file" name="images" accept="image/*">
       <input type="submit" name="add" value="add">
        <p id="mss" ><?php  if(isset($_GET['msg'])){
        echo 'you must login firist';
      } ?></p>
     </form>

   </div>
  <!-- Portfolio Section -->
  <div class="w3-padding-64 w3-content" id="photos">
    <h2 class="w3-text-light-grey">My Photos</h2>
    <hr style="width:200px" class="w3-opacity">

    <!-- Grid for photos -->
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-half">
        <img src="pic/ahmed8.jpg" style="width:100%">
        <img src="pic/ahmed1.jpg" style="width:100%">
        <img src="pic/ahmed2.jpg" style="width:100%">
        <img src="pic/ahmed7.jpg" style="width:100%">
        <img src="pic/ahmed6.jpg" style="width:100%">
      </div>

      <div class="w3-half">
        <img src="pic/ahmed3.jpg" style="width:100%">
        <img src="pic/ahmed4.jpg" style="width:100%">
        <img src="pic/ahmed5.jpg" style="width:100%">
      </div>
    <!-- End photo grid -->
    </div>
  <!-- End Portfolio Section -->
  </div>

  <!-- Contact Section -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <h2 class="w3-text-light-grey">Contact Me</h2>
    <hr style="width:200px" class="w3-opacity">

    <div class="w3-section">
      <p><i class="fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> EGYPT,EGY</p>
      <p><i class="fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Phone:01212393872</p>
      <p><i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right"> </i> Email:ahmed5bdelaal@gmail.com</p>
    </div><br>
    <p>Lets get in touch. Send me a message:</p>

    <form action="index.php" method="POST">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Subject" required name="Subject"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Message" required name="Message"></p>
      <p>

        <button name="submit" class="w3-button w3-light-grey w3-padding-large" type="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </p>
      <p id="msg" ><?php  if(isset($_GET['msg'])){
        echo 'you must login firist';
      } ?></p>
    </form>
  <!-- End Contact Section -->
  </div>
  
    <!-- Footer -->
  <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
   <a href="https://www.facebook.com/ahmed5bdelaal/" target="_blank"> <i class="fa fa-facebook-official w3-hover-opacity"></i></a>
 <a href="https://www.instagram.com/ahmed5bdelaal/" target="_blank">   <i class="fa fa-instagram w3-hover-opacity"></i></a>
   <a href="https://twitter.com/ahmed5bdelaal" target="_blank"> <i class="fa fa-twitter w3-hover-opacity"></i></a>
    <p class="w3-medium">Powered by <a href="https://www.facebook.com/ahmed5bdelaal/" target="_blank" class="w3-hover-text-green">ahmed abdelaal</a></p>
  <!-- End footer -->
  </footer>

<!-- END PAGE CONTENT -->
</div>

</body>
</html>
<?php
// session_start();
require('config/connect.php');



if (isset($_POST['submit'])) {
	if(isset($_SESSION['is_logged'])){
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$subject=$_POST['Subject'];
	$message=$_POST['Message'];
	$sql="INSERT INTO page (id,name,email,subject,massage)VALUES(NULL,'$name','$email','subject','$message');";
	$insert=mysqli_query($connection,$sql);
	if ($insert) {
	   header('location: index.php');
	}else{

		echo "not added";
	}
  }else{

	 header('LOCATION: index.php?msg=log#msg');

 }
}

  if (isset($_POST['add'])) {
    if(isset($_SESSION['is_logged'])){
            $namee= $_FILES['images']['name'];  
            $temp_name= $_FILES['images']['tmp_name'];
            
            if(isset($namee) and !empty($namee)){
            $location = 'uploads/';      
            if(move_uploaded_file($temp_name, $location.$namee)){
            
                echo 'File uploaded successfully';
            }
              } else {
            echo 'You should select a file to upload !!';
              }
         $pos=$_POST['mas'];
         $id = $_SESSION['id_user'];
         $sqla="INSERT INTO post(id_user,img,post)VALUES('$id','$namee','$pos')";
         $inserta=mysqli_query($connection,$sqla);
         if ($inserta) {
          header('LOCATION:index.php');
         }else{

          echo "errrorrrrrrrrrrrrrrrrrrrrrrrrrrrrr".mysqli_error($connection);
         }
       }else{
        header('LOCATION: index.php?msg=log#mss');

       }
        
       }
        
