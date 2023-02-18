const selected_categories = document.querySelectorAll("#selectedCategory");


console.log(selected_categories);

for(let selected_category of selected_categories){
    selected_category.addEventListener("click", _ => {
        console.log(selected_category.value)
        
        let xhr = new XMLHttpRequest();

        xhr.open("GET", `http://localhost:9000/controller/Orders.php/?categoryid=${selected_category.value}`,true);

        xhr.onload = () => {
            if(xhr.status == 200){
                let Products = JSON.parse(xhr.response);
                console.log(Products)
                
            }
        }
        
        xhr.send();
        
    });
}

