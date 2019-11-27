<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONFoodU</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="./js/menuLoader.js"></script>
</head>

<body>
    <header>
        <div class="topnav" id="myTopnav">
            <a href="index.php">ONFoodU</a>
            <a href="menu.php" class="active">Menu</a>
            <a href="login.php" id="loginnav">Login</a>
            <a href="javascript:void(0);" class="icon" onclick="navigation()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </header>
    <section>
        <div class="row">
            <div class="column25">
                <div class="FilterContainer">
                    Filter
                    <a onclick="loadMenu('./api.php?QueryNum=0')">All</a>
                    <a onclick="loadMenu('./api.php?QueryNum=2&Location=UA')">UA</a>
                    <a onclick="loadMenu('./api.php?QueryNum=2&Location=UB%20Caf')">UB</a>
                    <a onclick="loadMenu('./api.php?QueryNum=2&Location=DC%20Caf')">DC Caf</a>
                    <a onclick="loadMenu('./api.php?QueryNum=3&View=CheapFood')">Cheap Food</a>
                    <a onclick="loadMenu('./api.php?QueryNum=3&View=Location')">Location</a>
                    <a onclick="loadMenu('./api.php?QueryNum=3&View=LowCal')">Low Calories</a>

                </div>
            </div>

            <div class="column75">
                <div id="menuListing">

                </div>

                <script>
                    function selectMenu(query) {
                        loadMenu(query);
                    }
                    window.onload = function () {
                        apiURL = "./api.php?QueryNum=0";
                        loadMenu(apiURL);
                    }
                </script>

            </div>
        </div>
    </section>
    <section class="orderContainer">
        <?php 
            include "config.php";
        ?>
        <div> Order Food </div>

    </section>
</body>

</html>