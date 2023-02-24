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




