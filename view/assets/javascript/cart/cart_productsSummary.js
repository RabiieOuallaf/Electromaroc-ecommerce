



/* === Diplay products in the cart === */

const storedProduct = localStorage.getItem("products-cart-items");
const products = JSON.parse(storedProduct);
// const products_list = document.getElementById("products-list");
const products_summary = document.getElementById("product-summary");
const products_summary_info = document.getElementById("product-summary-info");

var product_list_content = "";

const products_form = document.getElementById('products_form');
const div = document.createElement('div');

var products_summary_length = products.length;
// if products_summary_data > 0



for(let i = 0; i < products_summary_length; i++){
    product_list_content += `
    <input type="text" name="productId" value="${products[i]["product-id"]}" style="display:none;">
        <div class="order-informations flex gap-6 my-10">
            <!-- === order image === -->
            <div class="order-img">
                <img  src="http://localhost:9000//view/assets/uploads/${products[i]["product-image"]}" alt="order image" class="w-24">
            </div>
            <!-- === order content === -->
            <div class="order-content">
                <div class="order-name">
                    <input type="text" name="productName" value="${products[i]["product-name"]}" style="display:none;">
                    <h4 class="font-semibold" id="product-name">${products[i]["product-name"]}</h4>
                </div>
                <div class="order-description">
                    <input type="text" name="productDescription" value="${products[i]["product-description"]}" style="display:none;">
                    <p class="font-medium text-sm" id="product-description">${products[i]["product-description"]}</p>
                </div>
                <div class="order-price">
                    <input type="text" name="productPrice" value="${products[i]["product-price"]}" style="display:none;">
                    <span class="font-light text-sm" id="product-price">${products[i]["product-price"]}$</span>
                    
                </div>
            </div>
        <!-- === order quantity === -->
            <div class="order-quantity ml-6">
                <span class="mx-1 p-2 border cursor-pointer text-xl font-semibold" id="plusButton" data-id="${products[i]["product_id"]}">+</span>
                <input type="text" name="productQuantity" value="${products[i]["product-quantity"]}" style="display:none;">
                <span id="quantity" data-quantity=${products[i]["product-quantity"]}>${products[i]["product-quantity"]}</span>
                <span class="mx-1 p-2 border cursor-pointer text-xl font-semibold" id="minusButton" data-id="${products[i]["product_id"]}">-</span>
                <span class="mx-1 p-2 border cursor-pointer text-xl font-semibold text-red-500" id="cancelButton" data-id="${products[i]["product_id"]}">X</span>
            </div>
        </div>
    `;
}



products_summary.innerHTML = product_list_content;
products_summary_info.innerHTML = product_list_content;
// loop over plus and minus buttons and add event listener to them 

const plus_button = document.querySelectorAll("#plusButton");
const minus_button = document.querySelectorAll("#minusButton");
const cancel_button = document.querySelectorAll("#cancelButton");

for(let plus of plus_button){
    plus.addEventListener("click" , _ => {
        
        plus.nextElementSibling.dataset.quantity++; // icrement the value of dataset-quantity property
        plus.nextElementSibling.innerHTML = plus.nextElementSibling.dataset.quantity; // display the new value to the end user
    })
}

for(let minus of minus_button){
    minus.addEventListener("click", _ => {
        minus.previousElementSibling.dataset.quantity > 0 && minus.previousElementSibling.dataset.quantity--; // decrement the value of dataset-quantity property
        minus.previousElementSibling.innerHTML = minus.previousElementSibling.dataset.quantity; // display the new value to the end user 
    })
}

for(let cancel of cancel_button){ 
    cancel.addEventListener("click", _ => {
        var product_set_id = cancel.dataset.id;
        cancel.parentNode.parentNode.remove();

        // check if product was stored in localStorage
        if(localStorage.getItem('products-cart-items')) { 
            let storedProducts = JSON.parse(localStorage.getItem("products-cart-items"));

            // get the position of the product to be removed
            let productPosition = storedProducts.findIndex(obj => obj.product_id === product_set_id);

            // Check if the product was found and then update the storedProducts array
            if(productPosition !== -1){
                storedProducts.splice(productPosition, 1);
                localStorage.setItem("products-cart-items", JSON.stringify(storedProducts));
            }
        }
    });
}



