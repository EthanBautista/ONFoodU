<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONFoodU</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="main.js"></script>
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
            <?php 
            include 'connect.php';
            ?>
    </section>
</body>
</html>
