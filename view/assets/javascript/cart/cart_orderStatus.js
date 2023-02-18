/* === displayProducts with status === */ 

let client_orders = [];

(function getUserProducts() { // this function will get the user products 
    const xml = new XMLHttpRequest();

    xml.open('GET', 'http://localhost:9000/controller/Orders.php', false);

    xml.onload = function() {
        if(xml.DONE)  {

            client_orders = JSON.parse(xml.response);

        }else{
            console.log("an error occured on request");
        }
    }

    xml.send();

})()

// after fetching the user's orders data now loop over it and insert it into the dom 
let orders_status_content = '';
const order_status_container = document.getElementById('Orders-status');

for(let i = 0; i < client_orders.length; i++) {
    orders_status_content += `


        <table class="min-w-full table-fixed">
            <thead class="bg-gray-700">
                <tr>

                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Order ID
                    </th>

                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Product quantity
                    </th>

                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        order total cost
                    </th>

                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        order status
                    </th>

                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        order creating date
                    </th>
                </tr>
            </thead>
            <tbody id="tbody-container" class="bg-green-800 dark:divide-gray-600">
        
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">${client_orders[i]["order_id"]}</td>
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">${client_orders[i]["product_quantity"]}</td>
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">${client_orders[i]["product_total_price"]}$</td>
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">${client_orders[i]["order_status"]}</td>
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">${client_orders[i]["order_creating_date"]}</td>
                
                
                </tr>

            </tbody>

        </table>

    `
}

// insert the html context to the orders status container in the dom 

order_status_container.innerHTML = orders_status_content;