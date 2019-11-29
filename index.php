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
    <script src="./js/main.js"></script>
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
                <form id="UAForm" method="post" action="menu.php">
                    <input type="hidden" name="Location" value="UA">
                    <div class="grid-right" onclick="document.getElementById('UAForm').submit();">
                        <div class="locationText">
                            UA
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="row">

            <div class="column">
                <form id="UBCafForm" method="post" action="menu.php">
                    <input type="hidden" name="Location" value="UB%20Caf">
                    <div class="grid-left" onclick="document.getElementById('UBCafForm').submit();">
                        <div class="locationText">
                            UB Caf
                        </div>
                    </div>
                </form>
            </div>

            <div class="column">
                <form id="DCCafForm" method="post" action="menu.php">
                    <input type="hidden" name="Location" value="DC%20Caf">
                    <div class="grid-right" onclick="document.getElementById('DCCafForm').submit();">
                        <div class="locationText">
                            DC Caf
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="row">

            <div class="column">
                <form id="StudentCenterForm" method="post" action="menu.php">
                    <input type="hidden" name="Location" value="Student%20Center">
                    <div class="grid-left" onclick="document.getElementById('StudentCenterForm').submit();">
                        <div class="locationText">
                            Student Center
                        </div>
                    </div>
                </form>
            </div>

            <div class="column">
                <form id="LibraryForm" method="post" action="menu.php">
                    <input type="hidden" name="Location" value="Library">
                    <div class="grid-right" onclick="document.getElementById('LibraryForm').submit();">
                        <div class="locationText">
                            Library
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </section>
    <footer>
    </footer>
</body>
</html>