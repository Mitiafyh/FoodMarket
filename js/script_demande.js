window.addEventListener("load", function () { 
    var addCartButtons = document.querySelectorAll(".add_cart");
    addCartButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            var productContainer =this.closest(".product-item").querySelector(".product-qty"); 
            var productId = productContainer.querySelector("input[id='produit']");
            var quantity = productContainer.querySelector("input[name='quantity']");
            console.log("Product ID:", productId.value);
            console.log("Quantity:", quantity.value);
            sendData(productId.value, quantity.value);
        });
    });

});

function sendData(product_id, quantity) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "traitement_demande.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("Data sent successfully");
        }
    };
    var data = "id_produit=" + encodeURIComponent(product_id) + "&demande=" + encodeURIComponent(quantity);
    xhr.send(data);
}