<?php 

require('page.css');
session_start();
if(!isset($_SESSION['is_logged'])){

 header('LOCATION: login.php');
}
require('config/connect.php');

$id = $_GET['id'];
// select 
$result = mysqli_query($connection , "SELECT * FROM post where id_post= $id");
$row = mysqli_fetch_assoc($result);
?>

<form class="input" action="" method="POST">
	<label style="font-weight:bold;">NEW POST</label>
	<input class="i1" type="text" name="post" placeholder="the old post:<?php echo $row['post']; ?>" ><br/>
	<input type="hidden" name="id" value="<?= $id ?>">
	<input class="i5" type="submit" name="submit">
</form>
<?php 
if(isset($_POST['submit'])){
	
	$_id = $_POST['id'];
	$post = $_POST['post'];
 if (! empty($post)) {
	$query = "UPDATE post SET post = '$post' where id_post= $_id"; 
	$res = mysqli_query($connection , $query);

	if($res){
		header("LOCATION: mposts.php");
	}else{
		echo "there is an error in update ".mysqli_error($connection);
	}
   }else{

   	echo "<center style='margin-bottom:100p;'>you must write first</center>";
   }

}