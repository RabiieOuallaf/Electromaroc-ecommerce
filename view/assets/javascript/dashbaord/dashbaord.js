// === Get orders from localstorage === // 

const ordersData = localStorage.getItem("order");
const orders = JSON.parse(ordersData);


// === Display orders in the dashbaord === //

const table_container = document.getElementById('tbody-container');

var table_content = ``;

