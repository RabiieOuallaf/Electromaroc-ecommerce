// === Get orders from localstorage === // 

const ordersData = localStorage.getItem("order");
const orders = JSON.parse(ordersData);

// === Display orders in the dashbaord === //

const table_container = document.getElementById('tbody-container');

var table_content = ``;

for(let i = 0; i < orders.length; i++){
    table_content += `
    

        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">


            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">${orders[i]['product_id']}</td>
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">${orders[i]['product-price']}</td>
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">${orders[i]['product-name']}</td>
                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">${orders[i]['product-Qunatity']}</td>
                <td class="w-96"><img src="http://localhost:9000/view/assets/uploads/${orders[i]['product-image']}" alt="product image" style="width:100%;"/></td>
                <td class="d-flex justify-content-around">

                    <form action="http://localhost:9000/controller/Orders.php" method="GET" class="flex flex-col">

                        <input type="submit" name="type" value="confirm" class="text-red-500">
                        <input type="submit" name="type" value="reject" class="text-yellow-700">
                        <input type="hidden" name="productid" value="${orders[i]["product_id"]} ">
                        <input type="hidden" name="productprice" value="${orders[i]["product-price"]} ">
                        <input type="hidden" name="productquantity" value="${orders[i]["product-quantity"]} ">



                    </form>
            
                </td>
                
            </tr>

            
        </tbody>
        </table>
    `
}
    


table_container.innerHTML = table_content;