/* === Store product id in local storage in order to use it later === */

const cartButton = document.getElementById("cart-btn");

if(cartButton !== null) {
    cartButton.addEventListener("click", _ => {
        let localStorageData = JSON.parse(localStorage.getItem('products-cart-items'));

        if(localStorageData === null) {
            localStorageData = []
        }
       
        let data = {
            'product_id' : cartButton.dataset.id,
            'product-name': cartButton.dataset.name,
            'product-description': cartButton.dataset.description,
            'product-image': cartButton.dataset.image,
            'product-price': cartButton.dataset.price,
            'product-quantity': cartButton.dataset.quantity
        }
            
         
        localStorageData.push(data);

        window.localStorage.setItem('products-cart-items', JSON.stringify(localStorageData))
    });
}



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





