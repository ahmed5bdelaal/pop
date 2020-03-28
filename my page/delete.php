<?php

session_start();
if(!isset($_SESSION['is_logged'])){

 header('LOCATION: login.php');
}
require('config/connect.php');

$id = $_GET['id'];


$sql = "DELETE FROM post WHERE id_post=$id";

if (mysqli_query($connection, $sql)) {
    header("LOCATION:mposts.php");
} else {
    echo "Error deleting record: " . mysqli_error($connection);
}


