<?php
include 'autoload.php';

// Create connection
$conn = new mysqli(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_NAME'));

// Check connection
if ($conn->connect_error) {
    echo "<p>Connection Failed</p>";
    die("Connection failed: " . $conn->connect_error);
}
//echo "<p>Connected successfully to database</p>";



//Picks which query to perform based on QueryNum set by pram
$queryNumber = $_GET['QueryNum'];
switch ($queryNumber) {
    case 0:
        //Query gets the entire menu for all restaurants including restoname and location
        //Takes no additional get pram
        $sqlQuery = "SELECT * FROM `ALlMenu`";
        jsonReponse($conn, $sqlQuery);
        break;
    case 1:
        //Query gets orders placed by a particular user with the following details
        //OrderID, FoodName, Food Description, Food Calories, Food Price, Food Quantity
        //Takes UserID set by Get pram
        caseOneQuery($conn);
        break;
    case 2:
        //add query handler here
        break;
    case 3:
        //add query handler here
        break;
    case 4:
        //add query handler here
        break;
    default:
        printError();
        break;
}

//Takes sql query and prints it as json
function jsonReponse($conn, $sqlQuery){
    $result = $conn->query($sqlQuery);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
}

//Standard Query Error Message
function printError() {
    echo json_encode(array("Bad Request", "Invalid Query Number"));
}

function caseOneQuery($conn){
    if(isset($_GET['UserID']) && !empty($_GET['UserID'])){
        $sqlQuery = "
            SELECT Orders.OrderID, Menu.FoodName, Menu.Description, Menu.Calories, Menu.Price, OrderItems.Quantity
            FROM Accounts
            INNER JOIN Orders ON Accounts.ID=Orders.AccountID
            INNER JOIN OrderItems ON Orders.OrderID=OrderItems.OrderID
            INNER JOIN Menu ON OrderItems.ItemID=Menu.ItemID
            WHERE Accounts.ID=".$_GET['UserID']."
            ORDER BY Orders.OrderID";
        jsonReponse($conn, $sqlQuery);
    } else {
        echo json_encode(array("Bad Request", "UserID not set or empty"));
    }
}

?>