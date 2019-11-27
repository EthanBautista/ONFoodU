<?php
include 'config.php';
include 'autoload.php';

session_start();

$name=$_POST['user'];
$pass=$_POST['password'];
$email=$_POST['email'];
$hashed=hash('sha256',$pass);

$s = "select * from Accounts where Name = '$name'";

$result= mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num==1){
	echo "Username already exists in the system!";
}else{
	$reg = "insert into Accounts(Name,Email,Password) values ('$name','$email','$hashed')";
	mysqli_query($con, $reg);
	$_SESSION["id"] = $name;
	header("Location: login.php");
	exit;
}
?>