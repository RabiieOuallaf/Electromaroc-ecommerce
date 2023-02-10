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
            localStorageData.push(cart_button.dataset.id);
            localStorage.setItem("product-id" , JSON.stringify(localStorageData));
        }
        

    });
}
const product_id_array = JSON.parse(localStorage.getItem("product-id"));

for(let i = 0; i < product_id_array.length; i++){
    let xhr = new XMLHttpRequest();

    xhr.open("POST","localhost:9000/controller.php",true );
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = () => {
        if(xhr.readyState === xhr.DONE && xhr.status === 200){
            console.log(xhr.response);
        }
    }
    xhr.send("data=" + encodeURIComponent(product_id_array[i]));
}