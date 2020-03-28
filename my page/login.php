<?php
require('config/connect.php');
session_start();
if(isset($_SESSION['is_logged'])){
    header('LOCATION: index.php');
}
require('page.css');

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="welcom to my website">
        <title>log in</title>
        <link rel="stylesheet" type="text/css" href="page.css">
    </head>
    <body>
           
            <div class="input">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            
                    <input class="i1" type="text" name="username" max="15" placeholder="user name">
                    
                    <input class="i1" type="password" name="password" max="15" placeholder="password">
                    
                    <input class="i5" type="submit" name="submit" value="log in">
                    <br>
                    <a href="signup.php">Create a new account</a>
                    <p class="i6"><?php  if(isset($_GET['msg'])){
                         echo 'Your Login Name or Password is invalid';
                     } ?></p>
                   
            </form>
            </div>
         <?php
            $admin="ahmed";
            if(isset($_POST['submit'])){
                
            $username=$_POST['username'];   
             $password=$_POST['password'];
             $hashedpass=sha1($password);
             // $stmt=$dbah->prepare("SELECT username,pass FROM ahm WHERE username=? AND pass=?");
             // $stmt->execute(array($username,$password));
             // $c=$stmt->rowCount();
               $myusername = mysqli_real_escape_string($connection,$_POST['username']);
               $mypassword = mysqli_real_escape_string($connection,$_POST['password']); 
               $pass = md5($mypassword);
      
            $sql = "SELECT id_name FROM ahm WHERE username = '$myusername' and pass = '$pass'";
            $result = mysqli_query($connection,$sql);
             $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
             $count = mysqli_num_rows($result);

             if($count == 1) {
                $_SESSION['id_user']=$row['id_name'];
                $_SESSION['login_user'] = $myusername;
                $_SESSION['is_logged'] = true;
        
                header('LOCATION:index.php');

                }else {

                         header('LOCATION: login.php?msg=log');

                }
            }
            
        ?>
    </body>
</html>