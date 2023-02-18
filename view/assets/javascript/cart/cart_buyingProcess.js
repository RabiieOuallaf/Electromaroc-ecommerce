/* === confirme the order === */ 
var products_summary_data = localStorage.getItem("order");

function buyProduct() {
    
    const xml = new XMLHttpRequest();

    xml.open('POST', 'http://localhost:9000/controller/Orders.php', false);
    xml.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xml.onload = function() {
        if(xml.DONE) {
            console.log(xml.response);
        }else{
            console.log('not done');
        }
    }

    const data = 'data' + encodeURIComponent(products_summary_data);

    xml.send(data)

}





