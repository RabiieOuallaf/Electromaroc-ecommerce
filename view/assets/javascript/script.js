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
