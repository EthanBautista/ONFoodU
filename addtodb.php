<?php
session_start();

if(isset($_SESSION["id"])){

    include 'config.php';

    $id = $_SESSION['id'];
    $location = $_SESSION['restoLoc'];
    // Get Balance
    $s = "select * from Accounts where ID = '$id'";
    $result= mysqli_query($con, $s);
    $row = mysqli_fetch_assoc($result);
    $balance= $row["Balance"];


    $total=json_decode($_POST['total'], true);
    $restoArr=json_decode($_POST['restoArr'], true);

    for ($i = 0; $i < count($restoArr); $i++){
        // Get resto ID
        $restoNum = $restoArr[$i];
        
        // Checks if enough balance
        if($balance >= $total[$i]){

            $sqlQuery = "INSERT INTO `Orders` (`OrderID`, `AccountID`, `RestoNum`, `currentDate`) VALUES (NULL, '$id', '$restoNum', NULL)";


            $sql = "UPDATE Accounts SET Balance = Balance -".$total[$i]." WHERE ID=".$id;
            mysqli_query($con, $sql);

            // Getitng order ID
            $sql = "SELECT MAX(`OrderID`) as maximum FROM `Orders`";
            $result= mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $orderID= $row["maximum"];

                    
                
            foreach ($_SESSION['cart'.$location] as $key => $value) {
            // 
                if($restoArr[$i] == $_SESSION['cart'.$location][$key]['restoNum']){
                    $itemID = $_SESSION['cart'.$location][$key]['id'];
                    $qty = $_SESSION['cart'.$location][$key]['qty'];
                    $query = "INSERT INTO `OrderItems` (`IndexNum`, `OrderID`, `ItemID`, `Quantity`) VALUES (NULL, '$orderID', '$itemID', '$qty')";
                    $result= mysqli_query($con, $query);
                }
            }
        }else{
            echo "Not Enough Balance";
        }
    }
    if (mysqli_query($con, $sqlQuery)){
        echo "Order Sent";
    }

    unset($_SESSION['cart'.$location]);
    mysqli_close($con);
}



?>