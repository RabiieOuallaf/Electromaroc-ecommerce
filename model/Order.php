<?php 
    if(file_exists('../core/database.php')){
        require_once '../core/database.php';
        require_once '../config/config.php';
        require_once '../helpers/url_helpers.php';
        require_once '../core/database.php';
    }else {
        require_once 'core/database.php';
        require_once 'config/config.php';
        require_once 'helpers/url_helpers.php';
        require_once 'core/database.php';
    } 

    class Order {

        protected $Dbh;

        public function __construct()
        {
            $this->Dbh = new Database;
        }

        // === confirme Order(add it to table with onhold status) === //

        public function confirmeOrder($data) {
            
            $sql = 'INSERT INTO orders(client_id,product_id,product_total_price,product_quantity,order_status) VALUES (:client_id,:product_id, :product_total_price, :product_quantity, :order_status)';
            
            $this->Dbh->query($sql);

            $this->Dbh->bind(':product_id', $data['productId']);
            $this->Dbh->bind(':client_id', $_SESSION['user_id']);
            $this->Dbh->bind(':product_total_price', $data['productPrice']);
            $this->Dbh->bind(':product_quantity', $data['productQuantity']);
            $this->Dbh->bind(':order_status', 'onhold');
      
            $orderAdded = $this->Dbh->execute();
            
            if($orderAdded){
                return $orderAdded;
            }else {
                return false;
            }
        }

        // === change the order status to confirmed === // 

        public function confirmeOrderStatus($data) {

            $sql = 'UPDATE orders SET order_status = :order_status WHERE order_id = :order_id';
            
            $this->Dbh->query($sql);
            $this->Dbh->bind(':order_status', 'confirmed');
            $this->Dbh->bind(':order_id', $data['orderid']);
    
            $orderAdded = $this->Dbh->execute();
            
            if($orderAdded){
                return $orderAdded;
            }else {
                return false;
            }
        }

        // === reject Order === // 

        public function rejectOrder($data) {
            $sql = 'UPDATE orders SET order_status = :order_status WHERE order_id = :order_id';
            
            $this->Dbh->query($sql);
           
            $this->Dbh->bind(':order_id', $data['orderid']);
            $this->Dbh->bind(':order_status', 'Rejected');

            
            $orderRejected = $this->Dbh->execute();

            if($orderRejected) {
                return $orderRejected;
            }else{
                return false;
            }
        }

        // === display orders of each client  === //

        public function displayOrdersByParam($clientId) {
            $sql = 'SELECT * FROM orders WHERE client_id = :client_id';

            $orders = $this->Dbh->multipleOrders($sql ,':client_id', $clientId);
            if($orders){
                return $orders;
            }else{
                return false;
            }
        }

        // === display orders with onhold status === // 

        public function displayOrdersByStatus($orderStatus) {
            $sql = 'SELECT * from orders WHERE order_status = :order_status';

            $orders = $this->Dbh->multipleBind($sql, ':order_status', $orderStatus);

            if($orders) {
                return $orders;
            }else{
                return false;
            }
        }
        
    }

    
