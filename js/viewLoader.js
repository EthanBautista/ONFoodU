//var apiURL = "../api.php?QueryNum=2&Location=DC%20Caf";
//loadMenu(apiURL);

function loadMenu(apiURL) {
    console.log("Getting " + apiURL);
    $.ajax({
        crossOrigin: false,
        url: apiURL,
        type: 'GET'
    }).done(function (data) {
        menuPrint(data);

    });

    function menuPrint(jsonData) {
        //console.log(jsonData);
        var parsedJsonMenu = JSON.parse(jsonData);

        if (apiURL === "./api.php?QueryNum=3&View=AccountOrders") {
            var tableHTML = "<table class='orderTable'><tr><th>ID</th><th>Name</th><th>Order ID</th><th>FoodName</th><th>Quantity</th></tr>";
            for (var i = 0; i < parsedJsonMenu.length; i++) {
                tableHTML = tableHTML + "<tr>" +
                    "<td>" + parsedJsonMenu[i].ID + "</td>" +
                    "<td>" + parsedJsonMenu[i].Name + "</td>" +
                    "<td>" + parsedJsonMenu[i].OrderID + "</td>" +
                    "<td>" + parsedJsonMenu[i].FoodName + "</td>" +
                    "<td>" + parsedJsonMenu[i].Quantity + "</td>" +
                    "</tr>";
            }
        } else if (apiURL === "./api.php?QueryNum=3&View=OrdersWItems") {
            // Fix headers
            var tableHTML = "<table class='orderTable'><tr><th>Order Id</th></tr>";
            for (var i = 0; i < parsedJsonMenu.length; i++) {
                tableHTML = tableHTML + "<tr>" +
                    "<td>" + parsedJsonMenu[i].OrderID + "</td>" +
                    "</tr>";
            }
        } else if (apiURL === "./api.php?QueryNum=3&View=OrdersOneItemMore") {
            // Fix headers
            var tableHTML = "<table class='orderTable'><tr><th>Order ID</th><th>Account ID</th><th>Resto Num</th><th>Date</th></tr>";
            for (var i = 0; i < parsedJsonMenu.length; i++) {
                tableHTML = tableHTML + "<tr>" +
                    "<td>" + parsedJsonMenu[i].OrderID + "</td>" +
                    "<td>" + parsedJsonMenu[i].AccountID + "</td>" +
                    "<td>" + parsedJsonMenu[i].RestoNum + "</td>" +
                    "<td>" + parsedJsonMenu[i].currentDate + " </td>" +
                    "</tr>";
            }
        

    } else{
        // Fix headers
        var tableHTML = "<table class='orderTable'><tr><th>Order ID</th><th>Food Name</th><th>Description</th><th>Calories</th><th>Price</th><th>Quantity</th></tr>";
        for (var i = 0; i < parsedJsonMenu.length; i++) {
            tableHTML = tableHTML + "<tr>" +
                "<td>" + parsedJsonMenu[i].OrderID + "</td>" +
                "<td>" + parsedJsonMenu[i].FoodName + "</td>" +
                "<td>" + parsedJsonMenu[i].Description + "</td>" +
                "<td>" + parsedJsonMenu[i].Calories + " kcal</td>" +
                "<td>" + parsedJsonMenu[i].Price + "</td>" +
                "<td>" + parsedJsonMenu[i].Quantity + "</td>" +
                "</tr>";
        }
    }
    //console.log(tableHTML);
    tableHTML += "</table>";

    document.getElementById("menuListing").innerHTML = tableHTML;
}
}