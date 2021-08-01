<?php 
$con = new PDO("mysql:host=localhost; dbname=Facebook","root","");
$data=$con->query("select * from users where User_Id={$_COOKIE['userid']}");
$profile=$data->fetch(PDO::FETCH_ASSOC);
?>
