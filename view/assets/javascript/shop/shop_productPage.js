/* === Store product id in local storage in order to use it later === */

const cartButton = document.getElementById("cart-btn");

if(cartButton !== null) {
    cartButton.addEventListener("click", _ => {
        let localStorageData = JSON.parse(localStorage.getItem('products-cart-items'));

        if(localStorageData === null) {
            localStorageData = []
        }

        // Check if the product is already in the list
        const existingProductIndex = localStorageData.findIndex(storedProduct => storedProduct.product_id === cartButton.dataset.id);

        

        if(existingProductIndex !== -1) {
            // The product is already in the list, so just increase its quantity
            localStorageData[existingProductIndex].product_quantity++;

            window.localStorage.setItem('products-cart-items', JSON.stringify(localStorageData));

        }else {
            let data = {
                'product_id' : cartButton.dataset.id,
                'product_name': cartButton.dataset.name,
                'product_description': cartButton.dataset.description,
                'product_image': cartButton.dataset.image,
                'product_price': cartButton.dataset.price,
                'product_quantity': cartButton.dataset.quantity
            }
            localStorageData.push(data);
            window.localStorage.setItem('products-cart-items', JSON.stringify(localStorageData))
       }
        
            
         



        location.reload();
        
    });
}


const products = JSON.parse(localStorage.getItem('products-cart-items'));
const productId = document.getElementById('id').value;

const ObjectFromLocalStorageById = (productId) => {
    for(let product of products) {
       
        if(product.product_id == productId) {
            return product;
        }

    }
}

const Product = ObjectFromLocalStorageById(productId);
const ProductPrice = Number(ObjectFromLocalStorageById(productId).product_price);
const ProductQuantity = Number(ObjectFromLocalStorageById(productId).product_quantity);
// calculate the total price in the product page 

const totalPriceContainer = document.getElementById('order-informations');

const updateTotalPrice = () => {
    totalPriceContainer.innerHTML = `
        <span class="text-xl font-bold text-slate-600 mx-10 w-[50%]">Product summary</span>
        <span class="text-lg font-bold text-slate-500 mx-10 w-[50%]">Total price : <span class="totalPrice">${ProductPrice * ProductQuantity}</span></span>
    
    `
}

setInterval(updateTotalPrice, 1000);





// loop over plus and minus buttons and add event listener to them 

const plus_button = document.querySelectorAll("#plusButton");
const minus_button = document.querySelectorAll("#minusButton");
const cancel_button = document.querySelectorAll("#cancelButton");
const total_price = document.getElementById('totalPrice');

for(let plus of plus_button){
    plus.addEventListener("click" , _ => {
        plus.nextElementSibling.dataset.quantity++; // icrement the value of dataset-quantity property
        plus.nextElementSibling.innerHTML = plus.nextElementSibling.dataset.quantity; // display the new value to the end user

        let localStorageData = JSON.parse(localStorage.getItem('products-cart-items'));

        if(localStorageData === null) {
            localStorageData = []
        }

        let data = {
            'product_id' : cartButton.dataset.id,
            'product_name' : cartButton.dataset.name,
            'product_description' : cartButton.dataset.description,
            'product_image' : cartButton.dataset.image,
            'product_price' : cartButton.dataset.price,
            'product_quantity' : plus.nextElementSibling.dataset.quantity
        }

        const index = localStorageData.findIndex(data => data.product_id === Product.product_id);
        localStorageData.splice(index, 1 , data);

        window.localStorage.setItem('products-cart-items', JSON.stringify(localStorageData));

        updateTotalPrice()
        
    })
}

// totalPriceContainer.innerHTML = `
//     <span class="text-xl font-bold text-slate-600 mx-10 w-[50%]">Product summary</span>
//     <span class="text-lg font-bold text-slate-500 mx-10 w-[50%]">Total price : <span class="totalPrice">${ProductPrice * ProductQuantity}</span></span>

// `
for(let minus of minus_button){
    minus.addEventListener("click", _ => {
        minus.previousElementSibling.dataset.quantity > 0 && minus.previousElementSibling.dataset.quantity--; // decrement the value of dataset-quantity property
        minus.previousElementSibling.innerHTML = minus.previousElementSibling.dataset.quantity; // display the new value to the end user 

        let localStorageData = JSON.parse(localStorage.getItem('products-cart-items'));

        if(localStorageData === null) {
            localStorageData = []
        }

        let data = {
            'product_id' : cartButton.dataset.id,
            'product_name' : cartButton.dataset.name,
            'product_description' : cartButton.dataset.description,
            'product_image' : cartButton.dataset.image,
            'product_price' : cartButton.dataset.price,
            'product_quantity' : minus.previousElementSibling.dataset.quantity
        }

        const index = localStorageData.findIndex(data => data.product_id === Product.product_id);
        localStorageData.splice(index, 1 , data);

        window.localStorage.setItem('products-cart-items', JSON.stringify(localStorageData));

        updateTotalPrice()

        


    })
}





