<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "a";
$connection = mysqli_connect($servername,$username,"",$dbname);
if(!$connection){
 die('connection error');
}

?>