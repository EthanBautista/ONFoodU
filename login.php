<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONFoodU</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="./js/main.js"></script>
    <script src="./js/addMoney.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="./js/viewLoader.js"></script>
</head>

<body>
<header>
    <div class="topnav" id="myTopnav">
        <a href="index.php" >ONFoodU</a>
        <a href="menu.php">Menu</a>
        <?php if (isset($_SESSION["id"])) {
            echo "<a href='login.php'class='active' id='loginnav'>My Account</a>";
        } else {
            echo "<a href='login.php'class='active' id='loginnav'>Login</a>";
        } ?>
        <a href="javascript:void(0);" class="icon" onclick="navigation()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</header>
<section class="container">
    <?php if (!isset($_SESSION["id"])) { ?>
        <div class="login-box">
            <div class="row">
                <div class="col-md-6 login-left">
                    <h2>Login</h2>
                    <form action="validation.php" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" style="background-color: #003C72; color: white; width: 80px; height: 40px;">Login</button>
                    </form>
                </div>
                <div class="col-md-6 login-right">
                    <h2>Register</h2>
                    <form action="registration.php" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" style="background-color: #003C72; color: white; width: 80px; height: 40px;">Register</button>
                    </form>
                </div>
            </div>
        </div>
    <?php } else {
    $id = $_SESSION['id'];
    include 'config.php';
    
    $s = "select * from Accounts where ID = '$id'";
    $result= mysqli_query($con, $s);
    $num = mysqli_num_rows($result);
    if($num==1){
        while($row = mysqli_fetch_assoc($result)){
            $balance= $row["Balance"];
        }
    }
        mysqli_close($con);
        echo  "<div class='accHeader'>".$_SESSION["name"]."</div>";
        ?>

    <div class="balanceContainer">

        <div class="balanceHeader">Balance: <?php echo round($balance,2); ?></div>

    </div>
    
    <div id="addBalanceContainer">
        <form onsubmit="return false">
            <table class = "addBalanceT">
                <tr><th>Add Balance</th><th></th></tr>
                <tr><td>Credit Card Number:</td><td><input required type="number" class="ccnum" id="ccnum" name="ccnum" placeholder="123456789123"></td></tr>
                <tr><td> Name On Card:</td><td><input required type="text" class="ccnum" id="name" name="name" placeholder="Bob Builder"></td></tr>
                <tr><td> Add Amount:</td><td><input required type="number" class="ccnum" id="addAmount"></td></tr>
                <tr><td></td><td><button id="addMoney()" class="addMoney" onclick="addMoney()">Add Money</button></td></tr>
            </table>
        </form>

    </div>

    <div class="orderHeader">Orders</div>
    
    <section>
        <div class="rowlogin">
            <div class="column30">
                <div class="orderFilterContainer">
                    Filter
                    <a onclick="loadMenu('./api.php?QueryNum=1&UserID=<?php echo $id; ?>')">User Orders</a>
                    <a onclick="loadMenu('./api.php?QueryNum=3&View=AccountOrders')">All Orders</a>
                    <a onclick="loadMenu('./api.php?QueryNum=3&View=OrdersWItems')">Orders with Items</a>
                    <a onclick="loadMenu('./api.php?QueryNum=3&View=OrdersOneItemMore')">More than One Item</a>

                </div>
            </div>

            <div class="column70">
                <div id="menuListing">

                </div>
            </div>
        </div>
    </section>

    <div id="menuListing">

    </div>
    <script>
        window.onload = function () {
            <?php $loadURL = "./api.php?QueryNum=1&UserID=" . $id;
                    echo "loadMenu('" . $loadURL . "')";?>
            };
    </script>
        <a href="logout.php" class="logout">Logout</a>
        <?php }?>
        
</section>

</body>
</html>