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





// products_list.innerHTML = product_list_content;


// products_list.style.display = "none";


// (function products_to_backend() {

//     let xhr = new XMLHttpRequest();

//     xhr.open("POST", "http://localhost:9000/controller/handlers/frontEndProductsHandler.php",true);

//     xhr.setRequestHeader("Content-type" , "application/json");
    
//     xhr.addEventListener("load",function(){
        
//         if(xhr.readyState === 4 && xhr.status === 200){
//             console.log(`server status : 200 OK : ${xhr.responseText}`);
//         }else if(xhr.status === 404){
//             console.log("NOT FOUND");
//         }
//     });
    
//     xhr.addEventListener("error", function(){
//         console.log(`request faild : ${xhr.statusText}`);
//     });
        
//     xhr.send(JSON.stringify(storedProduct));

// })();