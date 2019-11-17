<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONFoodU</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/js/main.js"></script>
</head>

<body>
    <header>
        <div class="topnav" id="myTopnav">
            <a href="index.html">ONFoodU</a>
            <a href="menu.php" class="active">Menu</a>
            <a href="login.html">Login</a>
            <a href="javascript:void(0);" class="icon" onclick="navigation()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </header>
    <section>
        <div class="row">
            <div class="column25">
                <div class="FilterContainer">
                    <h2>Filter</h2>
                    <a href="./menus/menu.php">All</a>
                    <a href="./menus/uaMenu.html">UA</a>
                    <a href="./menus/ubMenu.html">UB</a>
                    <a href="./menus/dcCafMenu.html">UA</a>
                    <a href="./menus/uaMenu.html">UA</a>
                </div>
            </div>

            <div class="column75">
                <?php 
                    include 'connect.php';
                ?>
        </div>
        </div>
    </section>
</body>

</html>