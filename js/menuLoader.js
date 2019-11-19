//var apiURL = "../api.php?QueryNum=2&Location=DC%20Caf";
//loadMenu(apiURL);

function loadMenu($apiURL){
    $.ajax({
        crossOrigin: false,
        url: apiURL,
        type: 'GET'
    }).done(function(data) {
        menuPrint(data);
    });

    function menuPrint(jsonData){
        console.log(jsonData);
        var parsedJsonMenu = JSON.parse(jsonData);

        var tableHTML = "<table class='menuTable'><tr><th>Restaurant Name</th><th>Food Item</th><th>Price</th><th>Calories</th><th>Description</th><th>Location</th><th></th></tr>";
        for(var i = 0; i < parsedJsonMenu.length; i++){
            if ($apiURL == "./api.php?QueryNum=0"){
                tableHTML = tableHTML + "<tr>" +
                    "<td>" + parsedJsonMenu[i].RestoName + "</td>" +
                    "<td>" + parsedJsonMenu[i].FoodName + "</td>" +
                    "<td>$" + parsedJsonMenu[i].Price + "</td>" +
                    "<td>" + parsedJsonMenu[i].Calories + " kcal</td>" +
                    "<td>" + parsedJsonMenu[i].Description + "</td>" +
                    "<td>" + parsedJsonMenu[i].Location + "</td>" +
                    //"<td>" + parsedJsonMenu[i] + "</td>" +
                    //"<td>" + parsedJsonMenu[i] + "</td>" +
                    "</tr>";
            }else{
                tableHTML = tableHTML + "<tr>" +
                    "<td>" + parsedJsonMenu[i].RestoName + "</td>" +
                    "<td>" + parsedJsonMenu[i].FoodName + "</td>" +
                    "<td>$" + parsedJsonMenu[i].Price + "</td>" +
                    "<td>" + parsedJsonMenu[i].Calories + " kcal</td>" +
                    "<td>" + parsedJsonMenu[i].Description + "</td>" +
                    "<td>" + parsedJsonMenu[i].Location + "</td>" +
                    //"<td>" + parsedJsonMenu[i] + "</td>" +
                    //"<td>" + parsedJsonMenu[i] + "</td>" +
                    "<td><input type='button' value='Add'></td>" +
                    "</tr>";
            }
        }
        console.log(tableHTML);
        tableHTML += "</table>";

        document.getElementById("menuListing").innerHTML = tableHTML;
    }
}
