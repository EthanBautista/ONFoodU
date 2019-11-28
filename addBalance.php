<?php
session_start();

if(isset($_SESSION["id"])){

    include 'autoload.php';

    // Create connection
    $conn = new mysqli(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_NAME'));

    // Check connection
    if ($conn->connect_error) {
        echo "<p>Connection Failed</p>";
        die("Connection failed: " . $conn->connect_error);
    }
    
    //Check if get or post
    if(isset($_GET['addAmount'])){
        $sqlQuery = "UPDATE Accounts SET Balance = Balance +".$_GET["addAmount"]." WHERE ID=".$_SESSION['id'];
    } else if(isset($_POST['addAmount'])){
        $sqlQuery = "UPDATE Accounts SET Balance = Balance +".$_POST["addAmount"]." WHERE ID=".$_SESSION['id'];
    }


    if ($conn->query($sqlQuery) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}



?>