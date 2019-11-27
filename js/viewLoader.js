//var apiURL = "../api.php?QueryNum=2&Location=DC%20Caf";
//loadMenu(apiURL);

function loadMenu(apiURL){
    console.log("Getting " +apiURL);
    $.ajax({
        crossOrigin: false,
        url: apiURL,
        type: 'GET'
    }).done(function(data) {
        menuPrint(data);
        
    });

    function menuPrint(jsonData){
        //console.log(jsonData);
        var parsedJsonMenu = JSON.parse(jsonData);

        var tableHTML = "<table class='menuTable'><tr><th>Restaurant Name</th><th>Food Item</th><th>Price</th><th>Calories</th><th>Description</th><th>Location</th><th></th></tr>";
        for(var i = 0; i < parsedJsonMenu.length; i++){
            if (apiURL === "./api.php?QueryNum=3&View=AccountOrder"){
                tableHTML = tableHTML + "<tr>" +
                    "<td>" + parsedJsonMenu[i].ID + "</td>" +
                    "<td>" + parsedJsonMenu[i].Name + "</td>" +
                    "<td>$" + parsedJsonMenu[i].OrderID + "</td>" +
                    "<td>" + parsedJsonMenu[i].FoodName + " kcal</td>" +
                    "<td>" + parsedJsonMenu[i].Quantity + "</td>" +
                    "</tr>";
            }
            else if(apiURL === "./api.php?QueryNum=3&View=UserOrders"){
                tableHTML = tableHTML + "<tr>" +
                    "<td>" + parsedJsonMenu[i].OrderID + "</td>" +
                    "<td>" + parsedJsonMenu[i].FoodName + "</td>" +
                    "<td>$" + parsedJsonMenu[i].Description + "</td>" +
                    "<td>" + parsedJsonMenu[i].Calories + " kcal</td>" +
                    "<td>" + parsedJsonMenu[i].Price + "</td>" +
                    "<td>" + parsedJsonMenu[i].Quantity + "</td>" +
                    "</tr>";
            }
            else if(apiURL === "./api.php?QueryNum=3&View=OrdersWItems"){
                tableHTML = tableHTML + "<tr>" +
                    "<td>" + parsedJsonMenu[i].OrderID + "</td>" +
                    "</tr>";
            }
            else if(apiURL === "./api.php?QueryNum=3&View=OrdersOneItemMore"){
                tableHTML = tableHTML + "<tr>" +
                    "<td>" + parsedJsonMenu[i].OrderID + "</td>" +
                    "<td>" + parsedJsonMenu[i].AccountID + "</td>" +
                    "<td>$" + parsedJsonMenu[i].RestoNum + "</td>" +
                    "<td>" + parsedJsonMenu[i].Date + " kcal</td>" +
                    "</tr>";
            }
            
        }
        //console.log(tableHTML);
        tableHTML += "</table>";

        document.getElementById("menuListing").innerHTML = tableHTML;
    }
}
