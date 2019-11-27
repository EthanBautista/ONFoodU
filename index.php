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
    <script src="/js/main.js"></script>
</head>

<body>
    <header>
        <div class="topnav" id="myTopnav">
            <a href="index.php" class="active">ONFoodU</a>
            <a href="menu.php">Menu</a>
            <?php if (isset($_SESSION["id"])) { 
                echo "<a href='login.php' id='loginnav'>My Account</a>";
            } else { 
                echo "<a href='login.php' id='loginnav'>Login</a>";
             } ?>
            <a href="javascript:void(0);" class="icon" onclick="navigation()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </header>
    <section class="container">
        <h1></h1>
        <div class="row">
            <div class="column">
                <a href="menu.php">
                    <div class="grid-left">
                        <div class="locationText">
                            ALL
                        </div>
                    </div>
                </a>
            </div>
            <div class="column">
                <a href="./menus/uaMenu.html">
                    <div class="grid-right">
                        <div class="locationText">
                            UA
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <a href="./menus/ubMenu.html">
                    <div class="grid-left">
                        <div class="locationText">
                            UB CAF
                        </div>
                    </div>
                </a>
            </div>
            <div class="column">
                <a href="./menus/dcCafMenu.html">
                    <div class="grid-right">
                        <div class="locationText">
                            DC CAF
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <a href="./menus/studentCenterMenu.html">
                    <div class="grid-left">
                        <div class="locationText">
                            Student Center
                        </div>
                    </div>
                </a>
            </div>
            <div class="column">
                <a href="menu.html">
                    <div class="grid-right">
                        <div class="locationText">
                            Library
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </section>
    <footer>

    </footer>
</body>
</html>