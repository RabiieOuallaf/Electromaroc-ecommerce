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

/* == Add Products to cart == */ 

const cart_buttons = document.querySelectorAll("#cart-btn");
var localStorageData = [];

for(let cart_button of cart_buttons){
    cart_button.addEventListener("click", _ => {
        let productID = cart_button.dataset.id;
        if(!localStorageData.includes(productID)){
            localStorageData.push(cart_button.dataset.id);
            localStorage.setItem("product-id" , JSON.stringify(localStorageData));
        }
        

    });
}

/* == Store product id in local storage in order to use it later in the cart page== */






