$("body").delegate("#addtowishlist", "click", function(event) {
    event.preventDefault();
    var productId = $(this).attr("pid");

    $.ajax({
        url: "action.php",
        method: "GET",
        data: {
            addtowishlist: 1,
            pid: productId
        },
        success: function(data) {
            window.location.reload();
        }
    })
});

$("body").delegate("#removefromwishlist", "click", function(event) {
    event.preventDefault();
    var productId = $(this).attr("pid");

    $.ajax({
        url: "action.php",
        method: "GET",
        data: {
            removefromwishlist: 1,
            pid: productId
        },
        success: function(data) {
            window.location.reload();
        }
    })
});

$("body").delegate("#category_delete", "click", function(event) {
    event.preventDefault();
    var categoryId = $(this).attr("cid");

    $.ajax({
        url: "action.php",
        method: "GET",
        data: {
            removefromcategory: 1,
            cid: categoryId
        },
        success: function(data) {
            alert(data);
            window.location.reload();
        }
    })
});

$("body").delegate("#addtocart", "click", function(event) {
    event.preventDefault();
    var productId = $(this).attr("pid");

    $.ajax({
        url: "action.php",
        method: "GET",
        data: {
            addtocart: 1,
            pid: productId
        },
        success: function(data) {
            window.location.reload();
        }
    })
});

$("body").delegate("#sendDelivery", "click", function(event) {
    event.preventDefault();
    var orderId = $(this).attr("oid");

    $.ajax({
        url: "action.php",
        method: "GET",
        data: {
            orderDelivery: 1,
            oid: orderId
        },
        success: function(data) {
            window.location.reload();
        }
    })
});

$("body").delegate("#deleteOrder", "click", function(event) {
    event.preventDefault();
    var orderId = $(this).attr("oid");

    $.ajax({
        url: "action.php",
        method: "GET",
        data: {
            orderDelete: 1,
            oid: orderId
        },
        success: function(data) {
            window.location.reload();
        }
    })
});

$("body").delegate("#removeFromCart", "click", function(event) {
    event.preventDefault();
    var productId = $(this).attr("pid");

    $.ajax({
        url: "action.php",
        method: "GET",
        data: {
            removefromcart: 1,
            pid: productId
        },
        success: function(data) {
            window.location.reload();
        }
    })
});

$("body").delegate("#btn-checkout", "click", function(event) {
    event.preventDefault();
    var productIds = $(this).attr("idArray");

    var productIdsArray = JSON.parse(productIds);

    var quantities = document.querySelectorAll("#shopping-cart-table input[type=number]");

    var prices = document.querySelectorAll("#shopping-cart-table input[type=text]");

    var quantityArray = [];
    var priceArray = [];

    for(var i = 0; i < quantities.length; i++){
        var quantity = quantities[i].value;
        var price = prices[i].value;

        quantityArray[i] = quantity;
        priceArray[i] = price;

    }

    $.ajax({
        url: "action.php",
        method: "GET",
        data: {
            checkout: 1,
            ids: productIdsArray,
            quantityArray : quantityArray,
            priceArray : priceArray
        },
        success: function(data) {
            window.location.href = "buyer_pending_orders.php";
        }
    })

});

function cart() {
    var quantities = document.querySelectorAll("#shopping-cart-table input[type=number]");

    var prices = document.querySelectorAll("#shopping-cart-table input[type=text]");
    var total = 0;
    for(var i = 0; i < quantities.length; i++){
        var quantity = quantities[i].value;
        var price = prices[i].value;

        var productprice = (quantity * price);
        total += productprice;
    }
    document.getElementById("total-checkout").innerText = total;
}

$("body").delegate("#becomeSeller", "click", function(event) {
    event.preventDefault();
    $.ajax({
        url: "action.php",
        method: "GET",
        data: {
            becomeSeller: 1
        },
        success: function(data) {
            window.location.reload();
        }
    })
});

