<?php
include 'autoload.php';
// Create connection
$conn = new mysqli(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_NAME'));

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

$sql = "SELECT * FROM AllMenu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="menuTable"><tr><th>Restaurant Name</th><th>Food Item</th><th>Price</th><th>Calories</th><th>Description</th></tr>';
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["RestoName"]."</td><td>".$row["FoodName"]."</td><td>".$row["Price"]."</td><td>".$row["Calories"]."</td><td>".$row["Description"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>

