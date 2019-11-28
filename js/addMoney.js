function addMoney(){

    var addAmount = document.getElementById("addAmount").value;
    var nameLength = document.getElementById("name").value.length;
    var ccNum = document.getElementById("ccnum").value.length;

    //console.log("Adding $" + addAmount);

    if(addAmount >= 0 && nameLength > 0 && ccNum >= 12){
        $.ajax({
            crossOrigin: false,
            url: "addBalance.php",
            type: 'POST',
            data: {addAmount: document.getElementById("addAmount").value},
        }).done(function() {
            alert("Successfully added $"+document.getElementById("addAmount").value);
            location.reload();
        });
    } else {
        alert("Make sure all payment information is filled in correctly!");
    }


}