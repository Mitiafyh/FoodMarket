window.addEventListener("load", function () { 
    var addCartButtons = document.querySelectorAll(".jadore");
    addCartButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            var productContainer =this.closest(".product-item").querySelector(".product-qty"); 
            var productId = productContainer.querySelector("input[id='produit']");
            var content=this.closest(".product-item");
            var like = productContainer.querySelector("input[name='like']");
            
            console.log("Product ID:", productId.value);
            console.log("like:", like.value);
            sendData(productId.value, like.value);
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