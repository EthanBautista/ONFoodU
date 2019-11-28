<?php
session_start();

if(isset($_SESSION["id"])){

    include 'config.php';
    
    //Check if get or post
if(isset($_POST['id'])){
    $foodID = $_POST['id'];

    $sqlQuery = "SELECT ItemID, Restaurants.RestoName, FoodName, Price, Restaurants.Location
    FROM Menu , Restaurants
    WHERE Menu.RestoNum = Restaurants.RestoNum and ItemID=$foodID";
    // Get ID
    $result= mysqli_query($con, $sqlQuery);
    $num = mysqli_num_rows($result);
    if($num==1){
        while($row = mysqli_fetch_assoc($result)){
            $name= $row["FoodName"];
            $price = $row["Price"];
            $location = $row["Location"];
            $resto = $row["RestoName"];
        }
    }
        if(isset($_SESSION['cart'.$location])){
            $item_array_id = array_column($_SESSION['cart'.$location], 'id');
            $key = array_search($foodID, $item_array_id);

            if ($_SESSION['cart'.$location][$key]['qty'] > 1){
         
                $_SESSION['cart'.$location][$key]['qty']  -= 1;
                $_SESSION['cart'.$location][$key]['total'] = $_SESSION['cart'.$location][$key]['price'] * $_SESSION['cart'.$location][$key]['qty'];
                $_SESSION['cart'.$location][$key]['total'] = round($_SESSION['cart'.$location][$key]['total'], 2);
            }else{
          
                array_splice($_SESSION['cart'.$location], $key, 1);
            }
        }

        echo json_encode($_SESSION['cart'.$location]);
    }


    $con->close();
}



?>