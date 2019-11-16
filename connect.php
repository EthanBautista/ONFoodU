<?php
include 'autoload.php';
$servername = env('DB_HOST');
$username = env('DB_USERNAME');
$password = env('DB_PASSWORD');
$dbname = env('DB_NAME');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

$sql = "SELECT RestoName, FoodName, Price FROM AllMenu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Restaurant Name: " . $row["RestoName"]. " - Food: " . $row["FoodName"]. " " . $row["Price"]. "<br>";
    }
} else {
    echo "0 results";
}
?>

