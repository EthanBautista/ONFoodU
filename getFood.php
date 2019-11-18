<?php
include "config.php";

$restoid = $_POST['resto'];   // department id

$sql = "SELECT ItemID,FoodName FROM Menu WHERE RestoNum=".$restoid;

$result = mysqli_query($con,$sql);

$resto_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $foodid = $row['ItemID'];
    $name = $row['FoodName'];

    $resto_arr[] = array("id" => $foodid,"name" => $name);
}

// encoding array to json format
echo json_encode($resto_arr);
?>