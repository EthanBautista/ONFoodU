<?php 
    session_start();
    include 'autoload.php';
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
        echo "<div><h3>".$_SESSION["name"]." Account Page</h3></div>"; ?>

        <div id="AddBalance">
            <h3>Manage Balance</h3>
            <?php

            // Create connection
            $conn = new mysqli(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_NAME'));

            // Check connection
            if ($conn->connect_error) {
                echo "<p>Connection Failed</p>";
                die("Connection failed: " . $conn->connect_error);
            }

            $sqlQuery = "SELECT Balance FROM Accounts WHERE ID=1";
            $result = $conn->query($sqlQuery);
            $row = mysqli_fetch_assoc($result);
            echo "Balance $".$row['Balance'];
            mysqli_close($conn);
            ?>


        </div>
        <h3>Orders</h3>
        <div id="menuListing"></div>

        <script>
            apiURL = "./api.php?QueryNum=3&View=AccountOrders";
            loadMenu(apiURL);
        </script>
        <a href="logout.php">Logout</a>
    <?php }?>
    </section>



</body>

</html>