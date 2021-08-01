<?php 
 //connection
 require_once("classes/db.php");
 $conn= new db();
 $conn->deleteData("posts","Post_Id={$_GET['id']}");


 header("Location:index.php");
 ?>
