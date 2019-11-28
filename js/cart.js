function addCart(itemID){
    $.ajax({
        crossOrigin: false,
        url: "cart.php",
        type: "POST",
        data: {id: itemID},
    }).done(function(data) {
            // Do stuff when the AJAX call returns
            console.log(data);
            updateCart(data);
    });
}

function updateCart(cartData){
    var parsedJson = JSON.parse(cartData);

    var tableHTML = "<table class='cartTable'><tr><th>Item</th><th>Quantity</th><th>Price</th><th>Total</th></tr>";

    for(i = 0; i < parsedJson.length; i++){
        tableHTML = tableHTML + "<tr>" +
            "<td>" + parsedJson[i].name + "</td>" +
            "<td>" + parsedJson[i].qty + "</td>" +
            "<td>$" + parsedJson[i].price + "</td>" +
            "<td>" + parsedJson[i].total + "</td>" +
            //"<td>" + parsedJsonMenu[i] + "</td>" +
            //"<td>" + parsedJsonMenu[i] + "</td>" +
            "</tr>";
    }
    tableHTML += "</table>";
    document.getElementById("cart").innerHTML = tableHTML;
}