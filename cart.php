<?php
session_start();

if(isset($_SESSION["id"])){

    include 'config.php';
    
    //Check if get or post
if(isset($_POST['id'])){
    $foodID = $_POST['id'];
        $sqlQuery = "SELECT `FoodName`, `Price` FROM `Menu` WHERE ItemID=$foodID";
        // Get ID
        $result= mysqli_query($con, $sqlQuery);
        $num = mysqli_num_rows($result);
        if($num==1){
            while($row = mysqli_fetch_assoc($result)){
                $name= $row["FoodName"];
                $price = $row["Price"];
            }
        }

        if(isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'], 'id');
            // if item doesnt exist in the cart, add new array to the cart
            if(!in_array($foodID, $item_array_id)){
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'id' => $foodID,
                    'name' => $name,
                    'qty' => 1,
                    'price' => $price,
                    'total' => $price
                );
                $_SESSION['cart'][$count] = $item_array;

            }else{
                // If item exists, find array and update qty & price
                $key = array_search($foodID, $item_array_id);
                $_SESSION['cart'][$key]['qty'] = $_SESSION['cart'][$key]['qty'] + 1;
                $_SESSION['cart'][$key]['total'] = $_SESSION['cart'][$key]['price'] * $_SESSION['cart'][$key]['qty'];
            }
        }else{
            // when cart doesnt exist create array
            $item_array = array(
                'id' => $foodID,
                'name' => $name,
                'qty' => 1,
                'price' => $price,
                'total' => $price
                
            );
            $_SESSION['cart'][0] = $item_array;
        }
        echo json_encode($_SESSION['cart']);
    }


    $con->close();
}



?>