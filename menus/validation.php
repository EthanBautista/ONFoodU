<?php
include 'config.php';
include 'autoload.php';

session_start();

$name=$_POST['user'];
$pass=$_POST['password'];
$hashed=hash('sha256',$pass);

$s = "select * from Users where name = '$name' && password='$hashed'";

$result= mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num==1){
	$_SESSION["id"] = $name;
	header('location:index.php');
}else{
	header('location:login.php');
}
?>