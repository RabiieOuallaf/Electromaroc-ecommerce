/* === Store product id in local storage in order to use it later === */


const cart_buttons = document.querySelectorAll("#cart-btn");
var localStorageData = [];


for(let cart_button of cart_buttons){
    cart_button.addEventListener("click", _ => {
        let productID = cart_button.dataset.id;
        if(!localStorageData.includes(productID)){
            
            localStorageData.push({

                "product_id" : cart_button.dataset.id,
                "product-name": cart_button.dataset.name,
                "product-description": cart_button.dataset.description,
                "product-image": cart_button.dataset.image,
                "product-price": cart_button.dataset.price,
                "product-quantity": cart_button.dataset.quantity
    
            });
            localStorage.setItem("product-id" , JSON.stringify(localStorageData));
        }
        

    });
}


/* === Diplay products in the cart === */

const storedProduct = localStorage.getItem("product-id");
const products = JSON.parse(storedProduct);
// const products_list = document.getElementById("products-list");
const products_summary = document.getElementById("product-summary");

var product_list_content = "";

const products_form = document.getElementById('products_form');
const div = document.createElement('div');

var products_summary_data = JSON.parse(localStorage.getItem("order"));
var products_summary_length = products.length;
// if products_summary_data > 0
console.log(products_summary_length);


for(let i = 0; i < products_summary_length; i++){
    product_list_content += `
        <div class="order-informations flex gap-6 my-10">
            <input type="number" name="productId" value="${products[i]["product-id"]}" style="display:none;">
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
                    <input type="number" name="productPrice" value="${products[i]["product-price"]}" style="display:none;">
                    <span class="font-light text-sm" id="product-price">${products[i]["product-price"]}$</span>
                </div>
            </div>
        <!-- === order quantity === -->
            <div class="order-quantity ml-6">
                <span class="mx-1 p-2 border cursor-pointer text-xl font-semibold" id="plusButton" data-id="${products[i]["product_id"]}">+</span>
                <span id="quantity" data-quantity=${products[i]["product-quantity"]}>${products[i]["product-quantity"]}</span>
                <span class="mx-1 p-2 border cursor-pointer text-xl font-semibold" id="minusButton" data-id="${products[i]["product_id"]}">-</span>
                <span class="mx-1 p-2 border cursor-pointer text-xl font-semibold text-red-500" id="cancelButton" data-id="${products[i]["product_id"]}">X</span>
            </div>
        </div>
    `;
}



products_summary.innerHTML = product_list_content;


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
        

        if(storedProduct.includes(product_set_id)){

            var productPosition = products.findIndex(obj => obj.product_id === product_set_id); // to take the product's position in the array 
            if(productPosition !== -1){

                products.splice(productPosition, 1);
                localStorage.setItem("order" , JSON.stringify(products));
            }
        }

    });
}

/* === displayProducts with status === */ 

(function displayProducts() {
    const xml = new XMLHttpRequest();

    xml.open('GET', 'http://localhost:9000/controller/Orders.php?orderstatus=1', false);


    xml.onload = function() {
        if(xml.DONE)  {
            console.log(JSON.stringify(xml.response));
        }else{
            console.log("an error occured on request");
        }
    }

    xml.send();

})()

/* === confirme the order === */ 

function buyProduct() {
    
    const xml = new XMLHttpRequest();

    xml.open('POST', 'http://localhost:9000/controller/Orders.php', false);


    xml.onload = function() {
        if(xml.DONE) {
            console.log('done');
        }else{
            console.log('not done');
        }
    }

    const data = JSON.stringify(products_summary_data);

    xml.send(data);

}





