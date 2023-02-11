/* == Clearing the search input on hover == */ 

const SearchInput = document.getElementById("searchInput");

SearchInput.addEventListener("focus", _ => {

    SearchInput.setAttribute("placeholder" , "");

});

SearchInput.addEventListener("blur", _ => {

    SearchInput.setAttribute("placeholder" , "Search product");

});


/* turn deals's heart to red in click == */

const hearts = document.querySelectorAll("#heart");

for(let heart of hearts) {

    heart.addEventListener("click", _ => {

        heart.classList.toggle("fav");

        if(heart.classList.contains("fav")){

            heart.style.color = "red";

        }

        if(!heart.classList.contains("fav")){
            heart.style.color = "black";
        }
            

        
    })
}

/* == Store product id in local storage in order to use it later in the cart page == */


const cart_buttons = document.querySelectorAll("#cart-btn");
var localStorageData = [];

for(let cart_button of cart_buttons){
    cart_button.addEventListener("click", _ => {
        let productID = cart_button.dataset.id;
        if(!localStorageData.includes(productID)){
            localStorageData.push({
                "product-id" : cart_button.dataset.id,
                "product-name": cart_button.dataset.name,
                "product-description": cart_button.dataset.description,
                "product-image": cart_button.dataset.image,
                "product-price": cart_button.dataset.price
            });
            localStorage.setItem("product-id" , JSON.stringify(localStorageData));
        }
        

    });
}

const storedProduct = localStorage.getItem("product-id");
const products = JSON.parse(storedProduct);
const product_list = document.getElementById("product-list");

var product_list_content = "";



for(let i = 0; i < products.length; i++){
    product_list_content += `
        <div class="order-informations flex gap-6 my-10">
            <!-- === order image === -->
            <div class="order-img">
                <img  src="http://localhost:9000//view/assets/uploads/${products[i]["product-image"]}" alt="order image" class="w-24">
            </div>

            <!-- === order content === -->

            <div class="order-content">
                <div class="order-name">
                    <h4 class="font-semibold" id="product-name">${products[i]["product-name"]}</h4>
                </div>

                <div class="order-description">
                    <p class="font-medium text-sm" id="product-description">${products[i]["product-description"]}</p>
                </div>

                <div class="order-price">
                    <span class="font-light text-sm" id="product-price">${products[i]["product-price"]}$</span>
                </div>
            </div>

        <!-- === order quantity === -->

            <div class="order-quantity ml-6">
                <span class="mx-1 p-2 border cursor-pointer text-xl font-semibold" id="plusButton">+</span>
                <span id="quantity" data-quantity="0">0</span>
                <span class="mx-1 p-2 border cursor-pointer text-xl font-semibold" id="minusButton">-</span>
                <span class="mx-1 p-2 border cursor-pointer text-xl font-semibold text-red-500" id="cancelButton">X</span>

            </div>

        </div>
    `;
}



product_list.innerHTML = product_list_content;


(function products_to_backend() {

    let xhr = new XMLHttpRequest();

    xhr.open("POST", "http://localhost:9000/controller/handlers/frontEndProductsHandler.php",true);

    xhr.setRequestHeader("Content-type" , "application/json");
    
    xhr.addEventListener("load",function(){
        
        if(xhr.readyState === 4 && xhr.status === 200){
            console.log(`server status : 200 OK : ${xhr.responseText}`);
        }else if(xhr.status === 404){
            console.log("NOT FOUND");
        }
    });
    
    xhr.addEventListener("error", function(){
        console.log(`request faild : ${xhr.statusText}`);
    });
        
    xhr.send(JSON.stringify(storedProduct));

})();