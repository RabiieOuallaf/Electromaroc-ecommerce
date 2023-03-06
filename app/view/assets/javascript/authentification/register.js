/* == Clear register inputs in focuse == */ 

const inputs = document.querySelectorAll("#inputs");


for(let input of inputs){

    input.addEventListener("click", _ => {
        input.setAttribute("placeholder", "");
    });

}