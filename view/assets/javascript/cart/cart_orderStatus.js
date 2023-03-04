/* === displayProducts with status === */ 

let client_orders = [];

(function getUserProducts() { // this function will get the user products 
    
    const xml = new XMLHttpRequest();
    xml.open('GET', 'http://localhost:9000/controller/Orders.php/?type=ordersByParam', true);
    xml.onload = function() {
        if(xml.DONE)  {
            client_orders = JSON.parse(xml.response);
        }else{
            console.log("an error occured on request");
        }
    }

    xml.send();

})();



// after fetching the user's orders data now loop over it and insert it into the dom 
var orders_status_content = '';
const order_status_container = document.getElementById('tbody-container');

let totalPriceOfOrder = 0;


for(let i = 0; i < client_orders.length; i++) {


    orders_status_content += `


        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">${client_orders[i]["order_id"]}</td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">${client_orders[i]["product_quantity"]}</td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">${client_orders[i]["product_total_price"] * client_orders[i]["product_quantity"]}$</td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">${client_orders[i]["order_status"]}</td>
            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">${client_orders[i]["order_creating_date"]}</td>

        
        
        </tr>
        `
}

// insert the html context to the orders status container in the dom 


order_status_container.innerHTML = orders_status_content;
const totalPriceOfOrderContainer = document.getElementById('totalPriceOfOrder');
totalPriceOfOrderContainer.innerHTML += totalPriceOfOrder;