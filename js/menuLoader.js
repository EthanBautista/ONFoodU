//var apiURL = "../api.php?QueryNum=2&Location=DC%20Caf";
//loadMenu(apiURL);

function loadMenu(apiURL){
    console.log("Getting " +apiURL);
    $.ajax({
        crossOrigin: false,
        url: apiURL,
        type: 'GET'
    }).done(function(data) {
        menuPrint(data, apiURL);
        
    });

    function menuPrint(jsonData, apiURL){
        //console.log(jsonData);
        var parsedJsonMenu = JSON.parse(jsonData);

        const url0 = "./api.php?QueryNum=0";
        const url1 = "./api.php?QueryNum=2&Location=UA";
        const url2 = "./api.php?QueryNum=2&Location=UB%20Caf";
        const url3 = "./api.php?QueryNum=2&Location=DC%20Caf";
        const url4 = "./api.php?QueryNum=3&View=CheapFood";
        const url5 = "./api.php?QueryNum=3&View=RestoLocations";
        const url6 = "./api.php?QueryNum=3&View=LowCal";
        const url7 = "./api.php?QueryNum=2&Location=Library";
        const url8 = "./api.php?QueryNum=2&Location=Student%20Center";

        var tableHTML = "";
        var i = 0;

        //Display without orders add column
        if(url0 === apiURL || url4 === apiURL || url6 === apiURL){

            tableHTML = "<table class='menuTable'><tr><th>Restaurant Name</th><th>Food Item</th><th>Price</th><th>Calories</th><th>Description</th><th>Location</th></tr>";
            for(i = 0; i < parsedJsonMenu.length; i++){
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

            }
            tableHTML += "</table>";
        }

        //Display with order column
        if(url1 === apiURL || url2 === apiURL || url3 === apiURL || url7 === apiURL || url8 === apiURL){

            tableHTML = "<table class='menuTable'><tr><th>Restaurant Name</th><th>Food Item</th><th>Price</th><th>Calories</th><th>Description</th><th>Location</th><th></th></tr>";
            for(i = 0; i < parsedJsonMenu.length; i++){
                    tableHTML = tableHTML + "<tr>" +
                        "<td>" + parsedJsonMenu[i].RestoName + "</td>" +
                        "<td>" + parsedJsonMenu[i].FoodName + "</td>" +
                        "<td>$" + parsedJsonMenu[i].Price + "</td>" +
                        "<td>" + parsedJsonMenu[i].Calories + " kcal</td>" +
                        "<td>" + parsedJsonMenu[i].Description + "</td>" +
                        "<td>" + parsedJsonMenu[i].Location + "</td>" +
                        //"<td>" + parsedJsonMenu[i] + "</td>" +
                        //"<td>" + parsedJsonMenu[i] + "</td>" +
                        "<td><form name='addToCartForm' onsubmit ='return false'>"+
                        "<input type='submit' class='add' onclick=addCart('"+parsedJsonMenu[i].ItemID +"') value='Add'/></form></td>" +
                        "</tr>";
            }
            tableHTML += "</table>";
        }

        //Display Location and Resto Name
        if(url5 === apiURL){
            tableHTML = "<table class='menuTable'><tr><th>Restaurant Name</th><th>Location</th></tr>";
            for(i = 0; i < parsedJsonMenu.length; i++){
                tableHTML = tableHTML + "<tr>" +
                    "<td>" + parsedJsonMenu[i].RestoName + "</td>" +
                    //"<td>" + parsedJsonMenu[i].FoodName + "</td>" +
                    //"<td>$" + parsedJsonMenu[i].Price + "</td>" +
                    //"<td>" + parsedJsonMenu[i].Calories + " kcal</td>" +
                    //"<td>" + parsedJsonMenu[i].Description + "</td>" +
                    "<td>" + parsedJsonMenu[i].Location + "</td>" +
                    //"<td>" + parsedJsonMenu[i] + "</td>" +
                    //"<td>" + parsedJsonMenu[i] + "</td>" +
                    "</tr>";
            }
            tableHTML += "</table>";
        }


        //Hide or show google map
        var mapObj = document.getElementById('map');
        if(url5 === apiURL){
            console.log("hiding");
            if($(mapObj).hasClass("hide")){
                $(mapObj).removeClass("hide");
            }
        } else {
            if(!$(mapObj).hasClass("hide")){
                $(mapObj).addClass("hide");
            }
        }


        //console.log(tableHTML);

        document.getElementById("menuListing").innerHTML = tableHTML;


    }
}
