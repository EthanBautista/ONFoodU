<?php
session_start();

if(isset($_SESSION["id"])){

    include 'config.php';
    
if(isset($_POST['id'])){
    $foodID = $_POST['id'];
        $sqlQuery = "SELECT ItemID, Restaurants.RestoNum, Restaurants.RestoName, FoodName, Price, Restaurants.Location
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
                $restoNum = $row["RestoNum"];
            }
        }

        if(isset($_SESSION['cart'.$location])){
            $item_array_id = array_column($_SESSION['cart'.$location], 'id');
            // if item doesnt exist in the cart, add new array to the cart
            if(!in_array($foodID, $item_array_id)){
                $count = count($_SESSION['cart'.$location]);
                $item_array = array(
                    'id' => $foodID,
                    'restoNum' => $restoNum,
                    'name' => $name,
                    'location' => $location,
                    'qty' => 1,
                    'resto' => $resto,
                    'price' => $price,
                    'total' => $price
                );
                $_SESSION['cart'.$location][$count] = $item_array;
                $_SESSION['restoLoc'] = $location;

            }else{
                // If item exists, find array and update qty & price
                $key = array_search($foodID, $item_array_id);
                $_SESSION['cart'.$location][$key]['qty'] = $_SESSION['cart'.$location][$key]['qty'] + 1;
                $_SESSION['cart'.$location][$key]['total'] = $_SESSION['cart'.$location][$key]['price'] * $_SESSION['cart'.$location][$key]['qty'];
                $_SESSION['cart'.$location][$key]['total'] = round($_SESSION['cart'.$location][$key]['total'], 2);
            }
        }else{
            // when cart doesnt exist create array
            $item_array = array(
                'id' => $foodID,
                'restoNum' => $restoNum,
                'name' => $name,
                'location' => $location,
                'qty' => 1,
                'resto' => $resto,
                'price' => $price,
                'total' => $price
                
            );
            $_SESSION['cart'.$location][0] = $item_array;
            $_SESSION['restoLoc'] = $location;
        }
        echo json_encode($_SESSION['cart'.$location]);
    }


    $con->close();
}



?>