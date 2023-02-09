const plus_button = document.querySelectorAll("#plusButton");
const minus_button = document.querySelectorAll("#minusButton");





for(let plus of plus_button){
    plus.addEventListener("click" , _ => {
        
        plus.nextElementSibling.dataset.quantity++;
        plus.nextElementSibling.innerHTML = plus.nextElementSibling.dataset.quantity;
       
    })
}

for(let minus of minus_button){
    minus.addEventListener("click", _ => {
        minus.previousElementSibling.dataset.quantity > 0 && minus.previousElementSibling.dataset.quantity--;
        minus.previousElementSibling.innerHTML = minus.previousElementSibling.dataset.quantity;
    })
}