



/* === Diplay products in the cart === */

const storedProduct = localStorage.getItem("products-cart-items");
const products = JSON.parse(storedProduct) || 0;
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
        <input type="text" name="productId[]" value="${products[i]["product_id"]}" style="display:none;">
        <div class="order-informations flex gap-6 my-10">
            <!-- === order image === -->
            <div class="order-img">
                <img  src="http://localhost:9000//view/assets/uploads/${products[i]["product_image"]}" alt="order image" class="w-24">
                
            </div>
            <!-- === order content === -->
            <div class="order-content">
            <div class="order-name">
            <input type="text" name="productName[]" value="${products[i]["product_name"]}" style="display:none;">
            <h4 class="font-semibold" id="product-name">${products[i]["product_name"]}</h4>
            </div>
                <div class="order-description">
                    <input type="text" name="productDescription[]" value="${products[i]["product_description"]}" style="display:none;">
                    <p class="font-medium text-sm" id="product-description">${products[i]["product_description"]}</p>
                </div>
                <div class="order-price">
                    <input type="text" name="productPrice[]" value="${products[i]["product_price"]}" style="display:none;">
                    <span class="font-light text-sm" id="product-price">${products[i]["product_price"]}$</span>
                    
                    </div>
                    </div>
                    <!-- === order quantity === -->
                    <div class="order-quantity ml-6">
                <input type="number" name="productQuantity[]" id="productQuantity" value="${products[i]['product_quantity']}" style="display:none;">
                <span class="mx-1 p-2 border cursor-pointer text-xl font-semibold" id="plusButton" data-id="${products[i]["product_id"]}">+</span>
                <span id="quantity" data-quantity=${products[i]["product_quantity"]}>${products[i]["product_quantity"]}</span>
                <span class="mx-1 p-2 border cursor-pointer text-xl font-semibold" id="minusButton" data-id="${products[i]["product_id"]}">-</span>
                <span class="mx-1 p-2 border cursor-pointer text-xl font-semibold text-red-500" id="cancelButton" data-id="${products[i]["product_id"]}">X</span>
            </div>

            <div class="button my-6 mx-3 hidden" id="cart-btn" data-id="${products[i]["product_id"]}" data-name="${products[i]["product_name"]}" data-description="${products[i]["product_description"]}" data-price="${products[i]["product_price"]}" data-image="${products[i]["product_image"]}" data-quantity="${products[i]["product_quantity"]}">
                <button class="border-2 border-stone-800 rounded-full px-3 py-1 hover:text-lime-700 hover:border-lime-800">Add to cart</button>
            </div>

        </div>
        `;
    }
    
    
    function updaeTotalPrice(){
        let storedProducts = JSON.parse(localStorage.getItem("products-cart-items"));
        let totalPrice = 0;
    
    
        storedProducts.forEach(product => {
            totalPrice += Number(product['product_price']) * Number(product['product_quantity']);
        });
        ;
        return totalPrice;
    }

        
    

products_summary.innerHTML = product_list_content;
products_summary_info.innerHTML = product_list_content;

// loop over plus and minus buttons and add event listener to them 
const plus_button = document.querySelectorAll("#plusButton");
const minus_button = document.querySelectorAll("#minusButton");
const cancel_button = document.querySelectorAll("#cancelButton");
const cartButton = document.querySelectorAll("#cart-btn")
const productQuantity = document.querySelectorAll('#productQuantity');
const totalPrice = document.getElementById('totalPrice');

totalPrice.innerHTML = updaeTotalPrice();

for(let plus of plus_button){
    plus.addEventListener("click" , _ => {

        plus.nextElementSibling.dataset.quantity++; // icrement the value of dataset-quantity property
        plus.nextElementSibling.innerHTML = Number(plus.nextElementSibling.dataset.quantity); // display the new value to the end user


        let localStorageData = JSON.parse(localStorage.getItem('products-cart-items'));

        if(localStorageData === null) {
            localStorageData = []
        }

        let productsData = []

        for(let i = 0; i < products_summary_length; i++){
            
            let data = {
                
                'product_id' : cartButton[i].dataset.id,
                'product_name' : cartButton[i].dataset.name,
                'product_description' : cartButton[i].dataset.description,
                'product_image' : cartButton[i].dataset.image,
                'product_price' : Number(cartButton[i].dataset.price),
                'product_quantity' : Number(plus.nextElementSibling.dataset.quantity)
            }

            productsData=data;

            
            const index = localStorageData.findIndex(productsData => productsData.product_id === cartButton[i].dataset.id);
            if(index !== -1) {
                productQuantity[i].value = Number(plus.nextElementSibling.dataset.quantity);

                localStorageData.splice(index, 1 , data);
                window.localStorage.setItem('products-cart-items', JSON.stringify(localStorageData));
                totalPrice.innerHTML = updaeTotalPrice();
            }



        }

        
        
    })
}

for(let minus of minus_button){
    minus.addEventListener("click", _ => {
        
        minus.previousElementSibling.dataset.quantity > 0 && minus.previousElementSibling.dataset.quantity--; // decrement the value of dataset-quantity property
        minus.previousElementSibling.innerHTML = Number(minus.previousElementSibling.dataset.quantity); // display the new value to the end user 

        let localStorageData = JSON.parse(localStorage.getItem('products-cart-items'));

        if(localStorageData === null) {
            localStorageData = []
        }

        let productsData = []

        for(let i = 0; i < products_summary_length; i++){

            let data = {
                'product_id' : cartButton[i].dataset.id,
                'product_name' : cartButton[i].dataset.name,
                'product_description' : cartButton[i].dataset.description,
                'product_image' : cartButton[i].dataset.image,
                'product_price' : Number(cartButton[i].dataset.price),
                'product_quantity' :Number(minus.previousElementSibling.dataset.quantity)
            }

            productsData = data;

            const index = localStorageData.findIndex(data => data.product_id === data.product_id);
            if(index !== -1) {
                productQuantity[i].value = Number(minus.previousElementSibling.dataset.quantity);
                localStorageData.splice(index, 1 , data);
                window.localStorage.setItem('products-cart-items', JSON.stringify(localStorageData));
                totalPrice.innerHTML = updaeTotalPrice();

                console.log(index);
            }
        }


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
            let index = storedProducts.findIndex(obj => obj.product_id === cartButton[i].dataset.id);

            // Check if the product was found and then update the storedProducts array
            if(index !== -1){
                storedProducts.splice(index, 1);
                localStorage.setItem("products-cart-items", JSON.stringify(storedProducts));
                totalPrice.innerHTML = updaeTotalPrice();
                console.log(index);
            }

        }
    });
}



