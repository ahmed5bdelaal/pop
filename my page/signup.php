<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="welcom to my website">
        <title>sign up</title>
        <link rel="stylesheet" type="text/css" href="page.css">
          <?php
require('config/connect.php');
require('page.css');

session_start();
if(isset($_SESSION['is_logged'])){
    header('location: index.php');
}
?>
        
    </head>
    <body>
     
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" >
            <div class="input">
            	     <h1>sign up</h1>
                    <input class="i1" type="text" name="name" max="15" placeholder="full name">
                  
                     <input class="i1" type="text"  name="username" max="15" placeholder="user name">
                     <input class="i1" type="email" name="email" max="15" placeholder="email">
                     <input class="i1" type="password" name="password" max="15" placeholder="password">
                     <input class="i5" type="submit" name="submit" value="sign up"><br>
                      <a class="i5" href="login.php">or log in</a>
                      <details><summary>information</summary>
                        ahmed abdelaal page for web
                      </details>
            </div>
    
                    
          </form>
          <?php
          if(isset($_POST['submit'])){ 
           
      
           $name=$_POST['name'];
           $username=$_POST['username'];
           $email=$_POST['email'];
           $pass=md5($_POST['password']);
           $sql ="INSERT INTO ahm (id_name,name,email,username,pass) VALUES (NULL,'$name','$email','$username','$pass')";
           $insert = mysqli_query($connection,$sql);
           if($insert){
            header("LOCATION: login.php");
           }else{
            echo "there is error";
           }
          }


          ?>
    </body>
</html>