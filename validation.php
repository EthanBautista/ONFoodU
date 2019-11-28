<?php
include 'config.php';
include 'autoload.php';

session_start();

$name=$_POST['user'];
$pass=$_POST['password'];
$hashed=hash('sha256',$pass);

$s = "select * from Accounts where Name = '$name' && Password='$hashed'";
$result= mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num==1){
	while($row = mysqli_fetch_assoc($result)){
	$_SESSION["id"] = $row["ID"];
	}
	$_SESSION["name"] = $name;
	echo $_SESSION["name"];
	header('location:login.php');
}else{
	header('location:login.php');
}

mysqli_close($con);
?>