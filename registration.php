<?php
include 'autoload.php';
session_start();

$conn = new mysqli(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_NAME'));
// Check connection
if ($conn->connect_error) {
    echo "<p>Connection Failed</p>";
    die("Connection failed: " . $conn->connect_error);
}

$name=$_POST['user'];
$pass=$_POST['password'];

$s = "select * from Users where name = '$name'";

$result= mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num==1){
	echo "Username already exists in the system!";
}else{
	$reg = "insert into Users(name,password) values ('$name','$pass')";
	mysqli_query($con, $reg);
	echo "Registration Successful";
}
?>