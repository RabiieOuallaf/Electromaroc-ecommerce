const plus_button = document.querySelectorAll("#plusButton");
const minus_button = document.querySelectorAll("#minusButton");



// loop over plus and minus buttons and add event listener to them 

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