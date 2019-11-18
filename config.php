<?php
include 'autoload.php';
// Create connection
$con = new mysqli(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_NAME'));

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>

