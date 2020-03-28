<?php 

require('page.css');

session_start();
if(!isset($_SESSION['is_logged'])){

 header('LOCATION: login.php');
}
require('config/connect.php');

$id = $_GET['id'];
// select 
$result = mysqli_query($connection , "SELECT * FROM ahm where id_name = $id");
$row = mysqli_fetch_assoc($result);


?>

<form class="input" action="" method="POST">
	<label>name :</label><br>
	<input class="i1" type="text" name="name" placeholder="<?=$row['name']?>" ><br/>
	<label>user name :</label><br> 
	<input class="i1" type="text" name="username" placeholder="<?=$row['username']?>" ><br/>
    <label> email :</label><br>
    <input class="i1" type="text" name="email" placeholder="<?=$row['email']?>" ><br/>

	<input type="hidden" name="id" value="<?= $id ?>">
	<input class="i5" type="submit" name="submit">
</form>
<?php 
if(isset($_POST['submit'])){
	$_id = $_POST['id'];
	$name = $_POST['name'];
	$username = $_POST['username'];
 	$email = $_POST['email'];
	$query = "UPDATE ahm SET name='$name'  , username = '$username' , email='$email' WHERE id_name = $_id"; 
	$res = mysqli_query($connection , $query);

	if(mysqli_affected_rows($connection) > 0){
		header("LOCATION: mposts.php");
	}else{
		echo "there is an error in update ".mysqli_error($connection);
	}


}