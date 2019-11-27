<?php
include 'config.php';
include 'autoload.php';

session_start();

$name=$_POST['user'];
$pass=$_POST['password'];
$hashed=hash('sha256',$pass);

$s = "select * from Accounts where Name = '$name'";

$result= mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num==1){
	echo "Username already exists in the system!";
}else{
	$reg = "insert into Accounts(Name,Password) values ('$name','$hashed')";
	mysqli_query($con, $reg);
	$_SESSION["id"] = $name;
	header("Location: login.php");
	exit;
}
?>