function addCart(itemID){
    $.ajax({
        crossOrigin: false,
        url: "addCart.php",
        type: "POST",
        data: {id: itemID},
    }).done(function(data) {
            // Do stuff when the AJAX call returns
            console.log(data);
            updateCart(data);
    });
}

function removeCart(itemID){
    $.ajax({
        crossOrigin: false,
        url: "removeCart.php",
        type: "POST",
        data: {id: itemID},
    }).done(function(data) {
            // Do stuff when the AJAX call returns
            console.log(data);
            updateCart(data);
    });
}

function addtodb(Total,restoNum){
    $.ajax({
        crossOrigin: false,
        url: "addtodb.php",
        type: "POST",
        data: {total: Total,
               restoArr: restoNum},
    }).done(function(data) {
            // Do stuff when the AJAX call returns
            sentOrder(data);
    });
}

function updateCart(cartData){
    var parsedJson = JSON.parse(cartData);
    restoArr = [];
    tableArr = [];
    total = [];
    for (var y = 0; y < parsedJson.length; y++){
        if (!restoArr.includes(parsedJson[y].restoNum)){
            restoArr.push(parsedJson[y].restoNum);
            total[y] = 0;
        }
    }
    console.log(restoArr);
    console.log(total);
    for (var x = 0; x < restoArr.length; x++){
        var tableHTML = "<table class='cartTable'><tr><th>Restaurant Name</th><th>Item</th><th>Quantity</th><th>Price</th><th>Total</th></tr>";

        for(var i = 0; i < parsedJson.length; i++){
            if (restoArr[x] == parsedJson[i].restoNum){
                total[x] += parseFloat(parsedJson[i].total);
                total[x] = total[x] * 1.13;
                tableHTML = tableHTML + "<tr>" +
                    "<td>" + parsedJson[i].resto + "</td>" +
                    "<td>" + parsedJson[i].name + "</td>" +
                    "<td>" + parsedJson[i].qty + "</td>" +
                    "<td>$" + parsedJson[i].price + "</td>" +
                    "<td>" + parsedJson[i].total + "</td>" +
                    "<td> <input type='button' onClick='removeCart("+parsedJson[i].id+")' value='remove'/></td>";
                    //"<td>" + parsedJsonMenu[i] + "</td>" +
                    //"<td>" + parsedJsonMenu[i] + "</td>" +
                    
                    

            }
        }

        tableHTML += "</tr><tr class='total'><td></td><td></td><td></td><td>After HST:</td> <td>"+ total[x].toFixed(2) +"</td></tr>";
        tableHTML += "</table><br>";
        
        total[x] = total[x].toFixed(2);
        tableArr[x] = tableHTML;
}
    var fullTable = "";
    for (var j = 0; j < tableArr.length; j++){
        fullTable = fullTable+tableArr[j];
    }
    
    strTotal = JSON.stringify(total);
    strRestoArr = JSON.stringify(restoArr);
    fullTable += "<input type='button' onClick=addtodb('"+strTotal+"','"+ strRestoArr+"') value='Checkout'>";
    
    console.log(fullTable);
    document.getElementById("cart").innerHTML = fullTable;
    //document.getElementById("cart").innerHTML = tableHTML;
}

function sentOrder(cartData){
    document.getElementById("cart").innerHTML = cartData;
}
